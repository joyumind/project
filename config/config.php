<?php

// 🌍 Environment
define('APP_ENV', 'development'); // production فالموقع الحقيقي

// 🌐 Base URL
define('BASE_URL', 'http://localhost/project');

// 🗄️ Database Config
define('DB_HOST', 'localhost');
define('DB_NAME', 'test_project');
define('DB_USER', 'root');
define('DB_PASS', '');

// 🔐 Security
define('APP_KEY', 'my_secret_key_123'); // بدلها بقيمة قوية

// 🛠️ Error Reporting
if (APP_ENV === 'development') {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    error_reporting(0);
}