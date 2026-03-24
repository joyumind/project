<?php
// app/core/Database.php

class Database {
    private static $conn = null;

    public static function connect() {
        if (self::$conn === null) {
            try {
                // استخدام الثوابت المعرفة في config.php
                $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
                self::$conn = new PDO($dsn, DB_USER, DB_PASS);
                
                // تفعيل وضع الأخطاء (واجب حسب الجدول)
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // تسجيل الخطأ داخلياً (Logging) بدل عرضه للمستخدم
                error_log("Database Connection Error: " . $e->getMessage());
                die("عذراً، حدث مشكلة في الاتصال بالخادم.");
            }
        }
        return self::$conn;
    }
}