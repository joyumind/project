<?php
// app/core/Router.php

class Router {
    public static function route($url) {
        // تنظيف الرابط (مثلاً تحويل /profile/ إلى /profile)
        $url = rtrim($url, '/');

        switch ($url) {
            case '':
            case '/':
                require_once '../app/controllers/HomeController.php';
                HomeController::index();
                break;

            case '/login':
                require_once '../app/controllers/AuthController.php';
                AuthController::login();
                break;

            case '/logout':
                require_once '../app/controllers/AuthController.php';
                AuthController::logout();
                break;

            case '/dashboard':
                require_once '../app/controllers/DashboardController.php';
                DashboardController::index();
                break;

            case '/profile':
                require_once '../app/controllers/ProfileController.php';
                ProfileController::edit();
                break;

            case '/register':
                require_once '../app/controllers/AuthController.php';
                AuthController::register();
                break;

            case '/profile/update':
                require_once '../app/controllers/ProfileController.php';
                ProfileController::update();
                break;

                // app/core/Router.php
            case '/change-password':
                require_once '../app/controllers/AuthController.php';
                AuthController::changePassword();
                break;

            case '/register':
                require_once '../app/controllers/AuthController.php';
                AuthController::register();
                break;

            default:
                http_response_code(404);
                echo "404 - الصفحة غير موجودة";
                break;
        }
    }
}