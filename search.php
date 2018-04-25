<?php 
    include_once 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search result</title>
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

.main
{
  padding: 0px;
  margin-top: 80px; <!-- Adjust content -->
  height: 1100px; /* Used in this example to enable scrolling */
}

        html,
        body {
            height: 100%;
        }
        *, *:before, *:after {
            box-sizing: border-box;
        }
        body
        {
            background-color:#f2f2f2;
            font-family: Arial, Helvetica, sans-serif;
            -webkit-filter: grayscale(40%); /* Safari 6.0 - 9.0 */
            filter: grayscale(40%);
        }
        .search{
            width: 50%;
            margin-left: 25%;
            margin-right: 25%;
            margin-top: 1rem;
        }
        .flex-row{
            display: flex;
            flex-direction: row;
            margin: auto;
            justify-content: center;
        }
        .flex-row img {
            width: 10rem;
        }
        .thumbnail {
            margin: 3rem;
        }
        .caption {
            width: 10rem;
            margin: auto;
            margin-top: 1rem;
        }

</style>
</head>

<header>
	<div class="navbar">
    	<a href="index.html" style="letter-spacing: 3px;">TEXTBOOK EXCHANGE</a>
  	</div>
</header>

<body>
<h1>Search Result</h1>
<div class="main">

<form class="search" action = "search.php" method="POST">
	<input type="text" name="search" placeholder="Search your book">
	<button type="submit" name="submit-search">SEARCH</button>
</form>

<?php 

if (isset($_POST['submit-search']))
{
$search = $mysqli->escape_string($_POST['search']);
$result = $mysqli->query("SELECT * FROM booklist WHERE title LIKE '%$search%' OR author LIKE '%$search%' OR ISBN LIKE '%$search%'");

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
            	<div class=\"flex-row\">
					<div class=\"thumbnail\">
						<img src=".$_SESSION['image']." alt=\"agile textbook\">
					<div class=\"caption\">
					<p><a href=\"bookdetail.html\">".$_SESSION['title']."</a></p>
					</div>
            </div> ";	
	    }
    }
}
}

?>
</div>
</body>
</html>