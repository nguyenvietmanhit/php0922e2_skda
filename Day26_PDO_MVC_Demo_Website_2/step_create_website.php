step_create_website.php
Bước 1:
- Chuẩn bị đề tài: tên đề tài
Bước 2:
- Xác định thành viên nhóm: code độc lập hoặc nhóm 3 người
Bước 3:
- Dựng giao diện tĩnh Frontend, Backend: HTML CSS JS
Có thể tự code hoặc tìm 1 template có sẵn
Day26/Code_demo/mockup
                      /backend
                      /frontend
Bước 4:
- Phân tích CSDL từ giao diện của Bước 3:
Đi qua tất cả các trang của frontend và backend, phân tích giao
diện của từng trang theo hướng từ trên xuống dưới
- Các thông tin ít khi thay đổi thì ko cần lưu vào CSDL: ko cần
phải code CRUD backend, trang web load nhanh hơn, tuy nhiên muốn
sửa thì bắt buộc phải sửa trực tiếp trong code
- Ngược lại các thông tin hay thay đổi thì bắt buộc phải lưu
vào CSDL -> tạo CRUD ở backend, web load nhiều hơn, user thường
cũng có thể chỉnh sửa đc

- Bảng menus: lưu thông tin menu trên hệ thống
Trong 1 bảng có 2 kiểu trường: mặc định, nghiệp vụ
id: khóa chính
name: tên menu
link:
status: trạng thái, TINYINT , 0 - ẩn, 1 - hiển thị
created_at: ngày tạo
updated_at: lần cập nhật cuối -> tự động sinh
- Bảng products:
id
avatar: tên file ảnh
name: tên sp
price: giá sp
summary: mô tả ngắn, TEXT
content: chi tiết sp, TEXT
amount: số lượng sp hiện tại

seo_title: VARCHAR
seo_description: VARCHAR
seo_keyword: VARCHAR

status
created_at
updated_at
+ Tạo CSDL: php0922e2_mvc
Chạy trong PHPMyadmin, tab SQL nội dung trong file
Day26/Code_demo/file_create_db.html
- Bước 5: Tạo cấu trúc MVC và code
mvc
   /backend: cấu trúc thư mục MVC đã học
   /frontend: cấu trúc thư mục MVC đã học
