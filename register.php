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
mysqli_close($conn);
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
        .rgs{
            color: olivedrab;
            display: block;
        }
        .rgf{            
            display: block;
            color: red;
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
        <a class="navbars" href="dlts.php">Delete / New device</a>
    </div>
    <br>
    <br>
    <br>
    <br>
    
    
    <div>
        <form action="" method="POST" class="frm">

            <fieldset>
                <legend><b>Register user</b></legend>
            </fieldset>

            <br>
            <input class="inp" type="text" name="userid" placeholder="Userid" autocomplete="off" required>
            
            <br>
            <br>
            <input class="inp" type="text" name="userpassword" placeholder="Password" autocomplete="off" required>
            
            <br>
            <br>
            <input class="inp" type="text" name="name" placeholder="Name" autocomplete="off" required>

            <br>
            <br>
            <!--<input class="inp" type="text" name="batch" placeholder="batch name" autocomplete="off" required>-->
            Batch : 
            <select name="batch" class="inp">
                <option value="BCA">BCA</option>
                <option value="BBA">BBA</option>
                <option value="Bcom">Bcom</option>
                <option value="Economics">Economics</option>
                <option value="Physics">Physics</option>
                <option value="BACE">BACE</option>
                <option value="Maths">Maths</option>
                <option value="BSW">BSW</option>
                <option value="MCA">MCA</option>
                <option value="Mcom">Mcom</option>
                <option value="MBA">MBA</option>
                <option value="MSW">MSW</option>
            </select>

            <br>
            <br>
            <input class="inp" type="tel" name="contact" placeholder="student contact" pattern="[6-9]{1}[0-9]{9}" autocomplete="off" title="Please enter valid phone number" required>

            <br>
            <br>
            <input class="inp" type="text" name="parent" placeholder="parent name" autocomplete="off" required>

            <br>
            <br>
            <input class="inp" type="text" name="address" placeholder="address" autocomplete="off" required>

            <br>
            <br>
            <input class="inp" type="tel" name="pcontact" pattern="[6-9]{1}[0-9]{9}" placeholder="parent contact" title="Please enter valid phone number" autocomplete="off" required>

            <br>
            <br>
            <input class="inp" type="text" name="mail" placeholder="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" autocomplete="off" required>
            <br>
            <br> 


                <?php

                    session_start();

                    //setting the variables
                    $_SESSION['userid']=$_POST['userid'];
                    $_SESSION['userpassword']=$_POST['userpassword'];
                    $_SESSION['name']=$_POST['name'];
                    $_SESSION['batch']=$_POST['batch'];
                    $_SESSION['contact']=$_POST['contact'];
                    $_SESSION['parent']=$_POST['parent'];
                    $_SESSION['address']=$_POST['address'];
                    $_SESSION['pcontact']=$_POST['pcontact'];
                    $_SESSION['mail']=$_POST['mail'];


                    //validating the session variables
                    if (isset($_POST['register'])){
                        if($_SERVER['REQUEST_METHOD']==='POST'){
                            
                            $uid = $_SESSION['userid'];
                            $upassword = $_SESSION['userpassword'];
                            $uname = $_SESSION['name'];
                            $batch = $_SESSION['batch'];
                            $contact = $_SESSION['contact'];
                            $parent = $_SESSION['parent'];
                            $address = $_SESSION['address'];
                            $pcontact = $_SESSION['pcontact'];
                            $mail = $_SESSION['mail'];

                            $upass = md5($upassword);

                            //conecting to the server
                            $con = mysqli_connect("localhost","root","","punchx");


                            //checking if exists
                            $rsql = mysqli_query($con,"select name from user where uid='$uid'");

                            $rrow = mysqli_fetch_all($rsql,MYSQLI_ASSOC);

                            foreach($rrow as $rrows){
                                $rrows["name"];
                            } 

                            if(is_null($rrows["name"])){
                                $csql = mysqli_multi_query($con,"insert into user(uid,password,name,batch,contact,parent,address,pcontact,mail,status,hash) 
                                    values('$uid','$upass','$uname','$batch','$contact','$parent','$address','$pcontact','$mail','in','0')");
                                if($csql){
                                    echo "<p class='rgs'>Entry Sucessfull</p>"; 
                                    $rsql = mysqli_query($con,"create table IF NOT EXISTS $uid(id int primary key AUTO_INCREMENT,status varchar(10),crdate date, crtime time)");
                                    echo "<br>";           
                                }
                            }
                            else{
                                echo "<p class='rgf'>* user already exists</p>"; 
                            }
                        }
                    }
                ?>
           
            <input type="submit" value="Register" name="register">

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