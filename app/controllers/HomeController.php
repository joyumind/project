<?php
// app/controllers/HomeController.php
require_once '../app/core/Database.php';
require_once '../app/models/User.php';

class HomeController {
    public static function index() {
        // 1. إنشاء نسخة من الموديل
        $userModel = new User();
        
        // 2. جلب البيانات (Logic معزول في الموديل)
        $users = $userModel->getLatestUsers(5);

        // 3. تمرير البيانات للـ View
        require_once '../app/views/home.php';
    }
}

