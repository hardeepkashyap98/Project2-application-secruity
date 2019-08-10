<?php
//set the page title
$page_title = 'User Login';
//embed the header
require_once ('header.php');
?>
<div class="container">
<h1>User Login</h1>
<form method="post" action="save-registration.php">
    <fieldset class="form-group" >
        <label for="username" class="col-sm-2">username*</label>
        <input name="username" id="username" required type="text" />
    </fieldset>
    <fieldset class="form-group">
        <label for="password" class="col-sm-2">Password:*</label>
        <input name="password" id="password" required type="password" />
    </fieldset>
   
    <button  type="submit" class="col-sm-offset-2 btn btn-success" >Login</button>
</form>
</div>
<?php
//embed footer
require_once('footer.php');
?>
