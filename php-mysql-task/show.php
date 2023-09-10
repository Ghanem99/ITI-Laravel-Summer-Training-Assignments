<?php 

// show the user with the give id form get 

$id = $_GET['id']?? '';

// create a connection
$connection = mysqli_connect('localhost', 'root', '', 'db-st');

// create a query
$query = "SELECT * FROM users WHERE id = $id";

// execute the query
$result = mysqli_query($connection, $query);
?>


<?php 

$user = mysqli_fetch_assoc($result);
// print the user in a table
?>

First Name: <?php echo $user['fname']; ?> <br>
Last Name: <?php echo $user['lname']; ?> <br>
Email: <?php echo $user['email']; ?> <br>

<a href="index.php">Back Home</a>



