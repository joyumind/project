<?php
// app/core/Middleware.php

class Middleware {
    /**
     * تمنع غير المسجلين من دخول صفحات معينة
     */
    public static function auth() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            // إعادة التوجيه لصفحة الدخول إذا لم يكن مسجلاً
            header("Location: " . BASE_URL . "/login");
            exit();
        }
    }
}