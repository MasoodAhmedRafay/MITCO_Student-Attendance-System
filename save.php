<?php
include ("conf.php");
$p=$_POST['Present'];
$a=$_POST['Absent'];
$str = $_POST[Absent2];
$Absent = explode(',',$str);
$str = $_POST[Present2];
$Present = explode(',',$str);

$ip = $_SERVER['REMOTE_ADDR'];
		//----------------------INSERT INTO ABSENT----------------------\\
		foreach ($Absent as $Avalues) {
			$qry_a="INSERT INTO student_class_attendance(section_code,date,student_code,status,ip) VALUES('$_POST[Class]',NOW(),'$Avalues','A','$ip')"; 
			$result_qrya= mysql_query($qry_a);
		}
		//echo "Saved Absent";
		//----------------------INSERT INTO ABSENT----------------------\\
		foreach ($Present as $Pvalues) {
			$qry_a="INSERT INTO student_class_attendance(section_code,date,student_code,status,ip) VALUES('$_POST[Class]',NOW(),'$Pvalues','P','$ip')"; 
			$result_qrya= mysql_query($qry_a);
		}
		//echo "Saved Present";
?>
