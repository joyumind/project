<?php
// app/models/User.php

class User {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // البحث عن مستخدم بواسطة البريد الإلكتروني
    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    // إنشاء مستخدم جديد (تطبيق password_hash)
    public function create($name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $hashedPassword]);
    }

    /**
     * جلب آخر المستخدمين بطريقة آمنة
     * واجب: استخدام Prepared Statements لمنع SQL Injection
     */
    public function getLatestUsers($limit = 5) {
        $stmt = $this->db->prepare("SELECT * FROM users LIMIT :limit");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // إضافة هذه الدالة داخل كلاس User في app/models/User.php
    public function findById($id) {
        $stmt = $this->db->prepare("SELECT id, name, email FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /**
     * تحديث بيانات المستخدم (واجب: Prepared Statements)
     */
    public function update($id, $name, $email) {
        $stmt = $this->db->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $id]);
    }

    /**
     * التحقق من توفر البريد الإلكتروني (حماية البيانات)
     */
    public function isEmailTaken($email, $excludeId) {
        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
        $stmt->execute([$email, $excludeId]);
        return $stmt->fetch() ? true : false;
    }

    /**
     * تحديث كلمة المرور (واجب: استخدام Password Hash)
     */
    public function updatePassword($id, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE users SET password = ? WHERE id = ?");
        return $stmt->execute([$hashedPassword, $id]);
    }



}

