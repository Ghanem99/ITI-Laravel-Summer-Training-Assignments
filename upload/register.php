<?php 
    if(isset($_GET['jsonErrors'])) {
        $errors = [];
        $errors = json_decode($_GET['jsonErrors']);

        foreach($errors as $error){
            echo '<li>' .$error . '</li>';
            echo '<br>';
        }
    }
?>

<form action="add.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="fname" placeholder="First Name"><br>
    <input type="text" name="lname" placeholder="Last Name"> <br>
    <input type="email" name="email" placeholder="Email">   <br>
    <input type="password" name="password" placeholder="Password"> <br>
    <input type="file" name="image"> <br>
    <input type="submit" value="Add"> <br>
</form>
