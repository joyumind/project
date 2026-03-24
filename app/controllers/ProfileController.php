<?php
// app/controllers/ProfileController.php

require_once '../app/core/Middleware.php';
require_once '../app/models/User.php';

class ProfileController {
    
    public static function edit() {
        Middleware::auth(); // 🛡️ حماية المسار
        
        $userModel = new User();
        $userData = $userModel->findById($_SESSION['user_id']);
        
        require_once __DIR__ . '/../views/profile/edit.php';
    }

    public static function update() {
        Middleware::auth();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $userId = $_SESSION['user_id'];
            $errors = [];

            // 🧠 التحقق (Validation) - واجب
            if (empty($name) || strlen($name) < 3) $errors[] = "الاسم قصير جداً";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "البريد الإلكتروني غير صالح";

            $userModel = new User();
            if ($userModel->isEmailTaken($email, $userId)) {
                $errors[] = "هذا البريد الإلكتروني مستخدم بالفعل";
            }

            if (empty($errors)) {
                if ($userModel->update($userId, $name, $email)) {
                    $_SESSION['user_name'] = $name; // تحديث الاسم في الجلسة
                    header("Location: " . BASE_URL . "/dashboard?success=1");
                    exit();
                }
            } else {
                $userData = ['name' => $name, 'email' => $email];
                require_once '../app/views/profile/edit.php';
            }
        }
    }
}