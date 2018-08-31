<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
 require('includes/includes.php');
if (isset($_POST['username']) and isset($_POST['password'])){
$password = $_POST['password'];
$username = $_POST['username'];
$query = "SELECT * FROM `user` WHERE username='$username'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
while($array = mysqli_fetch_assoc($result)){
  $hash = $array['password'];
}
if (password_verify($password, $hash)) {
  $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
} else {
  echo 'Incorrecte wachtwoord.';
} 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$array = mysqli_fetch_array($result);
$Id = $array['id'];
$count = mysqli_num_rows($result);
if ($count == 1){
$_SESSION['username'] = $username;
$_SESSION['Id'] = $Id;
}else{
$fmsg = "<h4 style='color: #556639;'>Incorrecte gegevens.</h4>";
}
}
if (isset($_SESSION['username'])){
header('location:logged_in_posts.php');
}else{
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="includes/style.css" >
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form class="form-signin" method="POST">
<?php
echo $fmsg;
?>
        <h2 class="form-signin-heading" style="color: #b4eb7e;">Please Login</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">@</span>
	  <input type="text" name="username" class="form-control" placeholder="Username" required>
	</div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>
      </form>
</body>
<?php
}
?>
</html>