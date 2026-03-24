<?php
// 1. استدعاء الإعدادات العامة (ضروري جداً)
require_once '../config/config.php';

// 2. استدعاء ملفات النواة (Core)
require_once '../config/config.php';
require_once '../app/core/Database.php';
require_once '../app/core/Router.php';
require_once '../app/core/Middleware.php';
require_once '../app/models/User.php'; // استدعاء الموديل هنا يجعله متاحاً في كل مكان

// 3. بدء الجلسة (Session) للأمان والمصادقة
session_start();

// 4. معالجة الرابط (Routing)
$url = $_GET['url'] ?? '/';
Router::route($url);