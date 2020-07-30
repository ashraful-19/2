<html>

<head>
<title> Online Quiz</title>

</head>
<body>
<script src="jquery-3.5.1.min.js"></script>

<div style="border:2px solid green;padding:20px;margin:20px 200px;">
<div><h1 style="text-align:center">Online Quiz Exam</h1>
<h4 style="text-align:right">Time Left- 35:45</h4></div>
    
<form method="get" id="form1" action="result.php">
			<?php
			$conn= new mysqli('localhost','root','','quiz1')or die("Could not connect to mysql");
			$sql = "SELECT * FROM question";
			$result=mysqli_query($conn,$sql);

			$i=1;
			if(mysqli_num_rows($result)>0){
			
			while($data=mysqli_fetch_assoc($result))
			{?>
		  <table style="text-align:left;">
			<thead>
			  <tr>
				<th><?php echo $i.".";?>  <?php echo $data['ques'];?>  </th>
			  </tr>
			</thead>
			
			<tbody>

			  <tr class="info">
				<td>&nbsp;<input onclick="myResult(<?php echo $data['id']; ?>,<?php echo $data['correct_ans']?>,1)" type="radio" data-limit="only-one-in-a-group" value="1" name="<?php echo $data['id']; ?>"/>&nbsp;a)&nbsp;<?php echo $data['ans1'];?>&nbsp;<img style="display:none;" id="a<?php echo $data['id']; ?>" src="1.png" alt="Flowers in Chania"  width="20" height="14"><img style="display:none;" id="w<?php echo $data['id']; ?>" src="6.png" alt="Flowers in Chania"  width="15" height="14"></td> 
			  </tr>
		
			
			  <tr class="info">
				<td>&nbsp;<input onclick="myResult(<?php echo $data['id']; ?>,<?php echo $data['correct_ans']?>,2)" type="radio" data-limit="only-one-in-a-group" value="2" name="<?php echo $data['id']; ?>" />&nbsp;b)&nbsp;<?php echo $data['ans2'];?>&nbsp; <img style="display:none;" id="b<?php echo $data['id']; ?>" src="1.png" alt="Flowers in Chania"  width="20" height="14"><img style="display:none;" id="x<?php echo $data['id']; ?>" src="6.png" alt="Flowers in Chania"  width="15" height="14"></td>
			  </tr>
		
			  <tr class="info">
				<td>&nbsp;<input onclick="myResult(<?php echo $data['id']; ?>,<?php echo $data['correct_ans']?>,3)" type="radio" data-limit="only-one-in-a-group" value="3" name="<?php echo $data['id']; ?>" />&nbsp;c)&nbsp;<?php echo $data['ans3'];?>&nbsp; <img style="display:none;" id="c<?php echo $data['id']; ?>" src="1.png" alt="Flowers in Chania"  width="20" height="14"><img style="display:none;" id="y<?php echo $data['id']; ?>" src="6.png" alt="Flowers in Chania"  width="15" height="14"></td>
			  </tr>
			
			  <tr class="info">
				<td>&nbsp;<input onclick="myResult(<?php echo $data['id']; ?>,<?php echo $data['correct_ans']?>,4)" type="radio" data-limit="only-one-in-a-group" value="4" name="<?php echo $data['id']; ?>" />&nbsp;d)&nbsp;<?php echo $data['ans4'];?>&nbsp; <img style="display:none;" id="d<?php echo $data['id']; ?>" src="1.png" alt="Flowers in Chania"  width="20" height="14"><img style="display:none;" id="z<?php echo $data['id']; ?>" src="6.png" alt="Flowers in Chania"  width="15" height="14"></td>
			  </tr>
			 
			  <tr class="info">
				<td><input type="radio" checked="checked" style="display:none" value="no_attempt" name="<?php echo $data['id']; ?>"/></td>
			  </tr><br>
			  <tr>
				<td style="border:1px solid green;"><div style="display:none;" id="ex<?php echo $data['id']; ?>"> <p style="display:none;" id="aa<?php echo $data['id']; ?>"><b>Your Answer:</b><?php echo "a)".$data['ans1'];?></p><p style="display:none;" id="bb<?php echo $data['id']; ?>"><b><b>Your Answer:</b></b><?php echo "b)".$data['ans2'];?></p><p style="display:none;" id="cc<?php echo $data['id']; ?>"><b>Your Ans:</b><?php echo "c)".$data['ans3'];?></p><p style="display:none;" Id="dd<?php echo $data['id']; ?>">Your Ans:<?php echo "d)".$data['ans4'];?></p><p style=";"><b>Correct Ans:</b>&nbsp;<?php if($data['correct_ans']==1){echo "a)".$data['ans1'];} else if($data['correct_ans']==2){echo "b)".$data['ans2'];} else if($data['correct_ans']==3){echo "c)".$data['ans3'];} else{echo "d)".$data['ans4'];}?></p> <p style=""><?php echo "<b>Explanation:</b>".$data['explanation'] ?></p></div>  </td>
			  </tr>
			</tbody>
			
		  </table
		  </table>
		<?php
		 $i++; }
		}
		?>
		
<script>
	var cbxes = document.querySelectorAll('input[type="radio"][data-limit="only-one-in-a-group"]');
	var count = 0;
	var totalcheked = 0;

	$(cbxes).on('click', function() {
		  $.each(cbxes, function(i) {
		    if (cbxes[i].checked) {
		      count++;
		    }
		  });
	  
  		totalcheked = count;
  		count = 0;
	});
</script>

	<center><input type="submit" onclick="confirm('You answered ' + (totalcheked) + ' out of ' + <?php echo $i-1; ?> + ' questions. Are you sure to submit?')" id="submitbtn" value="submit Quiz" name="submit" /></center>
