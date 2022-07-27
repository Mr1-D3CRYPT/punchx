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
        pre{
            display: inline;
        }
        .fltrslct{
            border: none;
            background-color: #fbfbfb;
        }
        .mrg{
            margin: 20px;
            margin-left: 20px;
        }
    </style>
    

</head>


<body>




        <!--filter option-->
        <br>
        <br>

        <div class="container">
            <form action="" method="POST">

            <span style="margin-bottom: 15px;"> Filters : </span>
            <br>
            <span class="mrg">Batch : 
            <select name="batch" class="inp">
                <option value="all"></option>
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
            </span>  
            

            Time : <input type="time" name="time" class="fltrslct" class="mrg">
            Date : <input type="date" name="date" class="fltrslct" class="mrg">

            <br>
            <input type="submit" value="Apply Filters" name="apply" class="mrg">
            <input type="submit" value="Clear Filters" name="clear">
            </form>

            <hr>

        </div>
        




    <br>
    <br>
    
    <div style="margin-left:20%">
    
        <?php


            if(isset($_POST['batch'])){
                if(isset($_POST['apply'])){
                    session_start();

                    //setting the variables
                    $_SESSION['adminname']=$_COOKIE['aname'];
                    $_SESSION['adminpassword']=$_COOKIE['apass'];
                    $_SESSION['stat']=$_COOKIE['sta'];
                    $dept=$_POST['batch'];

    
                        $aname = $_SESSION['adminname'];
                        $apassword = $_SESSION['adminpassword'];
                        $st = $_SESSION["stat"];
    
                        //conecting to the server
                        $conn = mysqli_connect("localhost","root","","punchx");
    
                        $sql = mysqli_query($conn,"select * from admin where username='$aname' AND password='$apassword'");
    
                        $row = mysqli_fetch_assoc($sql);
    
                        if(!$row){
                            header("Location:admin_login.php");
                        }
                        else{     
                        }
    
                        $sql = mysqli_query($conn,"select uid,password,name,batch,contact,parent,address,pcontact,mail,time from user where status='$st' AND batch='$dept'");
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
    
                        echo "<pre>Time           : </pre>".$crows["time"];
                        echo "<br>";
                        echo "<br>";
                        }               
                    }
            }



            elseif(isset($_POST['time']) && isset($_POST['date'])){
                if(isset($_POST['apply'])){
                    session_start();

                    //setting the variables
                    $_SESSION['adminname']=$_COOKIE['aname'];
                    $_SESSION['adminpassword']=$_COOKIE['apass'];
                    $_SESSION['stat']=$_COOKIE['sta'];
                    $dept=$_POST['batch'];
                    $time=$_POST['time'];
                    $date=$_POST['date'];
    
    
                        $aname = $_SESSION['adminname'];
                        $apassword = $_SESSION['adminpassword'];
                        $st = $_SESSION["stat"];
    
                        //conecting to the server
                        $conn = mysqli_connect("localhost","root","","punchx");
    
                        $sql = mysqli_query($conn,"select * from admin where username='$aname' AND password='$apassword'");
    
                        $row = mysqli_fetch_assoc($sql);
    
                        if(!$row){
                            header("Location:admin_login.php");
                        }
                        else{     
                        }
                    
    
                        $sql = mysqli_query($conn,"select uid,password,name,batch,contact,parent,address,pcontact,mail,time from user where status='$st' AND date='$date' AND time>'$time'");
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
    
                        echo "<pre>Time           : </pre>".$crows["time"];
                        echo "<br>";
                        echo "<br>";
                        }               
                    }
            }



            elseif(isset($_POST['batch'])  && isset($_POST['date']) && isset($_POST['time'])){
                if(isset($_POST['apply'])){
                    session_start();

                    //setting the variables
                    $_SESSION['adminname']=$_COOKIE['aname'];
                    $_SESSION['adminpassword']=$_COOKIE['apass'];
                    $_SESSION['stat']=$_COOKIE['sta'];
                    $dept=$_POST['batch'];
                    $time=$_POST['time'];
                    $date=$_POST['date'];

    
                        $aname = $_SESSION['adminname'];
                        $apassword = $_SESSION['adminpassword'];
                        $st = $_SESSION["stat"];
    
                        //conecting to the server
                        $conn = mysqli_connect("localhost","root","","punchx");
    
                        $sql = mysqli_query($conn,"select * from admin where username='$aname' AND password='$apassword'");
    
                        $row = mysqli_fetch_assoc($sql);
    
                        if(!$row){
                            header("Location:admin_login.php");
                        }
                        else{     
                        }


    
                        $sql = mysqli_query($conn,"select uid,password,name,batch,contact,parent,address,pcontact,mail,time from user where status='$st' AND batch='$dept' AND date='$date' AND time>'$time'");
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
    
                        echo "<pre>Time           : </pre>".$crows["time"];
                        echo "<br>";
                        echo "<br>";
                        }               
                    }
            }
            

            if(isset($_POST['clear']) || $_POST['batch']=='all'){
                session_start();

                //setting the variables
                $_SESSION['adminname']=$_COOKIE['aname'];
                $_SESSION['adminpassword']=$_COOKIE['apass'];
                $_SESSION['stat']=$_COOKIE['sta'];


                    $aname = $_SESSION['adminname'];
                    $apassword = $_SESSION['adminpassword'];
                    $st = $_SESSION["stat"];

                    //conecting to the server
                    $conn = mysqli_connect("localhost","root","","punchx");

                    $sql = mysqli_query($conn,"select * from admin where username='$aname' AND password='$apassword'");

                    $row = mysqli_fetch_assoc($sql);

                    if(!$row){
                        header("Location:admin_login.php");
                    }
                    else{     
                    }

                    $sql = mysqli_query($conn,"select uid,password,name,batch,contact,parent,address,pcontact,mail,time from user where status='$st'");
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

                    echo "<pre>Time           : </pre>".$crows["time"];
                    echo "<br>";
                    echo "<br>";
                    }
            }
        ?>

    </div>

    <br><br>

    <div>
        <p style="color:red;text-align:center">click Ctrl+P to print the page</p>
    </div>

</body>
</html>