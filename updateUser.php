<?php
    include("database.php");
    echo"{$_GET["updateid"]}";
    $id =$_GET["updateid"];
    //session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
      
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
            <h3>Update User</h3>

            <label for="username">Username</label>
            <input required type="text" placeholder="New Username" name="username" >

            <label for="email">Email</label>
            <input  type="email" placeholder="New Email" name="email" >

            <label for="password">Password </label>
            <input  type="password" placeholder="Set a new Password" name="password" >

            <div id=user_type_check>
                <h4>Update User Type :</h4>
            <div id="user_radio">
            <input type="radio" name="usertype" value="user" id="radio"> <p>User</p>
            </div>
            <div id="admin_radio">
            <input type="radio" name="usertype" value="admin" id="radio"> <p>Admin</p>
            </div>
            </div>

            <button type="submit" name="update" value="signup">Update User</button>   
        </form>
        
</body>
</html>
<?php
        

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $usertype = $_POST["usertype"];
    //! Username Validation    
    if (strlen($username)<=3){ 
        if (empty($username)){
            echo " Enter Correct Username <br>";
        }else {
            echo " Username Should Be Atleats 4 Characters long <br>";
        }
    }elseif (!preg_match("/^[a-zA-Z]*$/",$username)){
        echo " Please enter username with Alphbhats only";
    }
    //!Email Validation
    elseif (empty($email)){
        echo " Enter Correct Email, eg-xyz@xyz.com <br>";
    }
    //! Password Validation
    elseif(empty($password)){
        echo " Cannot Submit Without Password, Enter PASSWORD <br>";
    }
    elseif (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)) {
        echo 'the password does not meet the requirements!';
    }
    else{
        //! sql query
        $sql ="UPDATE user_management SET id='$id', userType='$usertype', username='$username',email='$email', password='$password' WHERE id='$id'";
        mysqli_query($conn, $sql);
        echo "{$usertype}, {$username}, {$email}, {$password}";
        echo "User Added To Database Successfully";
        header("Location: admin_dash.php");
    }
}
else{
    echo "Please enter Updated Account Info...";
}



mysqli_close($conn); 
?>