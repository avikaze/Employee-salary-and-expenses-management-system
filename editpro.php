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
      <a class="navbar-brand" href="home.php">ESMS</a>
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
            <form action="" method="post">
            	
            	<div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" name="fname" class="form-control" placeholder="Enter First Name" maxlength="50" value="<?php echo $userrow['fname'];?>" />
                </div>
                <span class="text-danger"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" maxlength="50" value="<?php echo $userrow['lname'];?>" />
                </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" name="username" class="form-control" placeholder="Enter User Name" maxlength="50" value="<?php echo $userrow['username'];?>" />
                </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                <input type="text" name="email" class="form-control" placeholder="Enter Email" maxlength="50" value="<?php echo $userrow['email'];?>" />
                </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" name="psw" class="form-control" placeholder="Enter Password" maxlength="15" value="<?php echo $userrow['password'];?>" />
                </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="date" name="presentdate" class="form-control" placeholder="Enter Date Of Birth" value="<?php echo $userrow['pdate'];?>" />
                </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input name="gender" class="form-control" placeholder="Enter Gender" value="<?php echo $userrow['gender'];?>" />
                </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input name="service" class="form-control" placeholder="Enter Service" value="<?php echo $userrow['service'];?>" />
                </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input name="marriage" class="form-control" placeholder="Enter Maritual Status" value="<?php echo $userrow['marriage'];?>" />
                </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <hr />
            </div>

        <div class="form-group">
            <input type="submit" name="save" value="Save" class="btn btn-block btn-primary">
        </div>



            </form>
</div>
</div>
</div>

<?php
$fname=$lname=$username=$email=$psw=$presentdate=$gender=$service=$marriage="";

if(isset($_POST['save'])){

	$uid=$_SESSION['user'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$psw=$_POST['psw'];
	$presentdate=$_POST['presentdate'];
	$gender=$_POST['gender'];
	$service=$_POST['service'];
	$marriage=$_POST['marriage'];

	$update="UPDATE userlog SET 
				fname='$fname',
				lname='$lname',
				username='$username',
				email='$email',
				password='$psw',
				pdate='$presentdate',
				gender='$gender',
				service='$service',
				marriage='$marriage'
				WHERE user_id=$uid";

	$res=mysql_query($update) or die("Error:".mysql_error());
}

?>

</body>
</html>

