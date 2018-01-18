<?php
        
        ob_start();
        session_start();
        //if(isset($_SESSION['user'])){
        // header("Location:home.php");
        //}
        include_once 'dbconnect.php';
        $error=false;
        $fname=$lname=$username=$email=$psw=$psw1=$presentdate=$gender=$service=$marriage="";
        $fnameerr=$lnameerr=$usernameerr=$emailerr=$pswerr=$psw1err=$gendererr=$serviceerr=$presentdateerr=$marriederr="";
        if(isset($_POST['signup']) && $_SERVER["REQUEST_METHOD"] == "POST"){
            
            $fname=trim($_POST['fname']);
            $fname=strip_tags($fname);
            $fname=htmlspecialchars($fname);

            $lname=trim($_POST['lname']);
            $lname=strip_tags($lname);
            $lname=htmlspecialchars($lname);

            $username=trim($_POST['username']);
            $username=strip_tags($username);
            $username=htmlspecialchars($username);

            $email=trim($_POST['email']);
            $email=strip_tags($email);
            $email=htmlspecialchars($email);

            $psw=trim($_POST['psw']);
            $psw=strip_tags($psw);
            $psw=htmlspecialchars($psw);

            $psw1=trim($_POST['psw1']);
            $psw1=strip_tags($psw1);
            $psw1=htmlspecialchars($psw1);

            $presentdate=trim($_POST['presentdate']);

            


            

            $gender=trim($_POST['gender']);
            $gender=strip_tags($gender);
            $gender=htmlspecialchars($gender);

            $service=trim($_POST['service']);
            $service=strip_tags($service);
            $service=htmlspecialchars($service);

            $married=trim($_POST['married']);
            $married=strip_tags($married);
            $married=htmlspecialchars($married);

            //validation

            if(empty($fname)){
                $error=true;
                $fnameerr="enter first name";
            }
            else if (strlen($fname)<2) {
                $error=true;
                $fnameerr="first name atleast 3 word";

                
            }
            else if(strlen($fname)>20){
                $error=true;
                $fnameerr="first name can not more than 20";

            }
            else if(!preg_match("/^[a-zA-Z ]+$/", $fname)){
                $error=true;
                $fnameerr="does not match format";
            }


            if(empty($lname)){
                $error=true;
                $lnameerr="enter Last name";
            }
            else if (strlen($lname)<2) {
                $error=true;
                $lnameerr="last name atleast 3 word";

                
            }
            else if(strlen($lname)>20){
                $error=true;
                $lnameerr="last name can not more than 20";

            }
            else if(!preg_match("/^[a-zA-Z ]+$/", $lname)){
                $error=true;
                $lnameerr="does not match format";
            }

            if(empty($username)){
                $error=true;
                $usernameerr="enter user name";
            }
            else if (strlen($username)<2) {
                $error=true;
                $usernameerr="user name atleast 3 word";

                
            }
            else if(strlen($username)>20){
                $error=true;
                $usernameerr="user name can not more than 20";

            }
            else if(!preg_match("/^[a-zA-Z0-9]{5,}$/", $username)){
                $error=true;
                $usernameerr="does not match format";
            }
            if(empty($email)){
                $error=true;
                $emailerr="enter email";
            }
            else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $error=true;
                $emailerr="format doesnot match";
            }
            else{
                $query="SELECT email FROM userlog WHERE email='$email'";
                $result=mysql_query($query) or die(mysql_query($query));
                $count=mysql_num_rows($result);

                if($count!=0){
                    $error=true;
                    $emailerr="email is already exist";
                }
            }

            if(empty($psw)){
                $error=true;
                $pswerr="enter a password";
            }
            
            else if (strlen($psw) <= '8') {
                $error=true;
                $pswerr = "Your Password Must Contain At Least 8 Characters!";
            }
            elseif(!preg_match("#[0-9]+#",$psw)) {
                $error=true;
                $pswerr = "Your Password Must Contain At Least 1 Number!";
            }
            elseif(!preg_match("#[A-Z]+#",$psw)) {
                $error=true;
                $psw = "Your Password Must Contain At Least 1 Capital Letter!";
            }
            elseif(!preg_match("#[a-z]+#",$psw)) {
                $error=true;
                $pswerr = "Your Password Must Contain At Least 1 Lowercase Letter!";
            } 

            if(empty($psw1)){
                $error=true;
                $psw1err="enter a password";
            }
            
            else if($psw!=$psw1)
            {
                $error=true;
                $psw1err="password doesnot match";
            }

            //$password=hash('sha256', $psw);

            $presentdate1=date("m/d/y");
            $diff=strtotime($presentdate1)-strtotime($presentdate);
            if($diff<0)
            {
                $error=true;
                $presentdateerr="date is not valid";
            }
            

            
            

            if(empty($gender))
            {
                $error=true;
                $gendererr="select gender";
            }
            if (empty($service)) {
                $error=true;
                $serviceerr="select service";
            }
            if (empty($married)) {
                # code...
                $error=true;
                $marriederr="select marriage status";
            }

            //all data entry
            if(!$error){
                $query="INSERT INTO userlog(fname,lname,username,email,password,pdate,gender,service,marriage) VALUES('$fname','$lname','$username','$email','$psw','$presentdate','$gender','$service','$married')";
                $res=mysql_query($query);
                if($res){
                    $errtup="success";
                    $errmsg="successfully registered";
                    unset($fname);
                    unset($lname);
                    unset($username);
                    unset($email);
                    unset($psw);
                    unset($psw1);
                    unset($presentdate);
                    unset($gender);
                    unset($service);
                    unset($married);
                }

                else{
                    $errtup="denger";
                    $errmsg="somthing must wrong";
                }
            }
        }





        
        
        ?>


       






