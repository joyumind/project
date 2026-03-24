<?php
// app/controllers/AuthController.php

class AuthController {
    
    public static function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->findByEmail($email);

            // التحقق من كلمة المرور المشفرة (واجب)
            if ($user && password_verify($password, $user['password'])) {
                // بدء الجلسة بأمان
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                
                header("Location: " . BASE_URL . "/dashboard");
                exit();
            } else {
                $error = "بيانات الاعتماد غير صحيحة";
                require '../app/views/auth/login.php';
            }
        } else {
            require '../app/views/auth/login.php';
        }
    }

    public static function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "/login");
    }

    // منطق التحقق (Validation) داخل كونتولر الحسابات

    public static function changePassword() {
        Middleware::auth(); // 🛡️ حماية
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $oldPass = $_POST['old_password'] ?? '';
            $newPass = $_POST['new_password'] ?? '';
            $confirmPass = $_POST['confirm_password'] ?? '';
            $userId = $_SESSION['user_id'];
            $errors = [];

            $userModel = new User();
            $user = $userModel->findById($userId);

            // 🧠 التحقق حسب جدول القواعد
            if (!password_verify($oldPass, $user['password'])) {
                $errors[] = "كلمة المرور القديمة غير صحيحة";
            }
            if (strlen($newPass) < 6) {
                $errors[] = "كلمة المرور الجديدة يجب أن تكون 6 أحرف على الأقل";
            }
            if ($newPass !== $confirmPass) {
                $errors[] = "كلمة المرور الجديدة غير متطابقة مع التأكيد";
            }

            if (empty($errors)) {
                if ($userModel->updatePassword($userId, $newPass)) {
                    header("Location: " . BASE_URL . "/dashboard?success=password_changed");
                    exit();
                }
            } else {
                require_once '../app/views/auth/change-password.php';
            }
        } else {
            require_once '../app/views/auth/change-password.php';
        }
    }


       // app/controllers/AuthController.php

    public static function register() {
        $errors = [];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $userModel = new User();

            // 🧠 التحقق من البيانات (Validation)
            if (strlen($name) < 3) $errors[] = "الاسم يجب أن يكون أكثر من 3 أحرف";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "البريد الإلكتروني غير صحيح";
            if (strlen($password) < 6) $errors[] = "كلمة المرور ضعيفة (6 أحرف على الأقل)";
            
            if ($userModel->exists($email)) {
                $errors[] = "هذا البريد الإلكتروني مسجل بالفعل!";
            }

            if (empty($errors)) {
                if ($userModel->create($name, $email, $password)) {
                    // توجيه لصفحة الدخول مع رسالة نجاح
                    header("Location: " . BASE_URL . "/login?success=registered");
                    exit();
                }
            }
        }
        
        require_once __DIR__ . '/../views/auth/register.php';
    }


 


}