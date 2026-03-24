<?php
// app/controllers/DashboardController.php

require_once '../app/core/Middleware.php';
require_once '../app/models/User.php';

class DashboardController {
    
    public static function index() {
        // 🛡️ واجب: حماية المسار أولاً
        Middleware::auth(); 

        // جلب بيانات المستخدم الحالي من الجلسة
        $userId = $_SESSION['user_id'];
        
        // جلب تفاصيل إضافية من قاعدة البيانات إذا لزم الأمر
        $userModel = new User();
        $userData = $userModel->findById($userId); // تأكد من وجود هذه الدالة في الموديل

        // تمرير البيانات للواجهة
        require_once '../app/views/dashboard.php';
    }
}