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

        $sql = mysqli_query($conn,"select uid,password,name,batch,contact,parent,address,pcontact,mail from user where status='in'");
        $crow = mysqli_fetch_all($sql,MYSQLI_ASSOC);

        foreach($crow as $crows){
           echo "<pre>User ID        : </pre>".$crows["uid"];
           echo "<br>";

           echo "<pre>Name           : </pre>".$crows["name"];
           echo "<br>";

           echo "<pre>Deptartment    : </pre>".$crows["batch"];   
           echo "<br>";

           echo "<pre>Contact        : </pre>".$crows["contact"];
           echo "<br>";

           echo "<pre>Parent         : </pre>".$crows["parent"];
           echo "<br>";

           echo "<pre>Address        : </pre>".$crows["address"];
           echo "<br>";

           echo "<pre>Parent Contact : </pre>".$crows["pcontact"];
           echo "<br>";

           echo "<pre>E-mail         : </pre>".$crows["mail"];
           echo "<br>";
           echo "<br>";
           }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        pre{
            display: inline;
        }
    </style>
</head>
<body>
    
</body>
</html>