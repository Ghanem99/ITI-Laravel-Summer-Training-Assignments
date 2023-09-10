<?php
// check if it is a POST request
if($_SERVER['REQUEST_METHOD'] == 'GET') {

    // create a connection
    $connection = mysqli_connect('localhost', 'root', '', 'db-st');

    // create a query
    $query = "SELECT * FROM users";
    // execute the query
    $users = mysqli_query($connection, $query);
}
?>

<h2> <a href="add.php">Add a New</a> </h2>
<h2> <a href="deleteAll.php">Delete All Records</a> </h2>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>f_name</th>
            <th>l_name</th>
            <th>email</th>
            <th>password</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['fname']; ?></td>
                <td><?php echo $user['lname']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['password']; ?></td>
                <td><a href="delete.php?id=<?php echo $user['id']; ?>">Delete</a></td>
                <td><a href="update.php?id=<?php echo $user['id']; ?>">Update</a></td>
                <td><a href="show.php?id=<?php echo $user['id']; ?>">Show</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
