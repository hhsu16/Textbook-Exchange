<?php 
  
  require 'db.php';
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
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
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

body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
body, html {
    height: 100%;
    line-height: 1.8;
}
body {
  font-size: 17px;
  padding: 10px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: block;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}
.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 2.5px solid black;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

p {
  font-size: 13px;
}

img {
    float: left;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>

<header>
  <div class="navbar">
    <a href="buy&sell.php" style="letter-spacing: 3px;">TEXTBOOK EXCHANGE</a>
    <a href="logout.php"  style=float:right;"> Log Out</a> 
  </div>
</header>

<body>

<h2>Checkout</h2>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
        <div class="form-wrapper cf">
          <div class="five col">
            <div class="title">
              <h2>CHECKOUT</h2>
              <?php 
                $id = $_GET["id"];
                $result = $mysqli->query("SELECT * FROM booklist WHERE id=$id");
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
                            $_SESSION['seller'] = $row['seller'];
                                         

                            echo "<div>
                            <img src=".$_SESSION['image']." alt=\"Book Picture\" width=\"100\" height=\"150\">
                              <div>
                                <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Book Name: ".$_SESSION['title']."</p>                                
                                <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Condition:Good</p>
                                <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Seller: ".$_SESSION['saler']."</p>
                                <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp CHECKOUT TOTAL: ".$_SESSION['price']."</p>
                              </div>
                              </div> ";
                        }
                      }
                  }

              ?>
              


        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John Smith ">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="name@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="123 1st Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="San Jose">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="CA">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="90001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
             <div class="icon-container">
              <img src = "cards.png" alt="Visa Master Paypal">
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John Smith">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2020">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="123">
              </div>
            </div>
          </div>

        </div>
        <input type="submit" value="submit" class="btn">
      </form>
    </div>
  </div>
</div>

</body>
</html>
