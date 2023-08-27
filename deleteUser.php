<?php
    include("database.php");
    //session_start();
    echo"{$_GET["deleteid"]}";

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];

        $sql ="DELETE FROM user_management WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
        if($result) {
            echo "deleted successfully";
        }
        header("Location:admin_dash.php");
    }
?>