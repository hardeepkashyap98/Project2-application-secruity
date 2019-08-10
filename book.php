<?php
// ob_start();


//set the page title
$page_title = 'Movie Details';


//embed the header
require_once ('header.php');

?>
<script>
function lettersOnly(input){
    var regex = /[^a-z]/gi;
    input.value = input.value.replace(regex, "");
}
</script>
<div class="container">
    <h1>Movie Details</h1>

<form method="post" action="save-book.php" enctype="multipart/form-data">

    <fieldset class="form-group">
    <label for="author" class="col-sm-2" >Author:</label>
    <input name="author" id="author" required type="text" onkeyup="lettersOnly(this)"  />
    </fieldset>

    <fieldset class="form-group">
    <label for="title" class="col-sm-2"  >Title:</label>
    <input name="title" id="title" type="Text"  required  />
    </fieldset>

    <fieldset class="form-group">
    <label for="year" class="col-sm-2" >Year:</label>
    <input name="year" id="year" required type="number" min="1" max="9999" />
    </fieldset>

    <fieldset class="form-group">
    <label for="publication " class="col-sm-2" >Publication :</label>
    <input name="publication" id="lenpublicationgth" required type="text"   />
    </fieldset>
    <button type="submit" class="col-sm-offset-2 btn btn-success" >Submit</button>

</form>
</div>
<?php
//embed footer
require_once('footer.php');
// ob_flush();
?>
