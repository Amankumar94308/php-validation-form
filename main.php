<?php 
if($_POST){
$username=$_POST['username'];
$e_mail=$_POST['e-mail'];
$contact=$_POST['contact'];
$zip=$_POST['zip'];
$pwd=$_POST['pwd'];
$adrs=$_POST['adrs'];

    @$firstlet=$username[0];
    if(empty($username)) {
        $nameErr = "*Name is required";
       } 
    elseif(!preg_match("/^[A-Z ]*$/",$firstlet)) {
      $nameErr = "*First Letter Should be capital"; 
      }
	elseif(!preg_match("/\\s/", $username)) {
      $nameErr="*Enter Last Name Also";
      }   
    elseif(!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $nameErr = "*Only letters and white space allowed"; 
      }
	  else{
		  $disusername=$username;
	  }
	  
	  //e-mail valid
  if(empty($e_mail)){
    $emailErr = "*Email is required";
  }
  elseif(!filter_var($e_mail, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }  
  else{
	  $dise_mail=$e_mail;
  }
//phone   
if(strlen($contact)>10||strlen($contact)<10)
{
	$phoneErr=" *Enter Correct Number";
}
else{
	$discontact=$contact;
}

//pin
if(strlen($zip)>6||strlen($zip)<6)
{
	$zipErr=" *Enter Correct Pin Code";
}
else{
	$diszip=$zip;
}
//password
        if (strlen($pwd) <= '8' || empty($pwd)) {
            $pwdErr = "*Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$pwd)) {
            $pwdErr = "*Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$pwd)) {
            $pwdErr = "*Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$pwd)) {
            $pwdErr = "*Your Password Must Contain At Least 1 Lowercase Letter!";
        } else {
            $pwdErr = "";
        }
//add
if(empty($adrs)){
	$adrsErr="*Enter Your Address ";
}
elseif(strlen($adrs)<10){
	$adrsErr="YOur Addres is Too Short";
}
else{
	$disadrs=$adrs;
}

}
 ?>
 
<!Doctype HTML>
<html>
<head>
<style>
body{
   background-color:#317e34cc;
}
div{
	margin:0.5%;
	width:43%;
	height:600px;
	border:solid 1px black;
	margin-left:4%;
	float:left;
	padding-left:1%;
	background-color:#0f0707d1;
	color:wheat;
	box-shadow:2px 2px 6px 6px #0f0707d1;
	
}
span{
	color:red;
}
input{
	color:white;
	border:none;
	border-bottom:1px solid #317e34cc;
	background-color:transparent;
}
textarea{
	color:white;
	border:none;
    border:1px solid #317e34cc;
	background-color:transparent;
}
.btn{
	height:4%;
	width:15%;
	color:white;
	background-color:gray;
}
</style>
</head>
<body>
<form action="main.php" method="POST">
<div>
<h4>Upload Your Info</h4>
Name<br><input id="nameinput" type="text" value="<?php if(isset($_POST['username'])) {echo $username;}?>" name="username"/><span><?php echo @$nameErr; ?></span><br><br>
E-Mail<br><input id="mailinput" type="text" value="<?php if(isset($_POST['e-mail'])) {echo $e_mail;}?>" name="e-mail"/><span><?php echo @$emailErr; ?></span><br><br>
Phone<br><input id="phinput" type="number" value="<?php if(isset($_POST['contact'])) {echo $contact;}?>" name="contact"/><span><?php echo @$phoneErr; ?></span><br><br>
Pin Code<br><input id="zipinput" type="number" value="<?php if(isset($_POST['zip'])) {echo $zip;}?>" name="zip"/><span><?php echo @$zipErr; ?></span><br><br>
Password<br><input id="pwdinput" type="password" value="<?php if(isset($_POST['pwd'])) {echo $_POST['pwd'];}?>" name="pwd"/><span><?php echo @$pwdErr; ?></span><br><br>
Address<br><textarea id="addinput" rows="3" cols="23" name="adrs"><?php if(isset($_POST['adrs'])) {echo $adrs;}?></textarea><span><?php echo @$adrsErr; ?></span><br><br>

<input class="btn" type="submit" value="UPLOAD"/>
</div>
</form>
 <div>
 <?php
 if(!isset($username)){
	 echo "Your Info Will Appear Here";
 }else{
echo "<h3 style='text-align:center;color:green;'>Your Info!</h3><br>";

echo "Name Is : ".@$disusername."<br><br>";
echo "E-Mail Is : ".@$dise_mail."<br><br>";
echo "Contact Is : ".@$discontact."<br><br>";
echo "Pin Code IS : ".@$diszip."<br><br>";
echo "Address Is : ".@$disadrs;
 }
 ?>
 </div>
</body>
</html>