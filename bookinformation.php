<!DOCTYPE html>
<html>
<title>Book Info</title>
<head>
<style>

body
{
  margin:0  ;
  background-color:#f2f2f2;


  font-family: Arial, Helvetica, sans-serif;

      -webkit-filter: grayscale(40%); /* Safari 6.0 - 9.0 */
      filter: grayscale(40%);
}

.navbar
{
  overflow: hidden;
  background-color:  #ffffff;			/* BACKGROUND COLOR*/
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
  margin: 150px;
  padding: 20px;
  margin-top: 80px;
  height: 350px; /* Used in this example to enable scrolling */
}

div.relative {
    position: relative;
    width: 400px;
    height: 200px;
    border: 3px solid #73AD21;
}

div.absolute {
    position: absolute;
    top: 80px;
    right: 0;
    width: 200px;
    height: 100px;
    border: 3px solid #73AD21;
}
img {
    float: left;
}
a:link, a:visited {
    background-color: #ffffff;
    padding: 14px 25px;
    text-align: center ;
    text-decoration: none;
    display: inline-block;
}
a:hover, a:active {
    background-color: red;
}
</style>

</head>

<body>

<div class="navbar">

  <a href="#TEXTBOOK EXCHANGE" style="letter-spacing: 3px;">TEXTBOOK EXCHANGE</a>

  <a href="LOG OUT"  style=float:right;"> Log Out</a>
</div>

<div class="main">

<?php
  require "db.php";
  $id = $_GET["id"];
  $result = $mysqli->query("SELECT * FROM booklist WHERE id=$id");



//condition check
  function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
  }

  console_log($_COOKIE['first_name']);
  console_log($_GET["id"]);



  if ( $result->num_rows == 0 ){ // books doesn't exist
    echo "no result";
  }

  else { // book exists
      while ($row = $result->fetch_assoc())
      { 

          if ( $row['sale_status'] == 1 ) 
        {
            $_SESSION['title'] = $row['title'];
            $_SESSION['author'] = $row['author'];
            $_SESSION['ISBN'] = $row['ISBN'];
            $_SESSION['image'] = $row['image'];
            $_SESSION['price'] = $row['price'];
            $_SESSION['saler'] = $row['saler'];
                         

            echo "<div>
            <img src=".$_SESSION['image']." alt=\"Book Picture\" width=\"300\" height=\"400\">
              <div>
                <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Book Name: ".$_SESSION['title']."</p>
                <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Author: ".$_SESSION['author']."</p>
                <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ISBN: ".$_SESSION['ISBN']."</p>
                <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Condition:Good</p>
                <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Price: ".$_SESSION['price']."</p>
                <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Seller: ".$_SESSION['saler']."</p>
              </div>
              </div> ";
        }
      }
}

?>
</div>


<?php
echo" <a href=\"checkout.html?id=".$_GET['id']."\">Check Out</a> ";
?>

</body>

</html>
