<?php

    session_start();

    //setting the variables
    $_SESSION['adminname']=$_COOKIE['aname'];
    $_SESSION['adminpassword']=$_COOKIE['apass'];

        $aname = $_SESSION['adminname'];
        $apassword = $_SESSION['adminpassword'];

        //conecting to the server
        $conn = mysqli_connect("localhost","root","","punchx");

        $sql = mysqli_query($conn,"select * from admin where username='$aname' AND password='$apassword'");

        $row = mysqli_fetch_assoc($sql);

        if(!$row){
            header("Location:admin_login.php");
        }
        else{     
        }
        session_destroy();
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PunchX</title>

    <!--Page icon-->
    <link rel="icon" type="image/x-icon" href="punchxlogo.png">

    <!--Google API fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@100&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@100&family=Great+Vibes&display=swap" rel="stylesheet"> 

        
    <!--Including bootstrap to the page-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
  
    <style>
        /*Forum sizing and so on*/
        .frm{
            position : relative;
            overflow : hidden;
            border : solid lightgrey;
            margin : 0 auto;
            border-width : 2px;
            border-radius : 5px;
            padding : 3%;
            
        }
        /*To validate the screen size for the form width*/
        @media screen and (max-width : 540px) {
            .frm {
                width : 60%;
            }
        }
        @media screen and (min-width : 540px) {
            .frm {
                width : 50%;
            }
        }
        @media screen and (min-width : 800px) {
            .frm {
                width : 320px;
                left:-10%;
            }
        }    
        @media screen and (min-width : 1000px) {
            .frm {
                width : 320px;
                left:-20%;
            }
        }
        </style>

    <!--Style for the page-->
    <style>
        .head1{
        font-family : 'Alegreya Sans SC';
        font-size : 300%;
        background-color : #fbfbfb;
        color :black;
        }
        .head2{
            font-family : 'Great Vibes';
            background-color : #fbfbfb;
            color : black
        }
        .navbar{
            margin-bottom: 0;
            position: absolute;
            display: flex;
            flex-wrap: nowrap;
            text-align: center;
            border-bottom: groove black;
        }   
        .navbars{
            margin:0;
            background-color: #fbfbfb;
            padding: 2px;
            box-shadow: rgba(0, 0, 0, 0.15) 2.4px 2.4px 3.2px;
            border:none;
            color:black;
            text-decoration: none;
        }
        .navbars:hover{
            box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
            border-bottom:solid #fbfbfb;
            border-width: 2px;
        }

        /*To validate the screen size*/
        @media screen and (max-width : 540px) {
            .navbar {
            width : 100%;
            left:5px;
            }
        }
            @media screen and (min-width : 540px) {
            .navbar {
                width : 90%;
                left: 3%;
            }
        }
        @media screen and (min-width : 800px) {
            .navbar {
                width : 60%;
                left: 10%;
            }
        }
        @media screen and (min-width : 1000px) {
            .navbar {
                width : 50%;
                left: 10%;
            }
        }
        @media screen and (min-width : 1300px) {
            .navbar {
                width : 40%;
                left: 10%;
            }
        }
        .outf{
            color: olivedrab;
            display: inline;
        }
        .outs{
            color: #fa292a;
            display: inline;
        }
    </style>
    


</head>



<body>

    <!--header-->
    <div class="container-fluid p-5">
        <h3 class="head1 shadow">PUNCH<span class="head2">X</span>
        </h3>
    </div>

    

    <!--Menu bar-->
    <div class="navbar">
        <a class="navbars" href="punchedout.php" >Punched out</a>
        <a class="navbars" href="punchedin.php" >Punched in</a>
        <a class="navbars" href="register.php" >Register user</a>
        <a class="navbars" href="dlts.php" >Delete / New device</a>
    </div>
    <br>
    <br>
    <br>
    <br>
    
    
    <div>
        <form action="" method="POST" class="frm">

            <fieldset>
                <legend><b>Delete user</b></legend>
            </fieldset>

            <br>
            <input class="inp" type="text" name="username" placeholder="Userid" autocomplete="off" required>
            

            <?php

                    session_start();

                    //setting the variables
                    $_SESSION['username']=$_POST['username'];

                    //validating the session variables
                    if (isset($_POST['delete'])){
                        if($_SERVER['REQUEST_METHOD']==='POST'){

                            echo "<br>";
                            echo "<br>";
                            
                            $uname = $_SESSION['username'];


                            $sql = mysqli_query($conn,"select * from user where uid='$uname'");

                            $drow = mysqli_fetch_assoc($sql);

                            if(!$drow){
                                echo "<p class='outf'>* user dont exists</p>";   
                            }   
                            else{
                                $sql = mysqli_query($conn,"delete from user where uid='$uname'");
                                if($sql){
                                    echo "<p class='outs'>* user deleted</p>";  
                                    $sql = mysqli_query($conn,"drop table $uname");
                                }
                            }
                        }
                    }
                    if (isset($_POST['rereg'])){
                        if($_SERVER['REQUEST_METHOD']==='POST'){

                            echo "<br>";
                            echo "<br>";
                            
                            $uname = $_SESSION['username'];

                            //conecting to the server

                            $sql = mysqli_query($conn,"select * from user where uid='$uname'");

                            $drow = mysqli_fetch_assoc($sql);


                            if(!$drow){
                                echo "<p class='outs'>* user dont exists</p>";   
                            }   
                            else{
         
                                $sql = mysqli_query($conn,"update user set hash='0' where uid='$uname'");

                                $sql = mysqli_query($conn,"select hash from user where uid='$uname'");

                                $slr = mysqli_fetch_all($sql,MYSQLI_ASSOC);

                                foreach($slr as $slrs){
                                    $slrs["hash"];
                                }

                                if($slrs["hash"]==0){
                                    echo "<p class='outf'>Re-registered</p>";   
                                }   
                            }
                        }
                    }
            ?>


            <br>
            <br>
            
            <input type="submit" value="Delete user" name="delete">
            <input type="submit" value="Reregister" name="rereg">

            <br>
            <br>
            <p>* select delete user to delete the user and Reregister to allow login from a new device</p>

        </form>
    </div>



    <!--copyright footer-->
    <br><br>
    <div>
    <a href="https://github.com/Mr1-D3CRYPT" target="_blank" style="text-decoration:none">
    <h5 style="margin:10%;font-family: Cardo;font-size: small;position: relative;">© 2022 PUNCHX</h5>
    </a>
    </div>

</body>
</html>