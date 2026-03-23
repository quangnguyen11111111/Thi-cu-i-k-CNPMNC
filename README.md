Đề số 1 
PHẦN 1 (2 điểm)

Sinh viên thực hiện các yêu cầu sau:

a. Tạo project Laravel

Tên project phải theo định dạng:

<tên + chữ cái đầu của họ + chữ cái đầu của tên đệm>_MSSV_CK

Ví dụ:

hieulx_123_CK
b. Tạo database MySQL

Tạo database và kết nối với project Laravel.

Tên database cũng theo định dạng:

<tên + chữ cái đầu của họ + chữ cái đầu của tên đệm>_MSSV_CK

Ví dụ:

hieulx_123_CK
c. Sử dụng Migration tạo bảng

Tạo 2 bảng sau:

Bảng Danhmuc
Field	Kiểu dữ liệu
id	primary key
madanhmuc	string(50)
tendanhmuc	string(255)
mota	longText
Bảng TaiLieu
Field	Kiểu dữ liệu
id	primary key
matailieu	string(50)
tentailieu	string(255)
tomtat	longText
madanhmuc	string(50)
PHẦN 2 (8 điểm)

Xây dựng các chức năng sau trên project Laravel đã tạo.

a. Chức năng Login

Yêu cầu:

Tên đăng nhập = MSSV
Mật khẩu = MSSV

Hai thông tin này được hardcode trong code.

Ví dụ:

username: 123456
password: 123456
b. Chức năng thêm mới Danh mục

Cho phép:

nhập mã danh mục
nhập tên danh mục
nhập mô tả

Sau đó lưu vào bảng Danhmuc.

c. Chức năng thêm mới Tài liệu

Tạo form thêm tài liệu.

Các trường:

Field
Mã tài liệu
Tên tài liệu
Tóm tắt
Mã danh mục
Yêu cầu validation

Phải sử dụng:

Form Request Validation

Mục đích:

không cho phép bỏ trống bất kỳ trường nào
hiển thị thông báo lỗi phù hợp
Lưu ý quan trọng

Trường:

madanhmuc

Không được nhập tay.

Phải:

chọn từ danh sách danh mục
danh sách này lấy từ database

Ví dụ:

<select>
Danh mục 1
Danh mục 2
Danh mục 3
</select>
d. Hiển thị danh sách tài liệu

Tạo trang hiển thị danh sách.

Danh sách phải có các cột:

Cột
id
Mã tài liệu
Tên tài liệu
Tóm tắt
Tên danh mục
Yêu cầu phân trang (pagination)

Số bản ghi trên 1 trang:

= chữ số đầu tiên của MSSV

Ví dụ:

MSSV:

123456

→ mỗi trang:

1 record

MSSV:

456789

→ mỗi trang:

4 record
e. Sắp xếp danh sách tài liệu

Phải cho phép sort dữ liệu theo:

1️⃣ Tên tài liệu
A → Z
Z → A
2️⃣ Mã tài liệu
A → Z
Z → A