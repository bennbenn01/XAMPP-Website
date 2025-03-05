<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "bi604";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn) {
    die("Connection failed!...");
}

$sql = "SELECT * FROM Student_Information";
$result = mysqli_query($conn, $sql);

if(!$result) {
    die("Query Failed: " . mysqli_error($conn));
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../styles/view_student.css'>
    <title>View Students</title>
</head>
<body class='view-student-body'>
<?php include('../components/header.html')?>

    <div>
        <h1 class='view-student-title'>View Students Information</h1>
        <table class='view-student-table-container'>
            <tr class='view-student-table-header'>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Contact</th>
                <th>Age</th>
                <th>Street</th>
                <th>City</th>
                <th>Country</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tbody class='view-student-table-body'>
                            <td>" . $row['studentID'] . "</td>
                            <td>" . $row['firstname'] . "</td>
                            <td>" . $row['middlename'] . "</td>
                            <td>" . $row['lastname'] . "</td>
                            <td>" . $row['contact'] . "</td>
                            <td>" . $row['age'] . "</td>
                            <td>" . $row['street'] . "</td>
                            <td>" . $row['city'] . "</td>
                            <td>" . $row['country'] . "</td>
                        </tbody>";
                }
            ?>
        </table>
    </div>
</body>
</html>