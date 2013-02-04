<!DOCTYPE html>
<html>
  <head>
    <title>MCRU Time Calculator By Shane Burgess</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	
  </head>
  <body>
<body>
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="#">MCRU Tools</a>
    <ul class="nav">
      <li><a href="index.php">Time Calc</a></li>
      <li class="active"><a href="percent.php">Percent Calc</a></li>
    </ul>
  </div>
</div>

    <div class="container">
	 <h1>MCRU Percentage Diff Calculator</h1>
     <div class="well">
	 <form method="post">
	 <table>
	  <tr>
	    <td><b>First Number</b></td><td><b>Second Number</b></td>
	</tr>
	<tr>
	    <td><input type="text" name="firstNum" value="<?php echo $_POST['firstNum']; ?>"></td><td><input type="text" name="secondNum" value="<?php echo $_POST['secondNum']; ?>"></td>
	</tr>
	</table>
	<input type="submit" value="Calculate">
	 </form>
	 <?php
	 if($_POST['firstNum'] && $_POST['secondNum']){
		 
		 if($_POST['firstNum'] > $_POST['secondNum']){
		   $percent = (($_POST['firstNum'] - $_POST['secondNum'])/$_POST['firstNum'])*100;
		 }else{
		   $percent = (($_POST['secondNum'] - $_POST['firstNum'])/$_POST['secondNum'])*100;
		 }
	 ?>
	 <h2>There is a <?php echo round($percent); ?>% difference between <?php echo $_POST['firstNum']; ?> and <?php echo $_POST['secondNum']; ?></h2>
	<?php
	 }
	?>
	 </div>
	 <div class="row">Written By Shane Burgess and free to use by The Michigan Clinical Research Unit (MCRU) staff only.</div>
    </div> <!-- /container -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>



