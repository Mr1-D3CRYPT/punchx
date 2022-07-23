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
  
    <!--Connecting the css file-->
    <link href="punchx.css" rel="stylesheet"> 
    

    <!--Style-->
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
        .navbars:active{
            box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
            border-bottom:solid blue;
            border-width: 3px;
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
        <a class="navbars" href="punchedout.php">Punched out</a>
        <a class="navbars" href="punchedin.php">Punched in</a>
        <a class="navbars" href="register.php">Register user</a>
        <a class="navbars" href="dlts.php">Delete user</a>
    </div>
    <br>
    <br>
    <br>


    <div style="margin-left:20%">

        <?php

            //conecting to the server
            $con = mysqli_connect("localhost","root","","punchx");


            $sql = mysqli_query($con,"select uid from user where status='in'");

            $result = mysqli_fetch_all($sql,MYSQLI_ASSOC);

            if($result){
                foreach($result as $results){
                    echo "<a href='details.php' target='_blank'>";
                    printf($results["uid"]);
                    echo "</a>". "<br>";
                }
            }
            
            else{
                echo "No user punched in";
            }
            mysqli_close($con);
        ?>

    </div>

    <!--copyright footer-->
    <br><br><br>
    <div>
    <a href="https://github.com/Mr1-D3CRYPT" target="_blank">
    <h5 style="margin:10%;margin-top:15%;font-family: Cardo;font-size: small;position: absolute;">© 2022 PUNCHX</h5>
    </a>
    </div>

</body>
</html>