
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <!--CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="js/sorttable.js"></script>

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<nav class="navbar">
    <a href="menu.php" title="Project 2" class="navbar-brand">Project 2</a>
    <ul class="nav navbar-nav">
        

        <li>
            <a href="books.php" title="Books">Books</a>
        </li>

        <li>
            <a href="register.php" title="Login">Login</a>
        </li>
        
    </ul>

</nav>

<!-- page content starts here-->