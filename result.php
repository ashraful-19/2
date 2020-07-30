

<?php
if(!isset($_GET['submit']))
{
header("location:question.php");
}

$x=$_GET;
?> 

<html>

<head>
<title> Online Quiz</title>

</head>
<body>

<div style="border:2px solid green;padding:20px;margin:20px 200px;background-color:;">
<div><h1 style="text-align:center">Online Quiz Exam</h1>
<h4 style="text-align:right">Time Left- 35:45</h4></div>

<?php
$conn= new mysqli('localhost','root','','quiz1')or die("Could not connect to mysql");
$sql = "SELECT * FROM question";
$result=mysqli_query($conn,$sql);

  if(mysqli_num_rows($result)>0)

{
		 $j=1;
		 $right=0;
		 $wrong=0;
		 $no_answer=0;
		

   while($data=mysqli_fetch_assoc($result))
		{
			if($x[$j]==$data['correct_ans'])
			{
				 $right++;
				 
			}
			else if($x[$j]=="no_attempt")
			{
				 $no_answer++;
			
			}
			else
			{
				$wrong++;
				
			}
			$j++;
		
		}
		
		echo "<br><br>";
		echo "&nbsp;&nbsp;&nbsp;<b><u>Result Analysis</b></u><br>";
		echo "&nbsp;&nbsp;&nbsp;Right answer:".$right."<br>";
		echo "&nbsp;&nbsp;&nbsp;Wrong Answer:".$wrong."<br>";
		echo "&nbsp;&nbsp;&nbsp;No attempt:".$no_answer."<br>";
		echo "&nbsp;&nbsp;&nbsp;Total Question:".$total= $right+$wrong+$no_answer;
		
}		
?>
 
<?php

$conn= new mysqli('localhost','root','','quiz1')or die("Could not connect to mysql");

$sql = "SELECT * FROM question";
$result=mysqli_query($conn,$sql);


   if(mysqli_num_rows($result)>0)

{$i=1;

   while($data=mysqli_fetch_assoc($result))
		{?>

		  <table style="text-align:left;">
			<thead>
			  <tr>
				<th><?php echo $i.".";?>  <?php echo $data['ques']; ?>&nbsp;&nbsp; <?php if($x[$i]==1 or $x[$i]==2 or $x[$i]==3 or $x[$i]==4){} else{echo "<font color=red>Not Attempt!</font>";}?>  </th>
				
			  </tr>
			</thead>
			
			<tbody>

			  <tr >
				<td>&nbsp;<input type="checkbox" value="1" name="<?php echo $data['id']; ?>" <?php if($data['id']==$i && $x[$i]==1){echo 'checked="checked"disabled="disabled"'; } else {echo 'disabled="disabled"';}?>>&nbsp;<?php echo $data['ans1'];?>&nbsp;<?php if($data['id']==$i && 1==$data['correct_ans']){echo '<img src="6.png" alt="Flowers in Chania"  width="15" height="14">';}else if($data['id']==$i && $x[$i]==1){echo '<img src="1.png" alt="Flowers in Chania"  width="20" height="14">';}?> </td>
			  </tr> 
		
			
			  <tr >
				<td>&nbsp;<input type="checkbox" value="2" name="<?php echo $data['id']; ?>"<?php if($data['id']==$i && $x[$i]==2){echo 'checked="checked"disabled="disabled"';} else {echo 'disabled="disabled"';}?> />&nbsp;<?php echo $data['ans2'];?>&nbsp;<?php if($data['id']==$i && 2==$data['correct_ans']){echo '<img src="6.png" alt="Flowers in Chania"  width="15" height="14">';}else if($data['id']==$i && $x[$i]==2){echo '<img src="1.png" alt="Flowers in Chania"  width="20" height="14">';}?></td>
			  </tr>
		
			  <tr >
				<td>&nbsp;<input type="checkbox" value="3" name="<?php echo $data['id']; ?>"<?php if($data['id']==$i && $x[$i]==3){echo 'checked="checked"disabled="disabled"';} else {echo 'disabled="disabled"';}?>  />&nbsp;<?php echo $data['ans3'];?>&nbsp;<?php if($data['id']==$i && 3==$data['correct_ans']){echo '<img src="6.png" alt="Flowers in Chania"  width="15" height="14">';}else if($data['id']==$i && $x[$i]==3){echo '<img src="1.png" alt="Flowers in Chania"  width="20" height="14">';}?></td>
			  </tr>
			
			  	<tr >
				<td>&nbsp;<input type="checkbox" value="4" name="<?php echo $data['id']; ?>" <?php if($data['id']==$i && $x[$i]==4){echo 'checked="checked"disabled="disabled"';} else {echo 'disabled="disabled"';} ?>/>&nbsp;<?php echo $data['ans4'];?>&nbsp;<?php if($data['id']==$i && 4==$data['correct_ans']){echo '<img src="6.png" alt="Flowers in Chania"  width="15" height="14">';}else if($data['id']==$i && $x[$i]==4){echo '<img src="1.png" alt="Flowers in Chania"  width="20" height="14">';}?></td>
			  </tr>
			 
			<tr >
				<td><input type="radio" style="display:none" value="no_attempt" name="<?php echo $data['id']; ?>" /></td>
			  </tr><br><br>
			   <tr>
				<td>&nbsp; <?php echo "<b>Explanation:</b>".$data['explanation'] ?>  </td>
			  </tr>
			</tbody>
			
		  </table>
		<?php $i++; }
}
?>

	<center><button><a href="question.php" style="text-decoration:none;padding:4px;">Take Again</a></button></center>


</body>
</html>
