<?php 
  session_start();
  if ($_COOKIE['logged_in'] == 0)
  {
    $_SESSION['message'] = "Please log in first!";
    header("location: error.php");
    exit();
  }
?>

<!DOCTYPE html>
<html>
<title>BUY & SELL</title>
<head>
<style>

body
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

.main
{
padding: 0px;
margin-top: 45px;
height: 1100px; /* Used in this example to enable scrolling */
}

img {
width:100%;
}

/* Container holding the image and the text */
.container {
    text-align: center;
    color: white;
}

/* Bottom right text */
.bottom-right {
    position: absolute;
    bottom: 50px;
    right: 60px;
}

.button {
  background-color: #e6e6e6;
  border: none;
  color: black;
  padding: 40px 60px;
  text-align: center;
  font-size: 22px;
  margin: 4px 2px;
  opacity: 0.6;
  transition: 0.3s;
  display: inline-block;
  text-decoration: none;
  cursor: pointer;
}

.button:hover
{
opacity: 1
}

</style>

</head>

<body>

<div class="navbar">
  <a href="index.php" style="letter-spacing: 3px;">TEXTBOOK EXCHANGE</a>
  <a href="logout.php"  style=float:right;"> Log Out</a>  
</div>



<div class="main">
<br>
<div class="container">
<img src="towerhall.jpg" alt="tower hall">

<div class="bottom-right">
<a href="display.php">
<button class="button">BUY</button>
</a>
<a href="SellPage.html">
<button class="button">SALE</button>
</a>

<?php

  function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

  console_log($_COOKIE['first_name']);
  
?>
</div>
</div>

</div>

</body>
</html>