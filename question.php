<html>

<head>
<title> Online Quiz</title>

</head>
<body>

<div style="border:2px solid green;padding:20px;margin:20px 200px;">
<div><h1 style="text-align:center">Online Quiz Exam</h1>
<h4 style="text-align:right">Time Left- 35:45</h4></div>

<?php


$conn= new mysqli('localhost','root','','quiz1')or die("Could not connect to mysql");
$sql = "SELECT * FROM question";
$result=mysqli_query($conn,$sql);

$i=1;
if(mysqli_num_rows($result)>0){

while($data=mysqli_fetch_assoc($result))
{?>



         
<form method="get" id="form1" action="result.php">
		  <table style="text-align:left;">
			<thead>
			  <tr>
				<th><?php echo $i.".";?>  <?php echo $data['ques'];?>  </th>
			  </tr>
			</thead>
			
			<tbody>

			  <tr class="info">
				<td>&nbsp;<input type="radio" value="1" name="<?php echo $data['id']; ?>" id="<?php echo $data['id']; ?>"/>&nbsp;<?php echo $data['ans1'];?> </td>
			  </tr>
		
			
			  <tr class="info">
				<td>&nbsp;<input type="radio" value="2" name="<?php echo $data['id']; ?>" id="<?php echo $data['id']; ?>"/>&nbsp;<?php echo $data['ans2'];?></td>
			  </tr>
		
			  <tr class="info">
				<td>&nbsp;<input type="radio" value="3" name="<?php echo $data['id']; ?>" id="<?php echo $data['id']; ?>"/>&nbsp;<?php echo $data['ans3'];?></td>
			  </tr>
			
			  	<tr class="info">
				<td>&nbsp;<input type="radio" value="4" name="<?php echo $data['id']; ?>" id="<?php echo $data['id']; ?>"/>&nbsp;<?php echo $data['ans4'];?></td>
			  </tr>
			 
			<tr class="info">
				<td><input type="radio" checked="checked" style="display:none" value="no_attempt" name="<?php echo $data['id']; ?>" /></td>
			  </tr><br>
			</tbody>
			
		  </table>
		<?php $i++; }
}
?>
 
	<center><input type="submit" value="submit Quiz" name="submit" /></center>
</form>	</div>
<button onclick="myFunction()">Try it</button>

<p id="demo"></p>
<script>
function myFunction() {
  var x = document.getElementByName(<?php echo $data['id']; ?>).checked.length;
  document.getElementById("demo").innerHTML = x;
}
</script>
</body>
</html>