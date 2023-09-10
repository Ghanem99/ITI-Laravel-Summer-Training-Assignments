<?php

// create a connection
$connection = mysqli_connect('localhost', 'root', '', 'db-st');

// create a query
$query = "DELETE FROM users";

// execute the query
$result = mysqli_query($connection, $query);

// redirect to index.php
header('location: index.php');
