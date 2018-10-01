<html>
<head>
<script src=MPF.js></script>
<script language="javascript">
var Absent ; 
Present = 0 ;
function Toggle(id) {
	if(id.className == 'Absent'){
		id.className = 'Present' ;
		id.innerHTML = 'Present' ;
		Present ++ ;
		Absent -- ;
	} else {
		id.className = 'Absent' ;
		id.innerHTML = 'Absent' ;
		Absent ++ ;
		Present -- ;		
	}
document.getElementById('Header').innerHTML = "Present: " + Present +  "       Absent:"  + Absent + "             Total:" +document.getElementById('nos').value ;		
}
function Save(id) {
var Pre = [];
var Status1 = document.getElementsByClassName('Present');
for (var i = 0, n = Status1.length; i < n; ++i) {
    var str1 = Status1[i].id;
	var ret1 = str1.substring(1);
    Pre.push(ret1);
}
var Present2 = Pre.join();
//console.log(Present2);
//window.alert("Present="+Present2);
var Abs = [];
var Status2 = document.getElementsByClassName('Absent');
for (var i = 0, n = Status2.length; i < n; ++i) {
    var str2 = Status2[i].id;
	var ret2 = str2.substring(1);
    Abs.push(ret2);
}
var Absent = Abs.join();
//console.log(Absent);
    URL = "save.php";
	//window.alert(document.getElementById('class1').value) 
    Status = "Present2="+Present2+"&Class="+document.getElementById('class1').value+"&Absent2="+Absent+"&Present="+Status1.length+"&Absent="+Status2.length;
    //window.alert(Status)
  console.log(Status);
	executeAjax(URL,Status,'POST',true,function(ret1){	
        if(ret1 != 'NOK'){ // alert ("gets");
            document.getElementById('students').innerHTML = ret1 ;
			 //window.alert(ret)
        }else{ 
        }
    });
//location.reload();
	window.location = "index.php";
	}
</script>
<style type="text/css">
body  {
    background-image: url("f.jpg");
 }
.Top {
		font-size: 50px;
		font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
		color: #21C00F;		
}
</style>
</head>
<body>

<?php
 include ("conf.php");
 ?>
		<div class="Top" align="center" style="height:250px;">	
<br/>
	<label> Attendance Class: </label>
	<select id="class1" onChange="" class="Top" style="width:300px font-size: 50px font-family: Palatino Linotype, Book Antiqua, Palatino, serif color: #21C00F";>
	<option value="">Select Class </option>
	<?php	
	//------------------------Class List---------------------------------
$sqlc="	SELECT section_code, Class FROM (SELECT C.section_code, Class FROM 
(SELECT A.section_code, Class FROM (SELECT section_code, CONCAT(class.class_name, ', ', section.section_name) AS Class 
FROM class JOIN section ON class.class_code=section.class_code WHERE shift_code='4.1.1.12.1') AS B
 JOIN (SELECT DISTINCT section_code FROM student_class_section_log  WHERE session_code='4.1.1.12' AND STATUS='A') AS A 
 WHERE A.section_code=B.section_code) C LEFT OUTER JOIN student_class_attendance sca ON sca.section_code=C.section_code  
 AND sca.date=CURRENT_DATE WHERE sca.section_code IS NULL) AS D  ORDER BY Class ASC";
 $resultc=mysql_query($sqlc);	
	while ($rowc=mysql_fetch_array($resultc))
		{ 
		?>
		<option value="<?php echo $rowc['section_code'];?>"> <?php echo $rowc['Class'];?> </option>
		<?php
		}
		?>
		</select>
</div>
<div id="students"></div>
</body>
<script src=MPF.js></script>
<script language="javascript" >
	document.getElementById('class1').addEventListener('change',function(){
    URL = "studentlist.php";
	//window.alert(document.getElementById('class1').value) 
    Data = "Class="+document.getElementById('class1').value ;
  //  window.alert(Data)
	executeAjax(URL,Data,'POST',true,function(ret){	
        if(ret != 'NOK'){ // alert ("gets");
            document.getElementById('students').innerHTML = ret ;
			Absent = +document.getElementById('nos').value ;	
document.getElementById('Header').innerHTML = "Present: " + Present +  "       Absent:"  + Absent + "             Total:" +document.getElementById('nos').value ;		
		//window.alert(ret)
        }else{ 
        }
    });
	Present = 0;
	});
</script>
</html>