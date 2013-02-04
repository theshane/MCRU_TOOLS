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
      <li class="active"><a href="index.php">Time Calc</a></li>
      <li><a  href="percent.php">Percent Calc</a></li>
    </ul>
  </div>
</div>
    <div class="container">
	 <h1>MCRU Time Calculator</h1>
     <div class="well">
	 <h1>Enter Start Time:</h1>
	 <br><br>
	 <form method="post">
	 <table>
	  <tr>
	  <td><h2>Hour</h2></td><td><h2>Minute</h2></td><!--<td><h2>Interval</h2></td>---></tr>
	  <tr>
	  <td>
    <select name="hour" class="bigSelect">
              <?php
			   $firstHour = 0;
		       $maxHour = 23;
			   
			   while($firstHour <= $maxHour){
                     $firstHour = $firstHour < 10 ? "0$firstHour" : $firstHour;
			  ?>
			  <option value="<?php echo $firstHour ?>" <?php if($_POST['hour'] === $firstHour){ echo 'selected'; }?>><?php echo $firstHour ?></option>
			  <?php
			    $firstHour++;
			   }
			  ?>
        </select></td><td><select name="min" class="bigSelect">
              <?php
			   $firstMin = 0;
		       $maxMin = 59;
			   
			   while($firstMin <= $maxMin){
				  $firstMin = $firstMin < 10 ? "0$firstMin" : $firstMin;
			  ?>
			  <option value="<?php echo $firstMin ?>" <?php if($_POST['min'] === $firstMin){ echo 'selected'; }?>><?php echo $firstMin ?></option>
			  <?php
			    $firstMin++;
			   }
			  ?>
	 </select></td>
	 <!--<td><select name="minInt" class="bigSelect">
              <?php
			   $firstMinInt = 0;
		       $maxMinInt = 180;
			   
			   while($firstMinInt <= $maxMinInt){
			  ?>
			  <option value="<?php echo $firstMinInt ?>"><?php echo $firstMinInt ?></option>
			  <?php
			    $firstMinInt = $firstMinInt+ 15;
			   }
			  ?>
	 </select></td>-->
	 </tr></table>
	 <div id="intervals">
	 <!--<select id="presets" class="bigSelectWide">
	    <option value="0">Select a Preset (Optional)</option>
	    <option value="5,10,15,20,25,30,35,40,45,50,55,60">Every 5 Minutes</option>
	 </select>-->
	 <table id="intervalTable">
	     <tr><td><input type="text" placeholder="Add Interval In Minutes Here" name="interval[]" class="interval"></td></tr>
	 </table>
	 </div>
	 <a class="btn btn-large" id="addInterval">Add Another Interval</a><br>
	 <br><br>
     <input type="submit" class="btn btn-large btn-success"  value="Get Times">
	 </form> <a href="http://mcrutimecalc.aws.af.cm/"  class="btn btn-large btn-warning">Reset</a>
	 <?php
	 if($_POST['hour'] && $_POST['min']){
	 ?>
	 <hr><h1>Results Starting From <?php echo $_POST['hour']; ?>:<?php echo $_POST['min'];?></h1>
	 <div id="results">
	 <?php
     //echo '<hr><h1>Results Starting From '.$_POST['hour'].':'.$_POST['min'].' :</h1>';
	 $event_time = $_POST['hour'].":".$_POST['min'].":00";
     sort($_POST['interval']);
	 foreach($_POST['interval'] as $interval){
     
	 if($interval > 0){
	   $timestamp = strtotime("$event_time");

	   $etime = strtotime("+$interval minutes", $timestamp);

	   $next_time = date('H:i:s', $etime);

	   //$event_time = $next_time;

	   echo "<h1>+$interval - $next_time</h1><br>";
     }

	 }
	 ?>
	
	</div>
	<?php
	}
?>


	 </div>
	 <div class="row">Written By Shane Burgess and free to use by The Michigan Clinical Research Unit (MCRU) staff only.</div>
    </div> <!-- /container -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
     <script type="text/javascript">
	 
	 $(document).ready(function(){
	  $("#addInterval").click(function(){
		  $("#intervalTable").append('<tr><td><input type="text" placeholder="Add Interval In Minutes Here" name="interval[]" class="added"></td></tr>');
	  });
	  
	  $("#presets").change(function(){
		  var presetSelect = $(this).val();
		  var presets = presetSelect.split(",");
		  //alert(presets);
		  
		  $.each(presets.reverse(),function(index,value){
		  $("#intervalTable").prepend('<tr><td><input type="text" placeholder="Add Interval In Minutes Here" name="interval[]" value="'+value+'"></td></tr>');  
		  });
	  });
	  
	  
	 });
	 
	 function printOut(){
		 
		 var myWindow=window.open('','','width=200,height=100');
             myWindow.document.write($("#results").text());
             myWindow.focus();
	 }
	 </script>
  </body>
</html>



