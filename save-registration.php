
<?php

// ob_start();

//header
$page_title='Saving Your Registeration';
//get form inputs
$username = $_POST['username'];
$password = $_POST['password'];
$ok = true;

//validate the inputs
if(empty($username)){
    echo 'Username is required <br />';
    $ok = false;
}


if(empty($password)){
    echo 'Password is required <br />';
    $ok = false;
}

if($ok){
    //salting the password with random letters
    $salted = "hfgqyugo8t8fguif".$password;

    //andding the salt to password and then hashing it
    $hashed = hash('sha512', $salted);

    //hash the inputs
    $password =$hashed;
try{
    //set up and execute the insert
    require ('db.php');

    $sql = 'INSERT INTO login (username, password) VALUES (:username, :password)';

    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':username',$username, PDO::PARAM_STR, 100 );
    $cmd->bindParam(':password',$password, PDO::PARAM_STR, 255);
    $cmd->execute();

    //disconnect
    $conn = null;



}
catch (Exception $e) {
    mail('harrykashyap98@gmail.com', 'project 2', $e);
   header('location:error.php');
}

    header('location:book.php');
    //show a message to the user
    echo 'Registration Saved';
}
// ob_flush();
require_once('footer.php');
?>
