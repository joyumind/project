/project
├── .htaccess                     # توجيه كافة الطلبات لـ public/index.php 
├── ai-guide.md                   # دليل البرمجة بالذكاء الاصطناعي 
├── rules.md                      # جدول القواعد (Vibe Coding) 
├── config/
│   └── config.php                # إعدادات DB والثوابت العامة 
├── public/
│   └── index.php                 # نقطة الدخول وتشغيل الـ Session 
└── app/
    ├── controllers/              # المتحكمات (المنطق) 
    │   ├── ProfileController.php # التحقق من صحة المدخلات
    │   ├── AuthController.php    # معالجة الدخول/الخروج وتشفير الباسورد
    │   ├── HomeController.php    # عرض الصفحة الرئيسية
    │   └ DashboardController.php # المتحكم في لوحة التحكم
    ├── core/                     # النواة والمحركات 
    │   ├── Database.php          # اتصال PDO آمن (Singleton) 
    │   ├── Router.php            # توجيه الروابط (Routing) 
    │   └── Middleware.php        # 🛡️ الجديد: حماية المسارات (Auth Check)
    ├── models/                   # التعامل مع البيانات (SQL) 
    │   └── User.php              # استعلامات المستخدمين (Prepared Statements) 
    └── views/                    # واجهات العرض (HTML/PHP) 
        ├── auth/
        │   └── login.php         # نموذج تسجيل الدخول
        ├── dashboard.php         # واجهة لوحة التحكم الاحترافية (محمية)
        └── home.php              # الصفحة العامة