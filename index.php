<?php
    $insert=false;
    if(isset($_POST['name'])) {
        $server = "localhost";
        $username = "root";
        $password = "";

        $con = mysqli_connect($server, $username, $password);

        if(!$con) {
            die("connection to this database falied due to". mysqli_connect_error());
        }
        // else {
        //     echo "Successfull connected to db";
        // }

        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];

        $sql = " INSERT INTO `travel`.`travel` (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$age',
    '$gender', '$email', '$phone', '$desc', current_timestamp());";

        // echo $sql;

        if($con->query($sql)== true) {
            // echo "Successfully inserted";
            $insert=true;
        }
        else {
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
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="background">
    <div class="container">
        <h2>Welcome to Trip Form</h2>
        <p>
            Enter the details and submit this form to confirm your participation in this trip
        </p>
        <?php
            if($insert==true) {
                echo "<p class='submission'>Thanks for submitting this form</p>";
            }
        ?>

        <form name="validateform" action="index.php" method="post" onsubmit="return validate()">
            <input type="text" name="name" id="id" placeholder="Enter Your Name" required>
            <input type="text" name="age" id="age" placeholder="Enter Your Age" required>
            <input type="text" name="gender" id="gender" placeholder="Your Gender" required>
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phone" id="phone" placeholder="Phone Number" required>
            <textarea name="desc" id="desc" cols="20" rows="5" placeholder="Enter any other information"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="reset">Reset</button> -->
        </form>


    </div>
    <script src="index.js"></script>
</body>
</html>