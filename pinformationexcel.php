<?php

include 'conn.php';
$delimiter = ",";

$filename = "PatientInformation.csv";

$f = fopen('php://memory', 'w');

$fields = array('First Name', 'Last Name', 'Date', 'Email', 'Phone','Prefered Contact',
'Date Of Birth','Age','Gender','Conditions','Allergies','Pregnant','On Meds For');


fputcsv($f, $fields, $delimiter);

$patientinformation =  mysqli_query($con, "SELECT * FROM patient_information");
while ($row = mysqli_fetch_array($patientinformation)) {
    $Firstname = $row['first_name'];
    $Lastname = $row['last_name'];
    $date = $row['date'];
    $email = $row['email'];
    $phone = $row['phone'];
    $preferedContact = $row['prefered_contact'];
    $dob = $row['dob'];
    $age = $row['age'];
    $gender = $row['gender'];
    $conditions = $row['conditions'];
    $allergies = $row['allergies'];
    $pregnant = $row['pregnant'];
    $on_medications = $row['on_medications'];

    $lineData = array($Firstname,$Lastname,$date,$email,$phone,$preferedContact,$dob,$age,$gender,$conditions,$allergies,$pregnant,$on_medications);

    fputcsv($f, $lineData, $delimiter);
}

fseek($f, 0);

header('Content-Type: text/xls');

header('Content-Disposition: attachment; filename="' . $filename . '";');

fpassthru($f);
