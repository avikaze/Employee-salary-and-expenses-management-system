<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// it will never let you open index(login) page if session is set
	//if ( isset($_SESSION['user'])!="" ) {
	//	header("Location: home.php");
	//	exit;
	//}
$res=mysql_query("SELECT * FROM userlog WHERE user_id=".$_SESSION['user']);
$userrow=mysql_fetch_array($res);
$month="";
$uname=$houserent=$bazar=$education=$other=$total="";
// var_dump($_POST); die();
if(isset($_POST['view']))
{
	$month=$_POST['month'];
	$query="SELECT * FROM expence WHERE month='$month'";
	$res1=mysql_query($query) or die(mysql_error($query));
	$userrow1=mysql_fetch_array($res1);
    $uname=$userrow1['username'];
$month=$userrow1['month'];
$houserent=$userrow1['houserent'];
$bazar=$userrow1['bazar'];
$education=$userrow1['education'];
$other=$userrow1['other1'];

$total=$houserent+$bazar+$education+$other;

}

?>




<!DOCTYPE html>
<html>
<head>
	<title>income</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">ESEM</a>
    </div>
    <ul class="nav navbar-nav">
    <li class="active"><a href="home.php">HOME</a></li>
    <li><a href="income.php">INCOME</a></li>
    <li><a href="#">EXPENCE</a></li>
    <li><a href="total.php">TOTAL</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    	<li><a href="#"><span class="glyphicon glyphicon-user"></span>HI,&nbsp;<?php echo $userrow['fname'];?></a></li>
      <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container"> 
      <div id="login-form">
    <form action="" method="post">

        <div class="col-md-12">

        <div class="form-group">
                <h2 class="">Expence View</h2>
            </div>
        
            <div class="form-group">
                <hr />
            </div>

            <div class="form-group">
                <div class="input-group">

            Select Month:<br><select name="month" class="selectpicker">
            	<option value="">Select</option>
            	<option value="january">January</option>
            	<option value="february">February</option>
            	<option value="march">March</option>
            	<option value="april">April</option>
            	<option value="may">May</option>
            	<option value="june">June</option>
            	<option value="july">July</option>
            	<option value="august">August</option>
            	<option value="september">September</option>
            	<option value="october">October</option>
            	<option value="november">November</option>
            	<option value="december">December</option>
            </select>
            </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <hr />
            </div>


            <div class="form-group">
	           <div class="well well-sm "><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;User Name:&nbsp;&nbsp;<?php echo $uname;?></div>
            </div>

            <div class="form-group">
               <div class="well well-sm "><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;MONTH:&nbsp;&nbsp;<?php echo $month;?></div>
            </div>
            <div class="form-group">
               <div class="well well-sm "><span class="glyphicon glyphicon-euro"></span>&nbsp;&nbsp;House Rent:&nbsp;&nbsp;<?php echo $houserent;?></div>
            </div>
            <div class="form-group">
               <div class="well well-sm "><span class="glyphicon glyphicon-eur"></span>&nbsp;&nbsp;Shopping:&nbsp;&nbsp;<?php echo $bazar;?></div>
            </div>
            <div class="form-group">
               <div class="well well-sm "><span class="glyphicon glyphicon-euro"></span>&nbsp;&nbsp;Education:&nbsp;&nbsp;<?php echo $education;?></div>
            </div>
            
            <div class="form-group">
               <div class="well well-sm "><span class="glyphicon glyphicon-euro"></span>&nbsp;&nbsp;Other:&nbsp;&nbsp;<?php echo $other;?></div>
            </div>
            <div class="form-group">
               <div class="well well-sm "><span class="glyphicon glyphicon-euro"></span>&nbsp;&nbsp;Total Income:&nbsp;&nbsp;<?php echo $total;?></div>
            </div>







            <div class="form-group">
            <input type="submit" name="view" value="View Record" class="btn btn-block btn-primary">
            </div>
 
  
  

        	<div class="form-group">

       			<a href="expence.php" class="btn btn-block btn-primary">Insert</a>
 			</div>

            <div class="form-group">

                <a href="editexpenceus.php" class="btn btn-block btn-primary">Edit</a>
            </div>


        	</div>
        	</form>
        	</div>
        	</div>
        	</body>
        	</html>

