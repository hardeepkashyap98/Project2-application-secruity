<?php
ob_start();
// access the current session

//header
$page_title='Saving Your book';

//embed the header
require_once ('header.php');


// save form inputs into variables
$author = $_POST['author'];
$title = $_POST['title'];
$year = $_POST['year'];
$publication = $_POST['publication'];

$photo = null;

// create a variable to indicate if the form data is ok to save or not
$ok = true;

// check each value
if (empty($title)) {
    // notify the user
    echo 'Title is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}
if (empty($year)) {
    // notify the user
    echo 'Year is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}
else if (is_numeric($year) == false) {
    echo 'Year is invalid<br />';
    $ok = false;
}

if (empty($publication)) {
    // notify the user
    echo 'publication is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}

if (empty($author)) {
    // notify the user
    echo 'author is required<br />';

    // change $ok to false so we know not to save
    $ok = false;
}


// check the $ok variable and save the data if $ok is still true (meaning we didn't find any errors)

if ($ok == true) {

try{

// connect to the database
    require ('db.php');

        // set up the SQL INSERT command
        $sql = "INSERT INTO books (title, year, publication, author) VALUES (:title, :year, :publication, :author)";

// create a command object and fill the parameters with the form values
$cmd = $conn->prepare($sql);
$cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
$cmd->bindParam(':year', $year, PDO::PARAM_INT);
$cmd->bindParam(':publication', $publication,PDO::PARAM_STR, 100);
$cmd->bindParam(':author', $author, PDO::PARAM_STR, 100);


// execute the command
$cmd->execute();

// disconnect from the database
$conn = null;
}
catch (Exception $e) {
    //mail('harrykashyap98@gmail.com', 'COMP1006 Web App Error', $e);
    header('location:error.php');
    exit();
}
    header('location:books.php');
   
}

require_once ('footer.php');
ob_flush();
?>

