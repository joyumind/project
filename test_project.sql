-- 1. إنشاء قاعدة البيانات
CREATE DATABASE IF NOT EXISTS `test_project` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `test_project`;

-- 2. إنشاء جدول المستخدمين (Users)
CREATE TABLE `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(150) NOT NULL UNIQUE, -- الالتزام بقاعدة Unique لعدم تكرار الحسابات
    `password` VARCHAR(255) NOT NULL,    -- طول 255 ليتناسب مع تشفير password_hash
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 3. إضافة مستخدم افتراضي للتجربة (كلمة المرور: 123456)
-- ملاحظة: الـ Hash أدناه تم توليده عبر password_hash('123456', PASSWORD_DEFAULT)
INSERT INTO `users` (`name`, `email`, `password`) VALUES 
('أحمد المحمدي', 'ahmed@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');


INSERT INTO `users` (`name`, `email`, `password`) VALUES 
('Test User', 'test@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
-- كلمة المرور لهذا المستخدم هي: password