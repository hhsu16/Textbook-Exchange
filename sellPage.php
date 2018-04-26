
<!DOCTYPE html>
<html>
<title>Sell Page</title>
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
  padding: 0px;
  margin-top: 70px; <!-- Adjust content -->
  height: 1100px; /* Used in this example to enable scrolling */
}

<!-- info box -->

* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 50%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: left;


    margin-top: 100px;        <!-- add this -->
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: center;       <!-- it was left here -->
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 50%;
        margin-top: 0;
    }
}

</style>
</head>

<body>
<!-- menu bar -->


<div class="navbar">
<a href="#TEXTBOOK EXCHANGE" style="letter-spacing: 3px;">TEXTBOOK EXCHANGE</a>

<a href="#LOGOUT" style="float: right;">LOGOUT</a>

</div>


<div class="main">

<div class="container">


  <!-- content -->
<form action="sell.php" method="get">


    <div class="row">
      <div class="col-25">
        <label for="bname">Book Title</label>
      </div>

      <div class="col-75">
        <input type="text" name="bookname" placeholder="Book name..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="Aname">Author</label>
      </div>
      <div class="col-75">
        <input type="text" name="fullname" placeholder="Author name ...">
      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="ISBN">ISBN</label>
      </div>

      <div class="col-75">
        <input type="text" name="ISBN" placeholder="ISBN..">
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="Condition">Condition</label>
      </div>

      <div class="col-75">
        <input type="text" name="Condution" placeholder="good, ok, bad..">
      </div>
    </div>



    <div class="row">
      <div class="col-25">
        <label for="Price">Price</label>
      </div>

      <div class="col-75">
        <input type="text" name="Price" placeholder="Price...">
      </div>
    </div>


    <!-- uploading picture function -->



    <div class="row">
      <div class="col-25">
        <input type="file" >
      </div>
    </div>
    <script>
    function myFunction() {
        var x = document.getElementById("myFile");

    }
    </script>


    <div class="row">
      <button type="submit" name="submit">Submit</button>
    </div>
  </form>
</div>
</div>


</body>


</html>
