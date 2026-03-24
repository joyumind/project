<?php
// app/models/User.php

class User {
    private $db;

    public function __construct() {
        // اتصال PDO آمن عبر الـ Singleton
        $this->db = Database::connect();
    }

    /**
     * 🆔 البحث عن مستخدم بواسطة المعرف (لوحة التحكم)
     */
    public function findById($id) {
        $stmt = $this->db->prepare("SELECT id, name, email, password FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /**
     * 🔍 البحث عن مستخدم بواسطة البريد الإلكتروني (لعملية الدخول)
     */
    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    /**
     * 🆕 إنشاء مستخدم جديد (التسجيل)
     * واجب: تشفير كلمة المرور واستخدام Prepared Statements
     */
    public function create($name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $hashedPassword]);
    }

    /**
     * 📝 تحديث بيانات الملف الشخصي
     */
    public function update($id, $name, $email) {
        $stmt = $this->db->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $id]);
    }

    /**
     * 🔑 تحديث كلمة المرور
     */
    public function updatePassword($id, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE users SET password = ? WHERE id = ?");
        return $stmt->execute([$hashedPassword, $id]);
    }

    /**
     * 🛡️ التحقق من توفر البريد الإلكتروني
     * تستخدم عند التسجيل (بدون ID) أو عند التحديث (مع استثناء صاحب الحساب)
     */
    public function isEmailTaken($email, $excludeId = null) {
        if ($excludeId) {
            $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
            $stmt->execute([$email, $excludeId]);
        } else {
            $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
        }
        return $stmt->fetch() ? true : false;
    }

    /**
     * 📊 جلب آخر المستخدمين (لإحصائيات الصفحة الرئيسية)
     */
    public function getLatestUsers($limit = 5) {
        $stmt = $this->db->prepare("SELECT id, name, email, created_at FROM users ORDER BY created_at DESC LIMIT :limit");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}