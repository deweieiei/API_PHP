<?php

include 'Connected.php';
// เชื่อมต่อกับฐานข้อมูล
// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ข้อมูลที่ได้รับจาก Google
$google_id = $_POST['google_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$profile_picture = $_POST['profile_picture'];

// ตรวจสอบว่าอีเมลมีอยู่ในระบบหรือไม่
$sql_check = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    // ถ้ามีอีเมลนี้อยู่แล้วในระบบ
    echo "Email already exists. Logging in...";
    // คุณสามารถเพิ่มโค้ดที่เกี่ยวข้องกับการเข้าสู่ระบบของผู้ใช้ได้ที่นี่
    // เช่น การอัปเดตข้อมูลล่าสุดของผู้ใช้หรือตั้งค่า session

} else {
    // ถ้าอีเมลยังไม่มีในระบบ ให้เพิ่มผู้ใช้ใหม่
    $sql_insert = "INSERT INTO users (google_id, name, email, profile_picture) VALUES ('$google_id', '$name', '$email', '$profile_picture')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "New user registered successfully";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

$conn->close();
?>
