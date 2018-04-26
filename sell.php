<?php
include_once 'db.php';
/* Registration process, inserts user info into the database
   and sends account confirmation email message
 */

//Set session variables to be used on profile.php page
// $_SESSION['bookname'] = $_POST['bookname'];
// $_SESSION['fullname'] = $_POST['fullname'];
// $_SESSION['ISBN'] = $_POST['ISBN'];
// $_SESSION['Condition'] = $_POST['Condition'];
// $_SESSION['Price'] = $_POST['Price'];

// Escape all $_POST variables to protect against SQL injections
if (isset($_GET['submit']))
{
$Book = $mysqli->escape_string($_GET['bookname']);
$Author = $mysqli->escape_string($_GET['fullname']);
$ISBN = $mysqli->escape_string($_GET['ISBN']);
$Condition = $mysqli->escape_string($_GET['Condition']);
$Price = $mysqli->escape_string($_GET['Price']);
//$Image = $mysqli->escape_string($_POST['myFile']);


    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO book (Book, Author, ISBN, Condition，Price)
            VALUES ('$Book''$Author','$ISBN','$Condition','$Price')";

    // Add user to the database
    if ( $mysqli->query($sql) )     header("location:buy&sell.html");
    else {
        $_SESSION['message'] = 'upload failed!';
        header("location: SELLerror.php");
    }
}
