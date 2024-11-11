<?php
$username = 'admin1';
$password = 'password1';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    if ($input_username == "") {
        $message = "Please enter a username before submitting";
    } elseif ($input_password == "") {
        $message = "Please enter a password before submitting";
    } else {
        if ($input_username === $username && $input_password === $password) {
            header("Location: index.php");
            exit();
        } else {
            $message = "Incorrect Log in Details";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/login.css">

</head>
<body>

<div class="nav">
  <div class='title'>Admin Management System</div>  
  <a class="active" href="login.php">Enigma Inc.</a>


  </div>
</div>
<form method="POST" action="login.php">
<body class="Login">
        <p class="Login">Admin Login</p>
        <img class="Icon" src="login.png" alt="LoginIcon">
        <div class='Form'>
        <label class='label'for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label class='label'for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        
      <button type="submit">Login</button>
      <p><?php echo $message?></p>
      
</div>
    </body>
</form>



</body>
</html>
<!--https://icons8.com/icons/set/login--white !-->
 
