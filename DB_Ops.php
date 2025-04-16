<?php
// 1-Connection
$servername = "localhost";
$username = "admin";        
$password = "admin123";           
$dbname = "userdata"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";

$full_name = "";
$username = "";
$phone = "";
$whatsapp = "";
$address = "";
$email = "";
$password = "";
$confirm_password = "";
$error = [];

include_once 'Upload.php';
$user_image = ImageUpload();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = test_input($_POST['full_name']);
    $username = test_input($_POST['user_name']);
    $phone = test_input($_POST['phone']);
    $whatsapp = test_input($_POST['whatsapp']);
    $address = test_input($_POST['address']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $confirm_password = test_input($_POST['confirm_password']);
    
    if (isset($_POST["user_image"])) {
        $user_image = $_POST["user_image"];
    }    

    //validation
    if (empty($full_name)) {
        $error['full_name'] = "Full name is required";
    }
    if (empty($username)) {
        $error['username'] = "Username is required";
    }
    if (empty($phone)) {
        $error['phone'] = "Phone number is required";
    } elseif (!preg_match("/^[0-9]{10,15}$/", $phone)) {
        $error['phone'] = "Invalid phone number format";
    }
    if (!empty($whatsapp) && !preg_match("/^[0-9]{10,15}$/", $whatsapp)) {
        $error['whatsapp'] = "Invalid WhatsApp number format";
    }
    if (empty($email)) {
        $error['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Invalid email format";
    }
    if (empty($password)) {
        $error['password'] = "Password is required";
    } elseif (strlen($password) < 8) {
        $error['password'] = "Password must be at least 8 characters";
    }
    if ($password != $confirm_password) {
        $error['confirm_password'] = "Password does not match";
    }
//2-Instion two db
    if(empty($error)){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $conn->prepare("INSERT INTO user (full_name, username, phone, whatsapp_number, address, email, password, user_image) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssssss", $full_name, $username, $phone, $whatsapp, $address, $email, $hashed_password, $user_image);

    if ($stmt->execute()) {
        echo "Added successfully! <br>";
    } else {
        echo "Error: " . $stmt->error;
    }

        $stmt->close();
        $conn->close();
    }
}
?>

