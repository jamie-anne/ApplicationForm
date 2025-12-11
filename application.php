<?php
$servername = "localhost";
$username = "root";
$password = "jam1313anne_";
$dbname = "application";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $firstname_db = $_POST['firstname_db'] ?? '';
    $middlename_db  = $_POST['middlename_db'] ?? '';
    $lastname_db  = $_POST['lastname_db'] ?? '';
    $birthdate_db = $_POST['birthdate_db'] ?? '';
    $email_db = $_POST['email_db'] ?? '';
    $contact_db = $_POST['contact_db'] ?? '';
    $province_db = $_POST['province_db'] ?? '';
    $city_db = $_POST['city_db'] ?? '';
    $barangay_db = $_POST['barangay_db'] ?? '';
    $address_db = $_POST['address_db'] ?? '';
    $college_db = $_POST['college_db'] ?? '';
    $course_db = $_POST['course_db'] ?? '';
    $occupation_db = $_POST['occupation_db'] ?? '';
    $department_db = $_POST['department_db'] ?? '';
    $area_volunteer_db = $_POST['area_volunteer_db'] ?? '';
    $activities_volunteer_db = $_POST['activities_volunteer_db'] ?? '';
    $textarea_db = $_POST['textarea_db'] ?? '';
    $days_db = $_POST['days_db'] ?? [];
    $from_hour_db = $_POST['from_hour_db'] ?? '';
    $from_ampm_db = $_POST['from_ampm_db'] ?? '';
    $to_hour_db = $_POST['to-hour_db'] ?? '';
    $to_ampm_db = $_POST['to_ampm_db'] ?? '';
    $additional_info_db = $_POST['additional_info_db'] ?? '';
    

    if ($first_name && $last_name) {
        $stmt = $conn->prepare("INSERT INTO volunteers (firstname_db, middlename_db, lastname_db, birthdate_db, email_db, contact_db, province_db,
        city_db, barangay_db, address_db, college_db, course_db, occupation_db, department_db, area_volunteer_db, activities_volunteer_db
        textarea_db, days_db, from_hour_db, from_ampm_db, to_hour_db, to_ampm_db, additional_info_db) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssssssssssss", $firstname_db, $middlename_db, $lastname_db, $birthdate_db, $email_db, $contact_db, $province_db,$city_db,
        $barangay_db, $address_db, $college_db, $course_db, $occupation_db, $department_db, $area_volunteer_db, $activities_volunteer_db,
        $textarea_db, implode(",", $days_db), $from_hour_db, $from_ampm_db, $to_hour_db, $to_ampm_db, $additional_info_db);

        if ($stmt->execute()) {
            header("Location: application.html?success=1");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please fill in both First Name and Last Name.";
    }
}
$conn->close();
?>
