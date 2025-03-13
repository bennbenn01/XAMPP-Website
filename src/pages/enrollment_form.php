<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "bi604";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn) {
    die("Connection failed!...");
}

if(isset($_POST['save'])) {
    $studentID = mysqli_real_escape_string($conn, $_POST['studentID']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);

    $sql = "INSERT INTO Student_Information(studentID,firstname,middlename,lastname,contact,age,street,city,country)
            VALUES ('$studentID','$firstname','$middlename','$lastname','$contact','$age','$street','$city','$country')";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../styles/enrollment_form.css'>
    <title>Enrollment Form</title>
    <script>
        function validateForm(){
            var studentID = document.forms['enrollmentForm']['studentID'].value;
            var firstname = document.forms['enrollmentForm']['firstname'].value;
            var lastname = document.forms['enrollmentForm']['lastname'].value;
            var contact = document.forms['enrollmentForm']['contact'].value;
            var age = document.forms['enrollmentForm']['age'].value;
            var street = document.forms['enrollmentForm']['street'].value;
            var city = document.forms['enrollmentForm']['city'].value;
            var country = document.forms['enrollmentForm']['country'].value;

            if(!studentID || !firstname || !lastname || !contact || !age || 
            !street || !city || !country){
                alert('Please fill up the form');
                return false;
            }

            return true;
        }
    </script>
</head>
<body class='enrollment-form-body'>
    <?php include('../components/header.html')?>

    <br/>

    <form 
        name="enrollmentForm"
        method='POST'
        class='enrollment-form-container'
        action='enrollment_form.php'
        onsubmit="return validateForm()">

        <h2 class='enrollment-form-title'>Enrollment Form</h2>

        <input
            type='text' 
            placeholder='Enter Student ID'
            class='enrollment-form-input'
            name='studentID'
            value='<?php echo isset($studentID) ? $studentID : ''; ?>'>

        <input
            type='text' 
            placeholder='Enter First Name'
            class='enrollment-form-input'
            name='firstname'
            value='<?php echo isset($firstname) ? $firstname : ''; ?>'>

        <input
            type='text' 
            placeholder='Enter Middle Name'
            class='enrollment-form-input'
            name='middlename'
            value='<?php echo isset($middlename) ? $middlename : ''; ?>'> 

        <input
            type='text' 
            placeholder='Enter Last Name'
            class='enrollment-form-input'
            name='lastname'
            value='<?php echo isset($lastname) ? $lastname : ''; ?>'>

        <input
            type='text' 
            placeholder='Enter Contact'
            class='enrollment-form-input'
            name='contact'
            value='<?php echo isset($contact) ? $contact : ''; ?>'>

        <input 
            type='number'
            placeholder='Enter Age'
            min=1
            max=100
            class='enrollment-form-input'
            name='age'
            value='<?php echo isset($age) ? $age : ''; ?>'>

        <h4 class='enrollment-form-text'>Address</h4>

        <input 
            type='text'
            placeholder='Enter Street'
            class='enrollment-form-input'
            name='street'
            value='<?php echo isset($street) ? $street : ''; ?>'>

        <input
            type='text' 
            placeholder='Enter City'
            class='enrollment-form-input'
            name='city'
            value='<?php echo isset($city) ? $city : ''; ?>'>

        <input 
            type='text'
            placeholder='Enter Country'
            class='enrollment-form-input'
            name='country'
            value='<?php echo isset($country) ? $country : ''; ?>'>

        <div class='enrollment-form-button-container'>
            <button
                type='submit' 
                name='save'
                class='enrollment-form-button-submit'>Submit</button>
            <button
                type='reset' 
                class='enrollment-form-button-reset'>Reset</button>
        </div>

        <?php
            if (mysqli_query($conn, $sql)) {
                echo "<script> alert('Record added successfully') </script>";
            } else {
                echo "<script> alert('Error: " . mysqli_error($conn) . "') </script>";
            }
        ?>
    </form>
</body>
</html>