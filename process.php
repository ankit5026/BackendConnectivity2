<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "Ankit*137";
$database = "testdb";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $hobbies = implode(", ", $_POST['hobbies']);
    $country = $_POST['country'];
    $experience = $_POST['experience'];
    
    $profile_pic = $_FILES['profile_pic']['name'];
    move_uploaded_file($_FILES['profile_pic']['tmp_name'], "uploads/" . $profile_pic);
    
    $sql = "INSERT INTO user_details (name, age, email, password, dob, gender, hobbies, country, experience, profile_pic)
            VALUES ('$name', '$age', '$email', '$password', '$dob', '$gender', '$hobbies', '$country', '$experience', '$profile_pic')";
    
    if ($conn->query($sql) === TRUE) {
        $response['status'] = 'success';
        $response['message'] = 'Form submitted successfully!';
        $response['details'] = array(
            'name' => $name,
            'age' => $age,
            'email' => $email,
            'dob' => $dob,
            'gender' => $gender,
            'hobbies' => $hobbies,
            'country' => $country,
            'experience' => $experience,
            'profile_pic' => 'uploads/' . $profile_pic
        );
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error: ' . $conn->error;
    }
}
$conn->close();

echo json_encode($response);
?>
