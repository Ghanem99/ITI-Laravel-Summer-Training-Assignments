<a href="register.php">Add</a>

<table border=2>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Image</th>
    </tr>

    <?php 
    // connect to the database to list all users 
    $conn = mysqli_connect('localhost', 'root', '', 'db-st');
    
    // select all users from the database
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    // loop through the result to display all users
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['fname'] . '</td>';
        echo '<td>' . $row['lname'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        // echo the image from the images directory
        echo '<td><img src="images/' . $row['image'] . '" width=100></td>';
        echo '</tr>';
    }
    ?>

</table>

