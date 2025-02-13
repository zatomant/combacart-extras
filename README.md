## Важливо! ## 
Використовуйте цей пакет для зручного встановлення плагіну CombaCart через модуль Extras в EVO 1.4+ та Evolution CMS 3+ [github.com](https://github.com/evolution-cms/evolution)    
Цей extras пакет в автоматичному режимі створює шаблони, сніпети, ТВ та плагін для роботи CombaCart, а також оновлює CombaCart та його залежності до актуальної версії.  

Детальна інформація саме про CombaCart [github.com](https://github.com/zatomant/combacart)  

## Встановлення ##
  
Кроки:  
1. завантажте останній реліз "CombaCart extras" з [github.com](https://github.com/zatomant/combacart-extras/archive/refs/heads/main.zip)
2. авторизуйтесь в адміністративній частині Evolution CMS ( /manager )
3. запустіть модуль Extras, перейдіть до опції «Install by file», виберіть завантажений файл і натисніть «Install».
4. дочекайтесь закінчення процесу інсталяції extras пакету
5. відкрийте в браузері сторінку ( ваш_сайт/assets/plugins/combacart/install.php ) для завершального кроку інсталяції - оновлення composer залежностей  

Якщо на завершальному кроці (5) ви отримуєте помилку 504 Gateway Time-out, виконайте завершальний крок через консоль веб серверу:  
```
cd коренева_тека_вашого_сайту_/assets/plugins/combacart
php install.php
```

або збільшить час очікування виконання скриптів max_execution_time (в php.ini чи fastcgi_read_timeout конфігураційних файлах nginx чи apache) та повторить крок 5 через браузер.  

Важливо! Крок 5 має "захист від випадкового запуску" - перевірка наявності теки 'combacart/vendor', і якщо присутня - інсталяція буде зупинена.   