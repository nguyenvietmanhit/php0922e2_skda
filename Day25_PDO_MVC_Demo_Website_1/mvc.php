<!--mvc.php-->
1 - Mô hình MVC trong lập trình Web:
- Là mô hình kiến trúc phần mềm 3 lớp bao gồm Model, View,
Controller
- LÀ mô hình phổ biến để xây dựng các ứng dụng Web
- Framework Laravel, Zend, Cake ...  hoặc CMS như Wordpress
đều dựa trên MVC
- Dựa trên OOP
- Giúp dễ mở rộng và bảo trì Web hơn
2 - Thành phần MVC:
- M - Model: thao tác với CSDL
- V - View: hiển thị dữ liệu tới user
- C - Controller: trung gian giữa Model và View, luân chuyển
dữ liệu giữa chúng
3 - Cấu trúc thư mục code: tùy thuộc vào từng MVC cụ thể
mvc /
    /assets: lưu các file frontend: css, js, image, font ...
           /css: chứa các file .css
               /style.css: file css chính
           /js
              /script.js
           /images: chứa ảnh tĩnh
    /configs: chứa các file cấu hình hệ thống như database, email.
            /Database.php: class chứa hằng số kết nối CSDL
    /controllers: chứa các class controller - C
                /UserController.php: xử lý user
                /CategoryController.php: xử lý category
    /models: chứa các class model - M
           /User.php: xử lý user
           /Category.php: xử lý category
    /views: chứa các file - V
          /users: chứa các file view của user
                /create.php
                /update.php
                /index.php
          /layouts: chứa file layout hệ thống
                   /main.php:
    .htaccess: cấu hình truy cập, URL rewrite ...
    index.php: file index gốc của mô hình MVC
