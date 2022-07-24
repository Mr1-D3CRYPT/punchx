<?php

    session_start();

    //setting the variables
    $_SESSION['adminname']=$_POST['adminname'];
    $_SESSION['adminpassword']=$_POST['adminpassword'];


    //validating the session variables
    if (isset($_POST['submit'])){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            
            session_start();

            $name = $_SESSION['adminname'];
            $password = $_SESSION['adminpassword'];

            //conecting to the server
            $con = mysqli_connect("localhost","root","","punchx");


            //validating it
            $pass = md5($password);


            $sql = mysqli_query($con,"select * from admin where username='$name' AND password='$pass'");

            $row = mysqli_fetch_assoc($sql);

            setcookie("aname",$name,2147483647);
            setcookie("apass",$pass,2147483647);
                            
            if(!$row){
                echo "<script>alert('Please enter the correct username and password')</script>"; 
            }
            else{

                header("Location:punchedout.php");
            }
            session_destroy();
            mysqli_close($con);
        }
    }


?>





<!DOCTYPE html>
<html lang="en">




<!--Head of the page-->
<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--Page icon-->
    <link rel="icon" type="image/x-icon" href="punchxlogo.png">
    
    <!--Including bootstrap to the page-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    
    <!--Connecting the css file-->
    <link href="punchx.css" rel="stylesheet">    

    <!--Google API fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@100&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans+SC:wght@100&family=Great+Vibes&display=swap" rel="stylesheet"> 

    <!--Title of the page-->
    <title>PunchX</title>


</head>





<!--styling the api stuffs-->
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
    .inp{
    border-left-width: 3px;
    border-bottom-color: black;
    border-top-style: hidden;
    border-right-style: hidden;
    border-left-style: hidden ;
    border-bottom-style: groove;
    outline:none;
    resize:none;
    }

</style>






<!--Body of the page-->
<body>
    
    <!--The login page's top logo-->
    <div class="container-fluid  p-5">
        <h3 class="head1 shadow">PUNCH<span class="head2">X</span>
        </h3>
    </div>
    <br>
    <br>

    <!--The form part-->
    <div>
        <form action="" method="POST" class="frm">

            <fieldset>
                <legend><b>Login as Admin</b></legend>
            </fieldset>

            <br>
            <input class="inp" type="text" name="adminname" placeholder="Username" autocomplete="off" required>
            <br>

            <br>
            <input class="inp" type="password" name="adminpassword" placeholder="Password" required>
            <br>
            <br>
            
            <input type="submit" value="Login" name="submit">

        </form>
    </div>

    <br>


    <!--copyright footer-->
    <div>
        <a href="https://github.com/Mr1-D3CRYPT" target="_blank">
        <h5 style="margin:10%;margin-top:15%;font-family: Cardo;font-size: small;position: absolute;">© 2022 PUNCHX</h5>
        </a>
    </div>

</body>
</html>