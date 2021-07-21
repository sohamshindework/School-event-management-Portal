<?php
$insert=false;
if(isset($_POST['name'])){
    $submit=true;
    $server="localhost";
    $username="root";
    $password="";
   

    $con=mysqli_connect($server,$username,$password);

    if(!$con){
        die("connection to the database failed due to".
        mysqli_connect_error());
    }

    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $other=$_POST['other'];
    $sql="INSERT INTO `event`.`details`(`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
    

    if($con->query($sql)==true){
        //echo "Successfully Inserted";
        $insert=true;
    }

    else{
        echo"ERROR: $sql <br> $con->error";
    }
    $con->close();
}    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Event Management Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> "
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpeg" alt="JSPM">
    <div class="container">
        <h1>Welcome to Jspm Rscoe</h3>
        <p>Enter your details and submit this form to confirm your participation in the Event</p>
        <?php
        if($insert==true){
        echo "<p class='submitMsg'>Thanks for submitting the form.We are happy to see you.</p>";
        }

    ?>    
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter you email">
            <input type="phone" name="phone" id="phone" placeholder="Enter you Ph number">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter other information here"></textarea>
            <button class="btn">Submit</button>
            

        </form>
    
    </div>
    <script src="index.js"></script>
    
</body>
</html>