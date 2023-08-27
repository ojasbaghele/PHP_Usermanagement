<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
      
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" style="height: 400px;
    width: 550px;"> 
        <br>
            <h1><?php  echo "Hello {$_SESSION["username"]}.  " ?> </h1>
            <h1>Welcome to Your Dashboard</h1><br><br>

            <h2><?php  echo "Your Email Address is : {$_SESSION["email"]} " ?> </h2>

            <button><a href ="logout.php">Log Out</a></button>  
        </form>
        
</body>
</html>