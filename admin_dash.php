<?php
    include("database.php");
    session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
      
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" style="height: auto; width: 1200; margin-top:2%;">
           
            <h3>ADIMN Dashboard</h3>
            <h5> Welcome... <?php echo $_SESSION["username"]?> <br> Email: <?php echo $_SESSION["email"]?></h5>
            

            <div class="container">
        <button class="btn btn-primary" style="margin-top: 10px;margin-bottom: 5px"> <a href ="add_user.php" 
        class="text-light">ADD User</a></button>

        <table class="table table-dark table-striped" >
  <thead>
    <tr>
      <th scope="col">Sr.no</th>
      <th scope="col">User Type</th>
      <th scope="col">User Name</th>
      <th scope="col">Email</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
<?php 
    $sql ="SELECT * FROM  user_management";
    $result = mysqli_query($conn,$sql);
    if($result){
        while ($row= mysqli_fetch_array($result)){
            $id = $row['id'];
            $usertype = $row['userType'];
            $username = $row['username'];
            $email = $row['email'];
            echo '
            <tr>
            <th scope="row"> '.$id.'</th>
            <td>'.$usertype.'</td>
            <td>'.$username.'</td>
            <td>'.$email.'</td>
            <td>
            <button class="btn btn-primary"  style ="margin-top:0px;margin-right: 5px;margin-left: 5px; width: 90px;"><a class="text-light" 
            href="updateUser.php?updateid='.$id.'">Update</a></button>
            <button class="btn btn-danger"  style ="margin-top:0px;margin-right: 5px;margin-left: 5px; width: 90px;"><a class="text-light" 
            href="deleteUser.php?deleteid='.$id.'">Delete</a></button>
            </td>
            </tr> ';
        }
    }

    ?><br><br>

</tbody>
</table>
<button> <a href ="logout.php">Log Out</a></button>
</div>