<?php
    include("database.php");
    session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <div  class="button_box">
    <button class="btn btn-primary my-5"><a href ="signup.php"class="text-light">Sign Up</a></button>
    </div>
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
            <h3>Log In</h3><br>

            <label for="username">Username</label>
            <input required type="text" placeholder="Your Username" name="username" >
            <label for="password">Password </label>
            <input  type="password" placeholder="Set a Password" name="password" >

            <div id=user_type_check>
                <h4>Select User Type :</h4>
            <div  id="user_radio">
            <input required type="radio" name="usertype" value="user" id="radio"> <p>User</p>
            </div>
            <div id="admin_radio">
            <input required type="radio" name="usertype" value="admin" id="radio"> <p>Admin</p>
            </div>
            </div>
            <button type="submit" name="login" value="login">login</button> <br><br>
            <h4>  
            <?php 
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $usertype = $_POST["usertype"];
                
                    if (empty($username)){
                    echo " Enter your username";
                    }
                    elseif (empty($password)){
                    echo " Enter your password";
                    }
                    elseif (empty($usertype)){
                        echo " Select User type    ";
                        }
                    $sql ="SELECT * FROM user_management WHERE username = '$username' AND userType ='$usertype' AND password = '$password'";
                    $result =mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) === 1){
                        $row = mysqli_fetch_assoc($result);
                        if ($row['username'] === $username && $row['password'] === $password && $row['userType'] === $usertype){
                            $_SESSION["username"] = $username;
                            $_SESSION["password"] = $password;
                            $_SESSION["email"] = $row['email'];
                            $_SESSION["usertype"] =$row['userType'];
                            
                            echo "YOU Are logged in successfully {$email}";
                            if ($usertype === 'admin'){
                                header("Location:admin_dash.php");
                            }elseif ($usertype === 'user'){
                                header("Location:user_dash.php");
                            }
                        }
                        else{
                            echo "Incorrect username or password or user type";
                        }    
                    }else{
                    echo "Incorrect username or password or user type";
                    } 
                }
                else{
                    echo "Enter Username and Password To Log in into your account";
                }
            ?>

            </h4>
            
        </form>
        
</body>
</html>

<?php
mysqli_close($conn); 
?>