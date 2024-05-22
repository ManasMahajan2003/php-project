<?php
$insert=false;
if(isset($_POST['name'])){
    $server="localhost";
    $username="root";
    $password="MirrorGuy@12092003";
    $con=mysqli_connect($server,$username,$password);
    if(!$con){
        die("Connection to this database failed due to " . mysqli_connect_error() );
    }
    $name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];
    $sql="INSERT INTO `trip`.`trip` (`name`,`age`,`email`,`phone`,`other`,`dt`) VALUES ('$name','$age','$email','$phone','$desc',current_timestamp());";
    // echo $sql;
    if($con->query($sql)==TRUE){
        // echo "Successfully added";
        $insert=true;
    }else{
        echo "Error: $sql <br> $con->error";
    }
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Travelling Service</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to our Trip form</h1>
        <p>Enter your details to be a part of next trip</p>
        <?php
            if($insert==true){
                echo "<p class='submitMsg'> Thanks for submitting your form. We are happy to see you joining us for the trip</p>";
            }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter you phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
</body>
</html>