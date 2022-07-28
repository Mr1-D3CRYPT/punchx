<?php


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
        $hrows["hash"];
    } 

    if($hrows["hash"]==0){
        $h = rand(9990000,999999999999999);
        $ck_hash = md5($n);
        unset($_COOKIE["uhash"]);
        setcookie("uhash",$ck_hash,2147483647);
        $sql = mysqli_query($conn,"update user set hash='$ck_hash' where uid='$uname'");
    }

    $_SESSION['hash']=$_COOKIE['uhash'];
    $uhsh = $_SESSION['hash'];
    

    //conecting to the server     
    $sql = mysqli_query($conn,"select * from user where uid='$uname' AND password='$upassword' AND hash='$uhsh'");

    $row = mysqli_fetch_all($sql,MYSQLI_ASSOC);

    foreach($row as $rows){
        $rows["status"];
    } 


    if(!$rows){
        header("Location:login.php");
    }
    else{ 
        if($rows["status"] == "in"){
            $sql=mysqli_multi_query($conn,"update user set status='out' where uid='$uname'");
        }
        else{
            $sql=mysqli_multi_query($conn,"update user set status='in' where uid='$uname'");
        }
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

    <div class="container-fluid p-5">
        <h3 class="head1 shadow">PUNCH<span class="head2">X</span>
        </h3>
    </div>
    <br>
    <br>
    
    <div style="text-align:center">
        <?php
            $sql = mysqli_query($conn,"select status from user where uid='$uname'");
            $result = mysqli_fetch_all($sql,MYSQLI_ASSOC); 

            foreach($result as $results){
                $s = $results["status"];
            }
            if($results["status"]=="in"){
                echo '<p class="clri">';
            }
            else{
                echo '<p class="clro">';
            }

            echo $uname." punched ";
            echo $results["status"];
            echo " at : ";
    
            if (function_exists('date_default_timezone_set'))
            {
                date_default_timezone_set('Asia/Kolkata');
            }

            $t = date('h:i:s a');
            echo $t;

            $a = date('a');  
            $b = date('i:s');
            
            $d = date('Y-m-d');            
            
            if($a == 'pm'){
                $ti = 12+$t.':'.$b;
            }
            else{
                $ti = date('h:i:s');
            }
    
            $sql = mysqli_query($conn,"update user set time='$ti',date='$d' where uid='$uname'");
            $sql = mysqli_query($conn,"insert into $uname(status,crdate,crtime) values('$s','$d','$ti')");

               
            $file_name = "notif.mp3";
                echo '<audio autoplay="true" style="display:none;">
                    <source src="'.$file_name.'">
                    </audio>';            
        ?>
    </p>

    <br>
    <p>Your action will be performed automatically. If not <a href="user.php" class="lnk">click here</a></p>

    </div>



    <!--copyright footer-->
    <div>
    <a href="https://github.com/Mr1-D3CRYPT" target="_blank">
    <h5 style="margin:10%;margin-top:15%;font-family: Cardo;font-size: small;position: absolute;">© 2022 PUNCHX</h5>
    </a>
    </div>

</body>
</html>