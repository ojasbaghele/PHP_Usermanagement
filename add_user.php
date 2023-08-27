<?php
    include("database.php");
    //session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
      
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" style="height: 650px;width: 450px;">
           
            <h3>ADD a User To Database</h3>

            <label for="username">Username</label>
            <input required type="text" placeholder="Your Username" name="username" >

            <label for="email">Email</label>
            <input  type="email" placeholder="Your Email" name="email" >

            <label for="password">Password </label>
            <input  type="password" placeholder="Set a Password" name="password" >

            <div id=user_type_check>
                <h4>Select User Type :</h4>
            <div id="user_radio">
            <input type="radio" name="usertype" value="user" id="radio"> <p>User</p>
            </div>
            <div id="admin_radio">
            <input type="radio" name="usertype" value="admin" id="radio"> <p>Admin</p>
            </div>
            </div>

            <button type="submit" name="signup" value="signup">Add User</button>  
            <br><br>
            <h4>  
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
                    echo 'Atleast 1 Uppercase, 1 Lowercase,1 Number, 1 Special Character';
                }
                else{
                    //! sql query
                    $sql ="INSERT INTO user_management (userType,username,email,password) VALUES ('$usertype', '$username', '$email', '$password')";
                    mysqli_query($conn, $sql);
                    echo "{$usertype}, {$username}, {$email}, {$password}";
                    echo "User Added To Database Successfully";
                    header("Location: admin_dash.php");
                }
            }
            else{
                echo "Fill up User Details To ADD user to Database";
            }
            ?>
            </h4>
        </form>
        
</body>
</html>
<?php
mysqli_close($conn); 
?>