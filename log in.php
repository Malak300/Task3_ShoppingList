<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <title>Log In</title>
    <style>
      .input{
        width: 50%;
        padding: 2%;
        margin-left: 4%;      }
    </style>
  </head>
  <body>
    <header>
      <div>
        <h1>⭐Welcome to our website⭐</h1>
      </div>
    </header>
    <br /><br />

    <div class="container">
      <br />
      <h2 class="h2">Log In</h2>
      <form class="form-control" method="post">
        <br />
        <div>
          <label class="email" id="email" for="Email">Email:</label><br />
          <input
            type="email"
            name="email"
            id="email"
            class="input"
            placeholder="Enter an email"
            required
          />
          <br><br>
          
          <label class="password" id="pass" for="Password">Password: </label
          ><br />
          <input
            type="password"
            name="password"
            id="password"
            class="input"
            placeholder="Enter the password"
            required
          />
          <br />
          <input type="checkbox" name="remember-me" />
          <label id="rm" for="remember-me">remember me</label><br /><br />

          <div id="text-right">
            <a href="regis.php" class="text-info"> Register here</a>
            &nbsp;&nbsp;
            <a href="enterPass.html" class="pass-info">change password</a>
            <br /><br />
          </div>

          <div id="btn">
            <input id="loginBtn" class="submit-btn" type="submit" value="LOGIN" />
          </div>
          <br />
        </div>
      </form>
    </div>
    <br /><br /><br />

<?php 
$passwordError = "";
include_once 'config.php';
if(isset($_POST['email'])){
    $email=$_POST['email'];
    $sql=mysqli_query($conn,"select * from users where Email='$email' ");
    if(mysqli_num_rows($sql)==1 ){
        $password=$_POST['password'];
        while ($row=mysqli_fetch_row($sql))
        {
             header("Location: shoppingList.php");
            }}        
            
    else{
        echo " You Have Enteired invalid Email";
        exit();
    }     
}
?>



    <footer>
      <h5>©️ Wissal.A kmerat && Mlak Biadse</h5>
    </footer>
  </body>
</html>
