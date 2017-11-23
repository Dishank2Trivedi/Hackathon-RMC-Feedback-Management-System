<?php
session_start();
?>
<html>
<head>

	<title> Thankyou for you feedback</title>
	<h1> ThankYou for your feedback. Your feedback has been recorded</h1>
	<?php if(isset($_SESSION['cid'])): ?>
	<h1> Your complain reference number is : <?= $_SESSION['cid']; ?> </h1>
	<?php endif; unset($_SESSION['cid']); ?>
	

</head>
</html>