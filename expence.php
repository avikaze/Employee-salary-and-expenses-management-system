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
$username=$userrow['username'];
$error=false;
$month=$houserent=$bazar=$education=$other="";
$montherr=$houserenterr=$bazarerr=$educationerr=$othererr=$usernameerr="";

if(isset($_POST['record'])){

	$month=test($_POST['month']);

	$houserent=test($_POST['houserent']);
    $bazar=test($_POST['bazar']);
    $education=test($_POST['education']);
	$other=test($_POST['other']);
	//$username=test($_POST['username']);


	

	if(empty($month)){
		$error=true;
		$montherr="please select month";
	}
	else{
		$query="SELECT month FROM expence WHERE month='$month'";
		$res=mysql_query($query) or die(mysql_error($query));
		$count=mysql_num_rows($res);
		if($count!=0){
			$error=true;
			$montherr="month already exist";
		}

	}

	
	if(!is_numeric($houserent) && !empty($houserent)){
		$error=true;
		$houserenterr="value in not numeric";
	}
	if(!is_numeric($bazar) && !empty($bazar)){
		$error=true;
		$bazarerr="value not numeric";
	}
	if(!is_numeric($education) && !empty($education)){
		$error=true;
		$educationerr="value not numeric";
	}
	
	if(!is_numeric($other) && !empty($other)){
		$error=true;
		$othererr="value not numeric";
	}

	if(!$error){
		$query="INSERT INTO expence(month,username,houserent,bazar,education,other1) VALUES ('$month','$username','$houserent','$bazar','$education','$other')";
		$res=mysql_query($query) or die(mysql_error($res));
		if($res){
			$errtyp="success";
			$errmsg="successfully recorded";

		}
		else{
			$errtyp="denger";
			$errmsg="something went wrong";
		}
	}
}


function test($data){
		$data=trim($data);
		$data=strip_tags($data);
		$data=htmlspecialchars($data);
		$data=stripslashes($data);
		return $data;
	}


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
                <h2 class="">Expence Chart</h2>
            </div>
        
            <div class="form-group">
                <hr />
            </div>

            <?php
            if(isset($errmsg)){

                ?>
                <div class="form-group">
                <div class="alert alert-<?php echo ($errtyp=="success") ? "success" : $errtyp; ?>">
                <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errmsg; ?>
                </div>
                </div>
                <?php
            }
            ?>




            <div class="form-group">
                <div class="input-group">

            Month:<br><select name="month" class="selectpicker">
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
                <span class="text-danger"><?php echo $montherr; ?></span>
            </div>


            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" name="usename" 
               value="<?php echo $username;?>" class="form-control" placeholder="Enter Username" maxlength="50"  />
                </div>
                <span class="text-danger"></span>
            </div>

            


            

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                <input type="text" name="houserent"  class="form-control" placeholder="Enter House Rent Cost" maxlength="50"  />
                </div>
                <span class="text-danger"><?php echo $houserenterr; ?></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                <input type="text" name="bazar" class="form-control" placeholder="Enter Monthly Shopping Cost" maxlength="50"  />
                </div>
                <span class="text-danger"><?php echo $bazarerr; ?></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                <input type="text" name="education" class="form-control" placeholder="Enter Education Cost" maxlength="50"  />
                </div>
                <span class="text-danger"><?php echo $educationerr; ?></span>
            </div>


            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>
                <input type="text" name="other" class="form-control" placeholder="Enter Other Cost" maxlength="50"  />
                </div>
                <span class="text-danger"><?php echo $othererr; ?></span>
            </div>

            <div class="form-group">
                <hr />
            </div>

            <div class="form-group">
            <input type="submit" name="record" value="Record" class="btn btn-block btn-primary">
        	</div>

        	<div class="form-group">

       			<a href="expenceview.php" class="btn btn-block btn-primary">View</a>
 			</div>

            <div class="form-group">

                <a href="editexpence.php" class="btn btn-block btn-primary">Edit</a>
            </div>






        </div>
        </form>
        </div>
        </div>



</body>
</html>