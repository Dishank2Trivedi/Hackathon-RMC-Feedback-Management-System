<?php
session_start();
if(!isset($_SESSION['user_mobile'])){
	header("Location: index.php");
			die();
}
$conn = new mysqli("localhost","root","","test");
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
if(isset($_REQUEST['auth_email'])){
	$complaint_id = 0;
	$message="Name: ".$_REQUEST['name'];
	$message.="<br>Mobile: ".$_SESSION['user_mobile'];
	$message.="<br>Email: ".$_REQUEST['mail'];
	$message.="<br>Rating: ".$_REQUEST['star']." Stars";
	
	if($_REQUEST['comment']!=''){
		$message.="<br>Feedback: ".$_REQUEST['comment'];
	}
	if($_REQUEST['cid']!=''){
		$message.="<br>Reference Number (Prev. Complain): ".$_REQUEST['cid'];
	}
	if($_REQUEST['complain']!=''){
		$message.="<br>Complain: ".$_REQUEST['complain'];
		$sql = "INSERT INTO complain (complain, cdate) VALUES ('".$_REQUEST['complain']."', '".date('Y-m-d H:i:s')."')";

		if ($conn->query($sql) === TRUE) {
			$complaint_id = $conn->insert_id;
			$message.="<br>Complain Id: ".$complaint_id ;
			$_SESSION['cid'] = $complaint_id;
			echo "Your complain registered successfully. Your complain reference number is : ".$complaint_id;
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	$sql = "INSERT INTO feedback 
	(service_id,name, email,phone, rating, comment,complain_id,complain,feedback_date) 
	VALUES ('".$_REQUEST['service']."','".$_REQUEST['name']."','".$_REQUEST['mail']."','".$_SESSION['user_mobile']."','".$_REQUEST['star']."','".$_REQUEST['comment']."','".$_REQUEST['cid']."','".$_REQUEST['complain']."', '".date('Y-m-d H:i:s')."')";

	if ($conn->query($sql) === TRUE) {
		
	}
	
	
	$headers = 'From: boss@thesirja.com' . "\r\nMIME-Version: 1.0\r\nContent-Type: text/html; charset=ISO-8859-1\r\n" .

	 "Reply-To: boss@thesirja.com\r\n";

	if(mail($_REQUEST['auth_email'],"Feedback from ".$_REQUEST['name'],$message,$headers)){
			header("Location: thankyou.php");
			die();
	}else{
		echo "Mail not sent";
	}
	die;
}
		$sql = "SELECT * FROM service WHERE id in (select service_id from user_service where user_id='{$_SESSION['user_id']}')";
		$result = $conn->query($sql);
	
		
		
?>
<!doctype html>
<html>
<head>
<style>
body
{
	padding:0;
	margin:0;
	width: 100%;
	background: url(img/background.png) no-repeat scroll;
	background-size: 100% 100%;
	min-height: 700px;
}

</style>
<script src="js/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/styles.css"  />
<meta charset="UTF-8">
<title>Welcome to RMC </title>
</head>
<body>
<div style="
    position: fixed;
	padding-left: 30px;
    height: 37px;
    width: 100%;
    background-color: #274A74;
    top: 0;
    color: #999;
    font-size: 18px;
    font-weight: bold;
    padding-top: 15px;
    padding-left: 20px;
">
Rajkot Munciple Corporation
<div style="float:right;margin-right:40px;">Welcome <?= $_SESSION['user_name']; ?>!</div>

</div>
<div style="clear:both;"></div>
<div id="formDiv">
<form role="form" method="post" action="" id="myform">
 <label for="service" style="color:#e6e6e6;">Your Service</label><br/>
 <select id="service" name="service" class="inputFields" required >

<?php
if ($result->num_rows > 0) {
	echo "<option value=''>Select Service</option>";
	while($row = $result->fetch_assoc()) {
		echo "<option value='{$row['id']}' data-email='{$row['auth_email']}'>{$row['service_name']}</option>";
	}
			
} else {
	echo "<option value=''>NO Service found</option>";
}
?>
</select></br></br>
<label for="name" style="color:#e6e6e6;">Name :</label><br/>
    <input type="text" id="name" name="name" class="inputFields" placeholder="Your name.." required><br/></br>

    <label for="mail" style="color:#e6e6e6;">Email :</label><br/>
    <input type="text" id="mail" name="mail" class="inputFields" placeholder="Your Email.." required><br/></br>
	
	<label style="color:#e6e6e6;">Give us Rating :</label><br/>
	<div class="stars">
	<input class="star star-5 my-start" id="star-10" type="radio" name="star" value="10"/>
    <label class="star star-5" for="star-10"></label>
    <input class="star star-4 my-start" id="star-9" type="radio" name="star"  value="9"/>
    <label class="star star-4" for="star-9"></label>
    <input class="star star-3 my-start" id="star-8" type="radio" name="star" value="8"/>
    <label class="star star-3" for="star-8"></label>
    <input class="star star-2 my-start" id="star-7" type="radio" name="star" value="7"/>
    <label class="star star-2" for="star-7"></label>
    <input class="star star-6 my-start" id="star-6" type="radio" name="star" value="6"/>
    <label class="star star-6" for="star-6"></label>
	<input class="star star-5 my-start" id="star-5" type="radio" name="star" value="5"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4 my-start" id="star-4" type="radio" name="star"  value="4"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3 my-start" id="star-3" type="radio" name="star" value="3"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2 my-start" id="star-2" type="radio" name="star" value="2"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1 my-start" id="star-1" type="radio" name="star" value="1"/>
    <label class="star star-1" for="star-1"></label>    
</div>
	
	<label for="comment" style="color:#e6e6e6;">Comments (Optional) :</label><br/>
    <textarea type="text" id="comment" name="comment" class="inputFields" style="height:60px;" placeholder="Write your review in detail..." /></textarea><br/></br>
	
	<label for="mail" style="color:#e6e6e6;">Already Complained? then enter ref. no.:</label><br/>
    <input type="text" id="cid" name="cid" class="inputFields" placeholder="Complain reference number" ><br/></br>
	
	<label for="complain" style="color:#e6e6e6;">Your Complain (Optional) :</label><br/>
    <textarea type="text" id="complain" name="complain" class="inputFields" style="height:60px;" placeholder="Write your complain if you have..." /></textarea><br/></br>
	<input type="hidden" id="auth_email" name="auth_email" />
	
	<input type="submit" value="Submit" class="theButtons" >
	
	<input type="reset" name="reset" value="Reset" class="theButtons"  >
</form>
</div>
</body>
<script>
	$("#service").change(function (){
		$("#auth_email").val($("#service option:selected").data('email'));
	});
	$( "#myform" ).submit(function( event ) {
		if($(".my-start").is(":checked")){
				//$("#myform").submit();
		}else{
			alert("Please give us rating");
			 event.preventDefault();
		}
		 
		 
});
</script>
</html>
<?php
$conn->close();
?>