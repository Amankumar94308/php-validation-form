<?php 
if($_POST){
$username=$_POST['username'];
$e_mail=$_POST['e-mail'];
$contact=$_POST['contact'];
$zip=$_POST['zip'];
$pwd=$_POST['pwd'];
$adrs=$_POST['adrs'];

    @$firstlet=$username[0];
	@$lastlet=strpos($username," ");
	@$lastlet=$lastlet+1;
	@$chklastlet=$username[$lastlet];
    if(empty($username)) {
        $nameErr = "*Name is required";
       } 
    elseif(!preg_match("/^[A-Z]*$/",$firstlet)) {
      $nameErr = "*First Letter Should be capital"; 
      }
	elseif(!preg_match("/^[A-Z]*$/",$chklastlet)) {
      $nameErr = "*First Letter of Last Name Should be capital"; 
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
            $pwdErr = "*Password Must Contain Atleast 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$pwd)) {
            $pwdErr = "*Password Must Contain Atleast 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$pwd)) {
            $pwdErr = "*Password Must Contain Atleast 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$pwd)) {
            $pwdErr = "*Password Must Contain Atleast 1 Lowercase Letter!";
        } 
		elseif(!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/",$pwd)) {
            $pwdErr = "*Password Must Contain Atleast 1 Special Character!";
        } 
		else {
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
	padding-left:20%;
	width:43%;
	height:600px;
	border:solid 1px black;
	margin-left:4%;
	float:left;
	padding-left:1%;
	background-color:#0f0707d1;
	color:wheat;
	box-shadow: 6px 6px #0f07076e;
	border-radius:2%;
	
}
span{
	color:red;
}
input{
    color: white;
    border: none;
    border-bottom: 1px solid #4CAF50;
    background-color: transparent;
    width: 50%;
    height: 4%;
    padding-left: 2%;
}
textarea{
	color:white;
	border:none;
    border-bottom:1px solid #4CAF50;
	background-color:transparent;
	resize:none;
	border-radius:3%;
	padding-left:2%;
}
.btn{
	height:5%;
	width:18%;
	color:white;
	background-color:#000000cc;
	margin-left:5%;
	float:left;
	border-radius:2%;
	font-family:sarief;
	box-shadow: 1px 1px 3px 3px #456d4766;
}
.btn:hover{
	height:4.5%;
	width:17.5%;       
	color:white;
	background-color:#317e34cc;
	margin-left:5%;
	float:left;
	border-radius:1%;
	font-family:sarief;
	box-shadow: 1px 1px 2px 2px #456d4766; 
}
</style>
</head>
<body>
<form action="main.php" method="POST">
<div>
<center><h4>Upload Your Info</h4></center>
Name<br><input id="nameinput" type="text" value="<?php if(isset($_POST['username'])) {echo $username;}?>" name="username"/><span><?php echo @$nameErr; ?></span><br><br>
E-Mail<br><input id="mailinput" type="text" value="<?php if(isset($_POST['e-mail'])) {echo $e_mail;}?>" name="e-mail"/><span><?php echo @$emailErr; ?></span><br><br>
Phone<br><input id="phinput" type="number" value="<?php if(isset($_POST['contact'])) {echo $contact;}?>" name="contact"/><span><?php echo @$phoneErr; ?></span><br><br>
Pin Code<br><input id="zipinput" type="number" value="<?php if(isset($_POST['zip'])) {echo $zip;}?>" name="zip"/><span><?php echo @$zipErr; ?></span><br><br>
Password<br><input id="pwdinput" type="password" value="<?php if(isset($_POST['pwd'])) {echo $_POST['pwd'];}?>" name="pwd"/><span><?php echo @$pwdErr; ?></span><br><br>
Address<br><br><textarea id="addinput" rows="2" cols="39" name="adrs"><?php if(isset($_POST['adrs'])) {echo $adrs;}?></textarea><span><?php echo @$adrsErr; ?></span><br><br>

<input class="btn" type="submit" value="UPLOAD"/>
<input class="btn" type="reset" value="CLEAR"/>
</div>
</form>
 <div>
 <br>
 <?php
 if(!isset($username)){
	 echo "Your Info Will Appear Here...";
 }
 else{
	echo "<h3 style='text-align:center;'>Your Info!</h3><br>";

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
