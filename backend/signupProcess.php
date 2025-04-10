<?php
include "../backend/myConnection.php";

if (isset($_POST['studentSignUpidNumber']) && isset($_POST['studentSignUpUsername']) && isset($_POST['studentSignUpName']) && isset($_POST['studentDepartment']) && isset($_POST['studentSignUpPassword'])) {
    $idNumber = $_POST["studentSignUpidNumber"];
    $username = $_POST["studentSignUpUsername"];
    $fullName = $_POST["studentSignUpName"];
    $department = $_POST["studentDepartment"];
    $password = $_POST["studentSignUpPassword"];


    if ( $idNumber == "" || $username == "" ||$fullName == "" ||$department == "" ||$password == "") {
        $response = [
            'status' => 'error',
            'message' => 'Empty fields! Please fill all the fields.'
        ];
    } else {
        // Hash the password 
        $passwordEncrypt = md5($password);

        // Insert user data into the database
        $query = "INSERT INTO users (idNumber, fullName, username, department, password, type)
                  VALUES ('$idNumber', '$fullName', '$username', '$department', '$passwordEncrypt', 'user')";

        if (mysqli_query($con, $query)) {
            $response = [
                'status' => 'success',
                'message' => 'Sign up successful! Welcome.'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Failed to add record: ' . mysqli_error($con)
            ];
        }
    }
    mysqli_close($con);
} else {
    $response = [
        'status' => 'error',
        'message' => 'All fields are mandatory'
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
