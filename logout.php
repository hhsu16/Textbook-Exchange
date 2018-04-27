<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Log out</title>
<style>

.form {
  background: rgba(19, 35, 47, 0.9); 
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}

h1 {
  text-align: center;
  color: #ffffff;
  font-weight: 300;
  margin: 0 0 40px;
}


p {
    text-align: center;
    color: #ffffff;
    margin: 0px 0px 50px 0px;
}

.button {
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 15px 0;
  font-size: 2rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: DodgerBlue;
  color: #ffffff;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  -webkit-appearance: none;
}

.button:hover, .button:focus {
  background: #1873cc;
}

.button-block {
  display: block;
  width: 100%;
}

</style>
</head>
<body>

<div class="form">
	<?php 
	// set the expiration date to one hour ago
		setcookie("logged_in", "", time() - 3600);
		setcookie("first_name", "", time() - 3600);

		//condition check
		  function console_log( $data ){
		    echo '<script>';
		    echo 'console.log('. json_encode( $data ) .')';
		    echo '</script>';
		  }

		  console_log($_COOKIE["first_name"]);
		  console_log($_COOKIE["logged_in"]);
	 ?>

	<h1>Thanks for stopping by</h1>

	<p><?= 'You have been logged out!'; ?></p>

	<a href="index.php"><button class="button button-block"/>Home</button></a>
 </div>
</body>
</html>