<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
    <style>
      .input{
        width: 50%;
    padding: 2%;
    margin-left: 4%;      }
    
.register {
  padding: 20px;
  border-radius: 0.3rem;
  background-color: maroon;
  color: white;
  font-size: 20px;
  margin-top: 3%;
}

    </style>
  <title>Registration</title>
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
      <h2 class="h2">Register</h2>

        <form class="form-control" method="post">
          <label class="lb" for="email1">Email:</label><br />
          <input
            type="email"
            id="email1"
            name="email1"
            class="input"
            placeholder="Enter you'r Email"
            required
          />
          <br> <br>
          <label class="lb" for="email2">Repeat Email: </label><br />
          <input
            type="email2"
            id="email2"
            name="email2"
            class="input"
            placeholder="Repeat email"
            required
          />
          <br> <br>
          <label class="lb" for="name">Nickname:</label><br />
          <input
            type="text"
            id="name"
            name="name"
            class="input"
            placeholder="Enter a nickname"
          />
          <br> <br>
          <label class="lb" for="phone">Phone Number: </label>
          <br />
          <input
            type="text"
            id="phone"
            name="phone"
            class="input"
            placeholder="Enter a phone number"
          />
          <br> <br>

          <label class="lb" for="pass">Password: </label>
          <br />
          <input
            type="password"
            id="pass"
            name="pass"
            class="input"
            placeholder="Enter a password"
          />
          <br /><br />
          <div id="btn">
		<input class="register" type="submit" name="save" value="submit">
          </div>
          <br />
        </form>
        </div>

        <?php
include_once 'config.php';

if(isset($_POST['save']))
{	 
	 $email1 = $_POST['email1'];
	 $name = $_POST['name'];
	 $phone = $_POST['phone'];
	 $pass = $_POST['pass'];

     
	$check=mysqli_query($conn,"select * from users where Email='$email1' ");
	$checkrows=mysqli_num_rows($check);

    if($checkrows > 0) {
      echo "customer exists";
    } else {  

	 $sql = "INSERT INTO users (Email,Nickname,Phone_Number,password) VALUES ('$email1','$name','$phone','$pass')";
	 if (mysqli_query($conn, $sql)) {
		echo "New user Added successfully !";
	 } else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
} }
?>

  </body>
</html>
