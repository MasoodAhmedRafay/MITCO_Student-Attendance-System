<html>
<head>
<style type="text/css">
body  {  background-image: url("f.jpg"); }
.Absent {	font-size: 30px;	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;	color: #000000;	background-color: #FE0000;	text-decoration: none;	}
.Present {	font-size: 30px;	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;	color: #000000;	background-color: #21C00F;	text-decoration: none;	}
.Name {	font-size: 30px;	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;		color: #8768C6;		text-decoration: none;	}
TABLE {	FONT-WEIGHT: normal;	 FONT-SIZE: 100%;	LINE-HEIGHT: normal;	FONT-STYLE: normal;	FONT-VARIANT: normal;	align: center;	}
.Title { font-size: 70px;	font-family: Verdana, Geneva, sans-serif;	color:  #21C00F;	}
.button {
  display: inline-block;
  height: 50px;
  line-height: 50px;
  padding-right: 30px;
  padding-left: 70px;
  position: relative;
  background-color:rgb(41,127,184);
  color:rgb(255,255,255);
  text-decoration: none;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 15px;
  
  
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  text-shadow:0px 1px 0px rgba(0,0,0,0.5);
-ms-filter:"progid:DXImageTransform.Microsoft.dropshadow(OffX=0,OffY=1,Color=#ff123852,Positive=true)";zoom:1;
filter:progid:DXImageTransform.Microsoft.dropshadow(OffX=0,OffY=1,Color=#ff123852,Positive=true);

  -moz-box-shadow:0px 2px 2px rgba(0,0,0,0.2);
  -webkit-box-shadow:0px 2px 2px rgba(0,0,0,0.2);
  box-shadow:0px 2px 2px rgba(0,0,0,0.2);
  -ms-filter:"progid:DXImageTransform.Microsoft.dropshadow(OffX=0,OffY=2,Color=#33000000,Positive=true)";
filter:progid:DXImageTransform.Microsoft.dropshadow(OffX=0,OffY=2,Color=#33000000,Positive=true);
}

.button span {
  position: absolute;
  left: 0;
  width: 50px;
  background-color:rgba(0,0,0,0.5);
  
  -webkit-border-top-left-radius: 5px;
-webkit-border-bottom-left-radius: 5px;
-moz-border-radius-topleft: 5px;
-moz-border-radius-bottomleft: 5px;
border-top-left-radius: 5px;
border-bottom-left-radius: 5px;
border-right: 1px solid  rgba(0,0,0,0.15);
}

.button:hover span, .button.active span {
  background-color:rgb(0,102,26);
  border-right: 1px solid  rgba(0,0,0,0.3);
}

.button:active {
  margin-top: 2px;
  margin-bottom: 13px;

  -moz-box-shadow:0px 1px 0px rgba(255,255,255,0.5);
-webkit-box-shadow:0px 1px 0px rgba(255,255,255,0.5);
box-shadow:0px 1px 0px rgba(255,255,255,0.5);
-ms-filter:"progid:DXImageTransform.Microsoft.dropshadow(OffX=0,OffY=1,Color=#ccffffff,Positive=true)";
filter:progid:DXImageTransform.Microsoft.dropshadow(OffX=0,OffY=1,Color=#ccffffff,Positive=true);
}.button:hover {
	background-color:color: #8768C6;
}
.button:active {
	position:relative;
	top:1px;
}
.button.purple {
  background: #21C00F;
}

</style>
</head>
<body>
<?php
include ("conf.php"); 
////////////////////LIST OF STUDENTS IN CLASS\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$sqls="SELECT student_code, A.Student_Name FROM (SELECT scsl.student_code, CONCAT(spi.first_name, ' ', spi.last_name) AS Student_Name
		FROM class JOIN section ON class.class_code=section.class_code JOIN student_class_section_log scsl
		ON section.section_code=scsl.section_code JOIN student_personal_info spi ON scsl.student_code=spi.student_code
		WHERE section.section_code='$_POST[Class]') AS A";
			$results=mysql_query($sqls);
			$i=0;
	?>
	<div class="TABLE" align="center">
		<div style="overflow: scroll;max-height:1200px">
		<table width="80%" border="1">
		<tr class="Name">
<div class="Title" id=Header align="center-right" style="font-size: 50px;">
<?php
			while ($rows=mysql_fetch_assoc($results))		
		{
		 //echo $rows[student_code];
		$j = $rows[student_code];
		?>
		<td  class="Name">
		<?php echo $rows[Student_Name];
		?></td>
		<td align="center" id="A<?php echo $j ?>" class="Absent" onclick="Toggle(this);">Absent</td>
		</tr>
		<?php
		$i++;
		}
		?>
		<input name="students" type="hidden" id="nos" value="<?php echo $i ?>">
		</div>	
		</table>
		</br>
		<button href="#" class="button"  onclick="Save(this)"><span>	✓	</span>					DONE						</button>
		</div>
		</div>
		<div id="save"></div>
		</body>
		</html>