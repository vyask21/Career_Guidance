<?php
ob_start();
session_start();
include_once("db_connect.php");
if(isset($_POST['submit']))
{
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$query = "INSERT INTO student (sname,semail,spass) VALUES ('$username', '$email','$password')";

    $result = mysqli_query($conn, $query);
    echo '<script type="text/JavaScript">  
            alert("Student Sign Up Successful!"); 
            setTimeout(function () {
            $alert.popmake("close");
            }, 5000);
            </script>';
   
if(!$result)
{
$success_message = "Error!";
}
}
?>

<html>
<head>
    <title>Student Registration</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Studentsignup.css">
</head>
<body>
    <div class="box">
    <!-- <img src="avatar.jpg" class="avatar"> -->
        <h1>Student Sign Up </h1>

        <body background="login.jpg" style="background-size: cover;"></body>
        <form method="post">
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="password" name="password2" placeholder="Re-enter Password" required>
            <input type="email" name="email" onkeyup="showHint(this.value)" placeholder="Enter Email">
            <!-- Verification !<a href="mailS.php" style="text-decoration: none; font-family: sans-serif;color: yellow;">&nbsp;Send Otp</a><br>
            <input type="text" name="otp" placeholder="Enter Otp" required> -->
            <input type="submit" name="submit" value="Sign In">
            <!--a href="index.html"><input type="button" name="back" value="back" class="btn btn-primary" /></a><br-->
            Already have an account?<a href="Studentlogin.php" style="text-decoration: none; font-family: sans-serif;color: yellow;">&nbsp;Log In</a><br>
            Home!<a href="fulldemo.php" style="text-decoration: none; font-family: sans-serif;color: yellow;">&nbsp;back</a>
            <!--a href="#">Forgot Password</a-->
        </form>
        <p><span id="txtHint"></span></p>
    </div>
</body>

<!-- javascript -->
    <script>
    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText ;
                }
            }
            xmlhttp.open("GET", "gethint.php?qa=" + str, true);
            xmlhttp.send();
        }
    }
    </script>
    <script type="text/javascript">
    function matchpass(){
    var firstpassword=document.f1.password.value;
    var secondpassword=document.f1.password2.value;

    if(firstpassword==secondpassword){
    return true;
    }
    else{
    alert("password must be same!");
    return false;
    }
    }
    </script>


</html>