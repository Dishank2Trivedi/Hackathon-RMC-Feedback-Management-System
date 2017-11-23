<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_mobile']);
unset($_SESSION['user_name']);


?>
<html>
<Head>
<title> Enter Your Phone Number </title>
<link rel="stylesheet" href="css/styles.css"  />
<style>
.login{
width:360px;
margin:50px auto;
font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
border-radius:10px;
border:5px solid #ccc;
padding:20px 40px 25px;
margin-top:70px; 
}
input[type=tel] {
width:99%;
padding:10px;
margin-top:8px;
border:1px solid #ccc;
padding-left:5px;
font-size:16px;
font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif; 
}
input[type=button]{
width:100%;
background-color:#009;
color:#fff;
border:2px solid #06F;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px; 
}

body{
background: url(img/background.png) no-repeat scroll;
background: repeating-linear-gradient(#1A315F 20%, #298796 50%, #1A315F);
background: -moz-linear-gradient(#1A315F 20%, #298796 70%, #1A315F);

background-size: 100% 100%;
min-height: 700px;
}

</style>
<script src="js/jquery-3.2.1.min.js"></script>



</head>
<body>


<div class="login">
<div align="center">
		<img src="img/logo ward.png" align="RMC">
	</div>

<h1 align="center" style="color:#e6e6e6;">Enter Your Registered Phone Number</h1>
<form action="" method="post" style="text-align:center;">
<input type="tel" placeholder="Your Phone Number" id="phone" name="phone"><br/><br/>
<input type="button" value="Continue" name="submit" onclick="validPhone()">
<!-- Error Message -->
<!--<span><?php echo $error; ?></span>-->
<script>
function validPhone(){
	 $.ajax({url: "continue.php", 
	 data:{"phone":$("#phone").val(),"valid":"2"},
	 success: function(result){
			if(result=="verified"){
				location.href = "welcome.php";
			}else{
				alert(result);
			}
		}});
}
</script>
</div>
</body>
</html>