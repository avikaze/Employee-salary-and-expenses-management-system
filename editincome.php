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





?>


<!DOCTYPE html>
<html>
<head>
	<title>income</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">ESEM</a>
    </div>
    <ul class="nav navbar-nav">
    <li class="active"><a href="home.php">HOME</a></li>
    <li><a href="#">INCOME</a></li>
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
    <form action="" method="post">

        <div class="col-md-12">

        <div class="form-group">
                <h2 class="">Income Chart</h2>
            </div>
        
            <div class="form-group">
                <hr />
            </div>

            




            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                <input type="text" name="month"  class="form-control" placeholder="Enter Month" maxlength="50"  />
                </div>
                <span class="text-danger"></span>
            </div>

            

            

            


            

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                <input type="text" name="amount"  class="form-control" placeholder="Enter Monthly Income" maxlength="50"  />
                </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                <input type="text" name="bonous"  class="form-control" placeholder="Enter Monthly Bonous" maxlength="50"  />
                </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                <input type="text" name="health" class="form-control" placeholder="Enter Health Bonous"  maxlength="50"  />
                </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                <input type="text" name="transport" class="form-control" placeholder="Enter Transport Bonous" maxlength="50"  />
                </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                <input type="text" name="other" class="form-control" placeholder="Enter Other Bonous" maxlength="50"  />
                </div>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <hr />
            </div>

            <div class="form-group">
            <input type="submit" name="edit" value="Edit" class="btn btn-block btn-primary">
        	</div>

        	<div class="form-group">

       			<a href="incomeview.php" class="btn btn-block btn-primary">View</a>
 			</div>

            <div class="form-group">

                <a href="income.php" class="btn btn-block btn-primary">Insert</a>
            </div>






        </div>
        </form>
        </div>
        </div>



<?php
$uid=$amount=$bonous=$month=$health=$transport=$other="";
if(isset($_POST['edit']))
{
	$uid=$_SESSION['user'];
	$amount=$_POST['amount'];
	$month=$_POST['month'];
	$bonous=$_POST['bonous'];
	$health=$_POST['health'];
	$transport=$_POST['transport'];
	$other=$_POST['other'];

	$update="UPDATE income set 
				month='$month',
				amount='$amount',
				bonous='$bonous',
				health='$health',
				transport='$transport',
				other='$other'
				WHERE user_id=$uid";

	$res1=mysql_query($update) or die("Error:".mysql_error());

}


?>




</body>
</html>