<?php 
/* Main page with two forms: sign up and log in */
session_start();
require 'db.php';

?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
<style>
header
{
  margin:0;
  background-color:#f2f2f2;
  font-family: Arial, Helvetica, sans-serif;
  -webkit-filter: grayscale(40%); /* Safari 6.0 - 9.0 */
  filter: grayscale(40%);
}

.navbar
{
  overflow: hidden;
  background-color:  #ffffff;     /* BACKGROUND COLOR*/
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a
{
  float: left;
  display: block;
  color: #000000;
  text-align: center;
  padding: 20px 16px;
  text-decoration: none;
  font-size: 20px;
}

.navbar a:hover
{
  background: #ddd;
  color: black;
}

body
.main
{
  padding: 0px;
  margin-top: 80px; <!-- Adjust content -->
  height: 1100px; /* Used in this example to enable scrolling */
}

.form {
  background: rgba(19, 35, 47, 0.9); 
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}

.tab-group {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.tab-group:after {
  content: "";
  display: table;
  clear: both;
}
.tab-group li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: rgba(160, 179, 176, 0.25);
  color: #a0b3b0;
  font-size: 20px;
  float: left;
  width: 95%;
  text-align: center;
  cursor: pointer;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
.tab-group li a:hover {
  background: #1873cc;
  color: #ffffff;
}
.tab-group .active a {
  background: DodgerBlue;
  color: #ffffff;
}

.field-wrap {
  position: relative;
  margin-bottom: 40px;
}

input, textarea {
  font-size: 22px;
  display: block;
  width: 96%;
  height: 100%;
  padding: 5px 10px;
  background: none;
  background-image: none;
  border: 1px solid #a0b3b0;
  color: #ffffff;
  border-radius: 0;
  -webkit-transition: border-color .25s ease, box-shadow .25s ease;
  transition: border-color .25s ease, box-shadow .25s ease;

}
input:focus, textarea:focus {
  outline: 0;
  border-color: DodgerBlue;
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

h1 {
  text-align: center;
  color: #ffffff;
  font-weight: 300;
  margin: 0 0 40px;
}


</style>
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) require 'login.php';
}
?>

<header>
  <div class="navbar">
    <a href="index.html" style="letter-spacing: 3px;">TEXTBOOK EXCHANGE</a>
  </div>
</header>

<body>
<div class="main">
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab"><a href="register-form.php">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul>
    
         <div id="login">   
          <h1>Welcome Back!</h1>
          <form action="login-form.php" method="post" autocomplete="off">

            <div class="field-wrap">
                <input type="email" required autocomplete="off" name="email" placeholder="Email">
            </div>
          
            <div class="field-wrap">
              <input type="password" required autocomplete="off" name="password" placeholder="Password">
            </div>
          
            <button class="button button-block" name="login" >Log In</button>
          
          </form>
        </div><!-- /login -->
 </div><!-- /form -->
</div> <!-- /main -->
</body>

</html>
