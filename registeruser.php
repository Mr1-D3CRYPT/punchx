<?php
    //registeration page for the user
    if(isset($_COOKIE['uhash'])){
        session_start();

        $conn = mysqli_connect("localhost","root","","punchx");

        //setting the variables
        $_SESSION['username']=$_COOKIE['userid'];
        $_SESSION['userpassword']=$_COOKIE['upasswd'];

        $uname = $_SESSION['username'];
        $upassword = $_SESSION['userpassword'];

        $sql = mysqli_query($conn,"select hash from user where uid='$uname'");

        $hrow = mysqli_fetch_all($sql,MYSQLI_ASSOC);

        foreach($hrow as $hrows){
            $hrows['hash'];
        }

        if($hrows['hash']=='0'){
            header("Location:login.php");
        }
        else{ 
        }
    }
    else{   
        header("Location:login.php");
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
  
 
    <!--Style-->
    <style>
        .btnstl{
            text-align:center;
        }
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
        .lnk{
            text-decoration: none;
        }
        .clro{
            color: red;
        }
        .clri{
            color: green;
        }
    </style>
    

</head>


<body>

    <!--Logo Header-->
    <div class="container-fluid p-5">
        <h3 class="head1 shadow">PUNCH<span class="head2">X</span>
        </h3>
    </div>
    <br>
    <br>
    

    <div style="text-align:center">
        
        <?php

            $sql = mysqli_query($conn,"select fname from user where uid='$uname'");
            $reg = mysqli_fetch_all($sql,MYSQLI_ASSOC);
            
            foreach($reg as $regs){
                $nm = $regs['fname'];
            }
            if($nm!=0){
                header("Location:user.php");
            }
            else{
            }
            

        ?>

        <form action="" method="POST">
            <input class="inp" type="text" name="fname" autofocus pattern="[a-zA-Z]{1,}" placeholder="First Name" autocomplete="off" required>
            <input class="inp" type="text" name="lname" pattern="[a-zA-Z\s]{1,}" placeholder="Middle and Last Name" autocomplete="off" required>

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
            <input class="inp" type="tel" name="contact" placeholder="student contact" pattern="[6-9]{1}[0-9]{9}" autocomplete="off" title="Please enter a valid phone number" required>

            <br>
            <br>
            <input class="inp" type="text" name="parent" pattern="[a-zA-Z\s]{1,}" placeholder="parent name" autocomplete="off" required>

            <br>
            <br>
            <input class="inp" type="text" name="hname" pattern="[a-zA-Z\s]{1,}" placeholder="House Name" autocomplete="off" required>

            <br>
            <br>
            <input class="inp" type="text" name="village" pattern="[a-zA-Z\s]{1,}" placeholder="Village" autocomplete="off" required>
        
            <br>
            <br>
            <input class="inp" type="text" name="city" pattern="[a-zA-Z\s]{1,}" placeholder="City" autocomplete="off" required>

            <br>
            <br>
            <input class="inp" type="pin" name="pin" pattern="^[1-9][0-9]{5}$" placeholder="Pincode" autocomplete="off" required>

            <br>
            <br>
            <input class="inp" type="tel" name="pcontact" pattern="[6-9]{1}[0-9]{9}" placeholder="parent contact" title="Please enter valid phone number" autocomplete="off" required>

            <br>
            <br>
            <input class="inp" type="mail" name="mail" placeholder="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" autocomplete="off" required>
            <br>
            <br> 

            <input type="submit" value="Check in !" name="register">
        </form>

    <?php

         if(isset($_POST['register'])){

            session_start();

            //setting the variables
            $firstname=$_POST['fname'];
            $lastname=$_POST['lname'];
            $batch=$_POST['batch'];
            $contact=$_POST['contact'];
            $parent=$_POST['parent'];
            $hname=$_POST['hname'];
            $village=$_POST['village'];
            $city=$_POST['city'];
            $pin=$_POST['pin'];
            $pcontact=$_POST['pcontact'];
            $mail=$_POST['mail'];

            //entering the values to the database
            $sql = mysqli_query($conn,"update user set fname='$firstname',lname='$lastname',batch='$batch',
            contact='$contact',parent='$parent',house='$hname',village='$village',city='$city',
            pin='$pin',pcontact='$pcontact',mail='$mail' where uid='$uname'");
            
            $sql = mysqli_query($conn,"select fname from user where uid='$uname'");
            $upd = mysqli_fetch_all($sql,MYSQLI_ASSOC);

            foreach($upd as $rgnms){
                $rgns=$rgnms['fname'];
            }
            if($rgns==0){
                echo "Opps !!!";
            }
            else{
                header("Location:user.php");
                echo "<br>Your page should redirect automatically !! Else <a href='user.php'>click here</a>";
                exit;
            }
        }

    ?>

    </div>



    <!--copyright footer-->
    <div>
        <a href="https://github.com/Mr1-D3CRYPT" target="_blank">
            <h5 style="margin:10%;margin-top:15%;font-family: Cardo;font-size: small;position: absolute;">© 2022 PUNCHX</h5>
        </a>
    </div>

</body>
</html>