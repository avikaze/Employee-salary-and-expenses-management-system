<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// it will never let you open index(login) page if session is set
	//if ( isset($_SESSION['user'])!="" ) {
	//	header("Location: home.php");
	//	exit;
	//}
$toaterr=$bonous=$amount=$health=$transport=$other=$other1=$houserent=$bazar=$education=$month=$user=$total="";
$res1=mysql_query("SELECT * FROM userlog WHERE user_id=".$_SESSION['user']);
$userrow1=mysql_fetch_array($res1);
//$user=$userrow1['username'];

if(isset($_POST['view']))
{
	$res=mysql_query("SELECT income.amount,income.bonous,income.health,income.transport,income.other,expence.houserent,expence.bazar,expence.education,expence.other1,expence.month FROM income INNER JOIN expence WHERE income.month=expence.month");
	$userrow=mysql_fetch_array($res);
	$amount=$userrow['amount'];
$bonous=$userrow['bonous'];
$health=$userrow['health'];
$transport=$userrow['transport'];
$other=$userrow['other'];
$other1=$userrow['other1'];
$houserent=$userrow['houserent'];
$bazar=$userrow['bazar'];
$education=$userrow['education'];
$month=$userrow['month'];
$user=$userrow1['username'];

$total=($amount+$bonous+$health+$transport+$other)-($other1+$houserent+$bazar+$education);

if($total<=1000)
{
	$toaterr="balance is low";
}


}





?>

<!DOCTYPE html>
<html>
<head>
	<title>total</title>
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
    <li><a href="expence.php">EXPENCE</a></li>
    <li><a href="#">TOTAL</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    	<li><a href="#"><span class="glyphicon glyphicon-user"></span>HI,&nbsp;<?php echo $userrow1['fname'];?></a></li>
      <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
    </ul>
  </div>
</nav>


<div class="container"> 
      <div id="login-form">
    <form action="" method="post">

        <div class="col-md-12">

        <div class="form-group">
                <h2 class="">Total View</h2>
            </div>
        
            <div class="form-group">
                <hr />
            </div>

            <div class="form-group">
	           <div class="well well-sm "><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;User Name:&nbsp;&nbsp;<?php echo $user;?></div>
            </div>


            <div class="form-group">
	           <div class="well well-sm "><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Month:&nbsp;&nbsp;<?php echo $month;?></div>
            </div>

            <div class="form-group">
	           <div class="well well-sm "><span class="glyphicon glyphicon-euro"></span>&nbsp;&nbsp;Total Balance:&nbsp;&nbsp;<?php echo $total;?></div>
	           <span class="text-danger"><?php echo $toaterr; ?></span>
            </div>

            <div class="form-group">
            <input type="submit" name="view" value="View Record" class="btn btn-block btn-primary">
            </div>




</div>
</form>
</div>
</div>

</body>
</html>