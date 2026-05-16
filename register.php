<?php

$conn = new mysqli("localhost", "root", "", "mydb");

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// kiểm tra email tồn tại
$check = $conn->query("SELECT * FROM users WHERE email='$email'");

if ($check->num_rows > 0) {
    echo "Email đã tồn tại";
} else {

    $sql = "INSERT INTO users(username, email, password)
            VALUES('$username', '$email', '$password')";

    if ($conn->query($sql)) {
        echo "Đăng ký thành công";
    } else {
        echo "Lỗi";
    }
}
?>