</form>	
</div>

<p id="demo"></p>
<script>
	function myResult(no,correct,value) {

	var w1="a"+no;
	var w2="b"+no;
	var w3="c"+no;
	var w4="d"+no;
	
	var c1="w"+no;
	var c2="x"+no;
	var c3="y"+no;
	var c4="z"+no;

	var cr1= document.getElementById(c1);
	var cr2= document.getElementById(c2);
	var cr3= document.getElementById(c3);
	var cr4= document.getElementById(c4);
	var wr1= document.getElementById(w1);
	var wr2= document.getElementById(w2);
	var wr3= document.getElementById(w3);
	var wr4= document.getElementById(w4);
	
	
	var exp="ex"+no;
	var explanation=document.getElementById(exp);
	explanation.style.display='inline';
	
	
	var ww1="aa"+no;
	var ww2="bb"+no;
	var ww3="cc"+no;
	var ww4="dd"+no;
	
	var crr1= document.getElementById(ww1);
	var crr2= document.getElementById(ww2);
	var crr3= document.getElementById(ww3);
	var crr4= document.getElementById(ww4);
	

	
	

	
if(correct==value){
	
	if(correct==value){	
			
			if(value==1){
			
				
				crr1.style.display='inline';
				crr2.style.display='none';
				crr3.style.display='none';
				crr4.style.display='none';
				
				
				cr1.style.display='inline';
				cr2.style.display='none';
				cr3.style.display='none';
				cr4.style.display='none';
				wr1.style.display='none';
				wr2.style.display='none';
				wr3.style.display='none';
				wr4.style.display='none';
			}
			else if(value==2){
			
				crr2.style.display='inline';
				crr1.style.display='none';
				crr3.style.display='none';
				crr4.style.display='none';
		
				cr2.style.display='inline';
				cr1.style.display='none';
				cr3.style.display='none';
				cr4.style.display='none';
				wr1.style.display='none';
				wr2.style.display='none';
				wr3.style.display='none';
				wr4.style.display='none';
		
		
		}
		
			else if(value==3){
			
				crr3.style.display='inline';
				crr2.style.display='none';
				crr1.style.display='none';
				crr4.style.display='none';
				
				cr3.style.display='inline';
				cr2.style.display='none';
				cr1.style.display='none';
				cr4.style.display='none';
				wr1.style.display='none';
				wr2.style.display='none';
				wr3.style.display='none';
				wr4.style.display='none';
		}	

			else {
			
				crr4.style.display='inline';
				crr2.style.display='none';
				crr3.style.display='none';
				crr1.style.display='none';
				
				
				cr4.style.display='inline';
				cr2.style.display='none';
				cr3.style.display='none';
				cr1.style.display='none';
				wr1.style.display='none';
				wr2.style.display='none';
				wr3.style.display='none';
				wr4.style.display='none';	
		}
	
	
	}
	
}	
	
	else if (value){
	
	 
		if(value==1){
		
				crr1.style.display='inline';
				crr2.style.display='none';
				crr3.style.display='none';
				crr4.style.display='none';
				
				cr4.style.display='none';
				cr2.style.display='none';
				cr3.style.display='none';
				cr1.style.display='none';
				wr1.style.display='inline';
				wr2.style.display='none';
				wr3.style.display='none';
				wr4.style.display='none';	
				
				if(correct==1){
				cr1.style.display='inline';
				
			    }
				else if(correct==2){
				cr2.style.display='inline';
				
			    }
				
				else if(correct==3){
				cr3.style.display='inline';
				
			    }
				else{
				cr4.style.display='inline';
				
			    }
				
	
		}
   
		else if (value==2){
				
				crr2.style.display='inline';
				crr3.style.display='none';
				crr1.style.display='none';
				crr4.style.display='none';
				
				cr4.style.display='none';
				cr2.style.display='none';
				cr3.style.display='none';
				cr1.style.display='none';
				wr1.style.display='none';
				wr2.style.display='inline';
				wr3.style.display='none';
				wr4.style.display='none';	
				if(correct==1){
				cr1.style.display='inline';
				
			    }
				else if(correct==2){
				cr2.style.display='inline';
				
			    }
				
				else if(correct==3){
				cr3.style.display='inline';
				
			    }
				else{
				cr4.style.display='inline';
				
			    }
	
	}
	
	
		else if(value==3){
		
		
				crr3.style.display='inline';
				crr2.style.display='none';
				crr1.style.display='none';
				crr4.style.display='none';
				
				cr4.style.display='none';
				cr2.style.display='none';
				cr3.style.display='none';
				cr1.style.display='none';
				wr1.style.display='none';
				wr2.style.display='none';
				wr3.style.display='inline';
				wr4.style.display='none';	
				
				if(correct==1){
				cr1.style.display='inline';
				
			    }
				else if(correct==2){
				cr2.style.display='inline';
				
			    }
				
				else if(correct==3){
				cr3.style.display='inline';
				
			    }
				else{
				cr4.style.display='inline';
				
			    }
		}
	
	else {		
				crr4.style.display='inline';
				crr2.style.display='none';
				crr1.style.display='none';
				crr3.style.display='none';
				
				cr4.style.display='none';
				cr2.style.display='none';
				cr3.style.display='none';
				cr1.style.display='none';
				wr1.style.display='none';
				wr2.style.display='none';
				wr3.style.display='none';
				wr4.style.display='inline';	
				if(correct==1){
				cr1.style.display='inline';
				
			    }
				else if(correct==2){
				cr2.style.display='inline';
				
			    }
				
				else if(correct==3){
				cr3.style.display='inline';
				
			    }
				else{
				cr4.style.display='inline';
				
			    }
		}	 	
	}
	
 
	
}																															0
	
</script>



</body>
</html>
