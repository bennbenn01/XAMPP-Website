<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "bi604";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    die("Connection failed!...");
}

if(isset($_POST['save'])){
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $studentID = mysqli_real_escape_string($conn, $_POST['studentID']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $ans1 = isset($_POST['ans1']) ? implode(", ", $_POST['ans1']) : '';
    $ans2 = isset($_POST['ans2']) ? implode(", ", $_POST['ans2']) : '';
    $ans3 = isset($_POST['ans3']) ? implode(", ", $_POST['ans3']) : '';

    $sql = "INSERT INTO Student_Survey(date,studentID,firstname,lastname, ans1, ans2, ans3)
            VALUES ('$date','$studentID','$firstname','$lastname', '$ans1', '$ans2', '$ans3')";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../styles/advertisement_survey_form.css'>
    <title>Advertisement Form</title>
</head>
<body class='advertisement-survey-form-body'>
    <?php include('../components/header.html')?>

    <video 
        width=640 
        height=480 
        class='advertisement-survey-form-video'
        controls 
        autoplay 
        muted 
        loop>
        <source src='../../assets/Enrollment.mp4' type='video/mp4'>
    </video>

    <form 
        method='POST'
        class='advertisement-survey-form-container'
        action='advertisement_survey_form.php'>

        <h2 class='advertisement-survey-form-title'>Advertisement Survey Form</h2>

        <input 
            type='date'
            class='advertisement-survey-form-input'
            name='date'
            value='<?php echo isset($date) ? $date : ''; ?>'>

        <input 
            type='text'
            placeholder='Enter Student ID'
            class='advertisement-survey-form-input'
            name='studentID'
            value='<?php echo isset($studentID) ? $studentID : ''; ?>'>

        <input 
            type='text'
            placeholder='Enter First Name'
            class='advertisement-survey-form-input'
            name='firstname'
            value='<?php echo isset($firstname) ? $firstname : ''; ?>'>

        <input 
            type='text'
            placeholder='Enter Last Name'
            class='advertisement-survey-form-input'
            name='lastname'
            value='<?php echo isset($lastname) ? $lastname : ''; ?>'>

        <p class='advertisement-survey-form-text'>1. How do you feel about the school's advertisement?</p>

        <div class='advetisement-survy-form-checkbox-container'>
            <input 
                type='checkbox'
                name='ans1[]'
                value='Very Positive'> 

            Very Positive 
        </div>

        <div class='advetisement-survy-form-checkbox-container'>
            <input 
                type='checkbox'
                name='ans1[]'
                value='Positive'> 

            Positive
        </div>

        <div class='advetisement-survy-form-checkbox-container'>
            <input 
                type='checkbox'
                name='ans1[]'
                value='Neutral'> 

            Neutral
        </div>

         <div class='advetisement-survy-form-checkbox-container'>
            <input 
                type='checkbox'
                name='ans1[]'
                value='Negative'> 

            Negative
        </div>

        <div class='advetisement-survy-form-checkbox-container'>
            <input 
                type='checkbox'
                name='ans1[]'
                value='Very Negative'> 

            Very Negative
        </div>

        <p class='advertisement-survey-form-text'>2. Which platform did you see the advertisement on?</p>

        <div class='advetisement-survy-form-checkbox-container'>
            <input 
                type='checkbox'
                class='advertisement-survey-form-checkbox'
                name='ans2[]'
                value='Social Media'> 
        
            Social Media
        </div>

        <div class='advetisement-survy-form-checkbox-container'>
            <input 
                type='checkbox'
                class='advertisement-survey-form-checkbox'
                name='ans2[]'
                value='TV'> 
            
            TV
        </div>

        <div class='advetisement-survy-form-checkbox-container'>
            <input 
                type='checkbox'
                class='advertisement-survey-form-checkbox'
                name='ans2[]'
                value='Radio'> 
        
            Radio
        </div>

        <div class='advetisement-survy-form-checkbox-container'>
            <input 
                type='checkbox'
                class='advertisement-survey-form-checkbox'
                name='ans2[]'
                value='Online Ads'> 

            Online Ads
        </div>


        <div class='advetisement-survy-form-checkbox-container'>
            <input 
                type='checkbox'
                class='advertisement-survey-form-checkbox'
                name='ans2[]'
                value='Billboards'> 

            Billboards
        </div>

        <p class='advertisement-survey-form-text'>3. Did the advertisement influence your opinion of the school?</p>

        <div class='advetisement-survy-form-checkbox-container'>
            <input 
                type='checkbox'
                class='advertisement-survey-form-checkbox'
                name='ans3[]'
                value='Yes, Definitely'> 

            Yes, Definitely
        </div>

        <div class='advetisement-survy-form-checkbox-container'>
            <input 
                type='checkbox'
                class='advertisement-survey-form-checkbox'
                name='ans3[]'
                value='Yes, To Some Extent'> 
        
            Yes, To Some Extent
        </div>

        <div class='advetisement-survy-form-checkbox-container'>
            <input 
                type='checkbox'
                class='advertisement-survey-form-checkbox'
                name='ans3[]'
                value='No, Not Really'> 
        
            No, Not Really
        </div>

        <div class='advetisement-survy-form-checkbox-container'>
            <input 
                type='checkbox'
                class='advertisement-survey-form-checkbox'
                name='ans3[]'
                value='Not Sure'> 

            Not Sure
        </div>

        <div class='advetisement-survy-form-checkbox-container'>
            <input 
                type='checkbox'
                class='advertisement-survey-form-checkbox'
                name='ans3[]'
                value='No, Not At All'> 

            No, Not At All
        </div>

        <button
            type='submit'
            name='save'
            class='advertisement-survey-form-button'>Submit</button>

        <?php
            if (mysqli_query($conn, $sql)) {
                echo "Record added successfully";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        ?>
    </form>
</body>
</html>