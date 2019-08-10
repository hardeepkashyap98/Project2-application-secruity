<?php
//set the page title
$page_title = 'Books';
//embed the header
require_once ('header.php');

// check if the user entered keywords for searching
$keywords = null;

if (!empty($_GET['keywords'])) {
    $keywords = $_GET['keywords'];
}

try {
// connect to the database
require ('db.php');

    $sql = "SELECT * FROM books";
    $word_list = null;

// check if the user entered keywords for searching
    if (!empty($keywords)) {
        // start the WHERE clause MAKING SURE to include spaces around the word WHERE
        $sql .= " WHERE ";

        // split the keywords into an array of individual words
        $word_list = explode(" ", $keywords);

        // start a counter so we know which element in the array we are at
        $counter = 0;

        //get the search type
        $search_type = $_GET['search_type'];


        // loop through the word list and add each word to the where clause individually
        foreach($word_list as $word) {

            $word_list[$counter] = "%" . $word . "%";
            // for the first word OMIT the word OR
            if ($counter == 0) {
                $sql .= " title LIKE ?";
            }
            else {
                $sql .= " $search_type title LIKE ?";
            }

            // increment counter
            $counter++;
        }
    }


    // execute the query and store the results, passing the $word_list array as a parameter list to the execute() function
    $cmd = $conn->prepare($sql);
    $cmd->execute($word_list);
    $books = $cmd->fetchAll();
?>

<h1>Book Listings</h1>
    <div class="col-sm-6">
        <a href="book.php" title="Add a New book">Add a New Book</a>
    </div>
        <div class="col-sm-6">
            <form method="get" action="Books.php">
              <label for="keywords">Enter Keywords to Search:</label>
              <input name="keywords" value="<?php $keywords; ?>"/>
                <select name="search_type">
                     <option value="OR">Any Keyword</option>
                     <option value="AND">All Keywords</option>
                 </select>
             <button type="submit" class="btn btn-success">Search</button>
         </form>
        </div>
<table class="sortable table table-striped table-hover"><thead><th>Title</th><th>Year</th><th>Publication</th><th>Auhtor</th></thead><tbody>

<?php

// loop through the data and display the results
foreach ($books as $book){
    echo '<tr><td>' . $book['title'] . '</td>
       <td>' . $book['year'] .'</td>
       <td>' . $book ['publication'] . '</td>
        <td>' .$book ['author'] . ' </td>';

}


// close thr grid
echo '</tbody></table>';
// dissconnect
$conn = null;
}
catch (Exception $e) {
    mail('harrykashyap98@gmail.com', 'Project 2', $e);
    header('location:error.php');
}
//embed footer
require_once('footer.php');

// ob_flush();
?>
