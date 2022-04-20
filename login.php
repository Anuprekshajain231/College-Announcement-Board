<?php
session_start();
include 'db/db.php';
$database = mysqli_select_db($con,'nsp');
// if (!$database) {
//    echo '<script type ="text/javascript"> alert("Server Down.\nPlease try again later.");window.location= "signin.php"</script>';
//   die();
// }

$email = $_POST['email'];
$pass = $_POST['password'];

$email = stripcslashes($email);
$pass = stripcslashes($pass);

$email = mysqli_real_escape_string($con,$email);
$pass = mysqli_real_escape_string($con,$pass);

$result = mysqli_query($con,"select * from signup where email = '$email'") or die("failed to query database".mysqli_error());
$row = mysqli_fetch_array($result);
if (($row['email'] !== $email)) {
    // code...
    echo '<script type ="text/javascript"> alert("Username does nor exists.\nPlease Make Your account first.");window.location= "signup.php"</script>';
    die();

}

$result = mysqli_query($con,"select * from signup where email = '$email' and pass = '$pass'") or die("failed to query database".mysqli_error());
$row = mysqli_fetch_array($result);

if ($row['email'] == $email && $row['pass'] == $pass) {
    $_SESSION['email']=$email;

    echo '<script type ="text/javascript"> alert("login Successfully!! welcome ");window.location= "homepage_aayega_yaha.html"</script>';

}else{
    // code...
    echo '<script type ="text/javascript"> alert("Either Username or Password is incorrect");window.location= "login new.html"</script>';
}
 ?>