<! doctype html>
<html>

    <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
      <div class="container"> 
      <div id="login-form">
    <form action="" method="post">

        <div class="col-md-12">

        <div class="form-group">
                <h2 class="">Sign Up</h2>
            </div>
        
            <div class="form-group">
                <hr />
            </div>

            <?php
            if(isset($errmsg)){

                ?>
                <div class="form-group">
                <div class="alert alert-<?php echo ($errtup=="success") ? "success" : $errtup; ?>">
                <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errmsg; ?>
                </div>
                </div>
                <?php
            }
            ?>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" name="fname" class="form-control" placeholder="Enter First Name" maxlength="50" value="<?php echo $fname ?>" />
                </div>
                <span class="text-danger"><?php echo $fnameerr; ?></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" maxlength="50" value="<?php echo $lname ?>" />
                </div>
                <span class="text-danger"><?php echo $lnameerr; ?></span>
            </div>
            
            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="text" name="username" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $username ?>" />
                </div>
                <span class="text-danger"><?php echo $usernameerr; ?></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                <input type="text" name="email" class="form-control" placeholder="Enter E-mail" maxlength="50" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailerr; ?></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" name="psw" class="form-control" placeholder="Enter Password" maxlength="15" value="<?php echo $psw ?>" />
                </div>
                <span class="text-danger"><?php echo $pswerr; ?></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" name="psw1" class="form-control" placeholder="Enter Confirm Password" maxlength="15" value="<?php echo $psw1 ?>" />
                </div>
                <span class="text-danger"><?php echo $psw1err; ?></span>
            </div>

            <div class="form-group">
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                <input type="date" name="presentdate" class="form-control" placeholder="Enter Date Of Birth" value="<?php echo $presentdate ?>" />
                </div>
                <span class="text-danger"><?php echo $presentdateerr; ?></span>
            </div>

            

       
        <div class="form-group">
                <div class="input-group">
        Gender:<br><input type="checkbox" name="gender" value="male">Male<br>
        <input type="checkbox" name="gender" value="female">Female
        </div>
                <span class="text-danger"><?php echo $gendererr; ?></span>
            </div><br><br>
        
        <div class="form-group">
                <div class="input-group">
        Service: <br><input type="radio" name="service" value="job">Job<br>
        <input type="radio" name="service" value="business">Business<br>
        <input type="radio" name="service" value="other">Other
        </div>
                <span class="text-danger"><?php echo $serviceerr; ?></span>
            </div><br><br>
        
        <div class="form-group">
                <div class="input-group">
        Maritual Status:<br><select name="married" class="selectpicker">
        <option value="">select</option>
            <option value="married"> married</option>
            <option value="unmarried">unmarried</option>
        </select>

        </div>
                <span class="text-danger"><?php echo $marriederr; ?></span>
            </div>

        <div class="form-group">
                <hr />
            </div>

        <div class="form-group">
            <input type="submit" name="signup" value="Sign Up" class="btn btn-block btn-primary">
        </div>

        <div class="form-group">
            <a href="index.php" class="btn btn-block btn-primary">Sign In</a>
        </div>

        <div class="form-group">
                <hr />
            </div>


         
        
        
    
    </div>
    </form>
    </div>
    </div>
    </body>

</html>
