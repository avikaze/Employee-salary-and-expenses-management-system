<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	//if( !isset($_SESSION['user']) ) {
	//	header("Location: index.php");
	//	exit;
	//}

	$res=mysql_query("SELECT * FROM userlog WHERE user_id=".$_SESSION['user']);
	$userrow=mysql_fetch_array($res);

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>home page</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
	<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">ESEM</a>
    </div>
    <ul class="nav navbar-nav">
    <li class="active"><a href="#">HOME</a></li>
    <li><a href="income.php">INCOME</a></li>
    <li><a href="expence.php">EXPENCE</a></li>
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
    

        <div class="col-md-12">

            
<div class="form-group">
	<center><h2>USER PROFILE</h2></center>
</div>
<div class="form-group">
                <hr />
            </div>
<div class="form-group">
	<div class="well well-sm "><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;First Name:&nbsp;&nbsp;<?php echo $userrow['fname'];?></div>
</div>
<div class="form-group">
	<div class="well well-sm"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Last Name:&nbsp;&nbsp;<?php echo $userrow['lname'];?></div>
</div>
<div class="form-group">
	<div class="well well-sm"><span class="glyphicon glyphicon-sunglasses"></span>&nbsp;&nbsp;User Name:&nbsp;&nbsp;<?php echo $userrow['username'];?></div>
</div>
<div class="form-group">
	<div class="well well-sm"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;Email:&nbsp;&nbsp;<?php echo $userrow['email'];?></div>
</div>
<div class="form-group">
	<div class="well well-sm"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;Date Of Birth:&nbsp;&nbsp;<?php echo $userrow['pdate'];?></div>
</div>
<div class="form-group">
	<div class="well well-sm"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Gender:&nbsp;&nbsp;<?php echo $userrow['gender'];?></div>
</div>
<div class="form-group">
	<div class="well well-sm"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Service:&nbsp;&nbsp;<?php echo $userrow['service'];?></div>
</div>
<div class="form-group">
	<div class="well well-sm"><span class="glyphicon glyphicon-heart"></span>&nbsp;&nbsp;Maritual status:&nbsp;&nbsp;<?php echo $userrow['marriage'];?></div>
</div>
<div class="form-group">
                <hr />
            </div>
<div class="form-group">

       <a href="editpro.php" class="btn btn-block btn-primary">Edit</a>
 </div>
 </div>
 </div>
 </div>


</body>
</html>