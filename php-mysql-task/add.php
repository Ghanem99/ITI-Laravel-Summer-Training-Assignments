<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="add.php" method="post">
        <input type="hidden" name="id" placeholder="id">
        <input type="text" name="fname" placeholder="fname">
        <input type="text" name="lname" placeholder="lname">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="password" placeholder="password">
        <input type="submit" value="Add">
    </form>
</body>
</html>

<?php
$fname = $_POST['fname']?? '';
$lname = $_POST['lname']?? '';
$email = $_POST['email']?? '';
$password = $_POST['password']?? '';

// create a connection
$connection = mysqli_connect('localhost', 'root', '', 'db-st');

// create a query from the form data
$query = "INSERT INTO users (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')";
// execute the query
$result = mysqli_query($connection, $query);

// redirect to index.php
if($fname && $lname && $email && $password) {
    header('location: index.php');
}
?>