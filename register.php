<?php
error_reporting(E_ALL & ~E_NOTICE);
  //Start the Session
session_start();
 require('includes/includes.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username'])){
    if($_POST['psw'] === $_POST['psw-repeat']){
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['psw'];
$email = $_POST['email'];
//3.1.2 Checking the values are existing in the database or not
$query = "INSERT INTO `user` (username, email, password) VALUES ('$username', '$email', PASSWORD('$password'))";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
$_SESSION['username'] = $username;
}
else{
    $ww = '<h4 style="color: #b4eb7e;">wachtworden zijn niet gelijk</h4>';
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
header('location:login.php');
}else{
//3.2 When the user visits the page first time, simple login form will be displayed.
?>
<html>
<head>
    <style>
        * {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
    </style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="includes/style.css" >

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form class="form-signin" method="POST">
        <div class="input-group">
            <?php 
            echo $ww;
            ?>
    <h1>Register</h1>
    <hr>

    <label for="gebruiker"><b>Gebruikersnaam</b></label>
    <input type="text" class="form-control" placeholder="Gebruikersnaam" name="username" required><br><br>

    <label for="email"><b>Email</b></label>
    <input type="text" class="form-control" placeholder="Email" name="email" required><br><br>

    <label for="psw"><b>wachtwoord</b></label>
    <input type="password" class="form-control" placeholder="Wachtwoord" name="psw" required><br><br>

    <label for="psw-repeat"><b>herhaal wachtwoord</b></label>
    <input type="password" class="form-control" placeholder="wachtwoord" name="psw-repeat" required>
    <hr>
    <button type="submit" class="registerbtn">Register</button>
  </div>
      </form>
</body>
<?php
}
?>
</html>