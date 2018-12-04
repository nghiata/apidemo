# apidemo
demo for an api. I used Laravel framework for a beautiful url (restful api)
# Set up
php artisan migrate
php artisan db:seed --class=UserDataSeeder
# Hướng dẫn sử dụng API
1. Lấy thông tin người dùng
- REQUEST:
- HTTP/GET
- /user/{token}/{email}

- token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9 (require)
- email: Email của user cần truy xuất thông tin (require)

- RESPONSE:
{
    status: "success",
    code: "100",
    message: "user is valid",
    data: {
        email: "1UPx7buXRP@gmail.com",
        name: "vODLl1Dd5J",
        address: "NhceJ8Es1R",
        tel: "12",
        sex: 1,
        birth: "1990-01-01",
        created_at: null,
        updated_at: null
    }
}

2. update thông tin người dùng
- REQUEST:
- HTTP/POST
- /user/update

- token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9 (require)
- email: Email của user cần truy xuất thông tin (require)
- name: "..." (option),
- address: "..." (option),
- tel: "..." (option),
- sex: "..." (option),
- birth: "yyyy-mm-dd" (option),


RESPONSE:
- update thành công
{
    "status":"success",
    "code":"100",
    "message":"use updated successfully"
}
- update thất bại
{
    "status":"fail",
    "code":"113",
    "message":"Update is not success"
}
