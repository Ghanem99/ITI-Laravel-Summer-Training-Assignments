<?php 

// validate the data 
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$image = $_FILES['image']['name'];
$errors = [];

// valid the data 
if(empty($fname) || empty($lname) || empty($email) || empty($password) || empty($image)) {
    $errors['all'] = 'All fields are required';
}

// validate the length of fname
if(strlen($fname) < 3) {
    $errors ['fname'] = 'First name must be at least 3 characters';
} 

// validate the length of lname
if(strlen($lname) < 3) {
    $errors ['lname'] = 'Last name must be at least 3 characters';
}

//validate the email
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors ['email'] = 'Please enter a valid email';
}

// validate password
if(strlen($password) < 6) {
    $errors ['password'] = 'Password must be at least 6 characters';
}

// validate the image
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
$extension = pathinfo($image, PATHINFO_EXTENSION);
if(!in_array($extension, $allowedExtensions)) {
    $errors ['image'] = 'Please upload a valid image';
}

if($errors) {
    // redirect to the register page
    $jsonErrors = json_encode($errors);
    header("location: register.php?jsonErrors=$jsonErrors");
} else {

    move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $_FILES['image']['name']);

    // connect to the database 
    $conn = mysqli_connect('localhost', 'root', '', 'db-st');

    // insert the data into the database
    $sql = "INSERT INTO users (fname, lname, email, password, image) VALUES ('$fname', '$lname', '$email', '$password', '$image')";
    mysqli_query($conn, $sql);

    // redirect to the login page
    header("location: list.php");

}


// connect to the database


function prepare($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);

    return $data;
}