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
    $volunteering_info_db = $_POST['volunteering_info_db'] ?? '';
    $days_db = $_POST['days_db'] ?? [];
    $from_hour_db = $_POST['from_hour_db'] ?? '';
    $from_ampm_db = $_POST['from_ampm_db'] ?? '';
    $to_hour_db = $_POST['to_hour_db'] ?? '';
    $to_ampm_db = $_POST['to_ampm_db'] ?? '';
    $additional_info_db = $_POST['additional_info_db'] ?? '';
    
$days_db = $_POST['days_db'] ?? [];
if (!is_array($days_db)) {
    $days_db = [$days_db];
}
$days_string = implode(",", $days_db);

if ($firstname_db && $lastname_db) {
    $stmt = $conn->prepare("INSERT INTO application_table (firstname_db, middlename_db, lastname_db, birthdate_db, email_db, contact_db, province_db,
    city_db, barangay_db, address_db, college_db, course_db, occupation_db, department_db, area_volunteer_db, activities_volunteer_db,
    volunteering_info_db, days_db, from_hour_db, from_ampm_db, to_hour_db, to_ampm_db, additional_info_db) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("sssssssssssssssssssssss", $firstname_db, $middlename_db, $lastname_db, $birthdate_db, $email_db, $contact_db, $province_db,$city_db,
    $barangay_db, $address_db, $college_db, $course_db, $occupation_db, $department_db, $area_volunteer_db, $activities_volunteer_db,
    $volunteering_info_db, $days_string, $from_hour_db, $from_ampm_db, $to_hour_db, $to_ampm_db, $additional_info_db);

        if ($stmt->execute()) {

            // Prepare variables for echo
            $fullName = $firstname_db . " " . $middlename_db . " " . $lastname_db;
            $address = $address_db;
            $area = $area_volunteer_db;
            $activity = $activities_volunteer_db;
            $daysText = $days_string;
            $time = $from_hour_db . " " . $from_ampm_db . " to " . $to_hour_db . " " . $to_ampm_db;

            // Display confirmation message
            echo "<h1>Thank you for volunteering, $fullName of $address.</h1>";
            echo "<p>You will be assigned to take care of the $area for the following activity: $activity.</p>";
            echo "<p>We understood that you will only be available during $daysText from $time.</p>";
            echo "<p>Thank you, and see you at the next activity!</p>";

        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();

    } else {
        echo "Please fill in both First Name and Last Name.";
    }

    $conn->close();
}

?>
