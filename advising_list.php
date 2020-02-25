<?php
include('connection.php');
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<style>
#list {
  border-collapse: collapse;
  width: 80%;
  text-align: center;
  margin: 5px auto;
}

#list td, #list th {
  border: 1px solid #ddd;
  padding: 5px;
  font-size: 20px;
}
#list tr:nth-child(even){background-color: #f2f2f2;}

#list tr:hover {background-color: #129DEA;}

#list th {
  padding-top: 5px;
  padding-bottom: 5px;
  text-align: center;
  background-color: #032B41;
  color: white;
}
@media only screen and (max-width: 560px) {
#list{
  width: 95%;
 font-size: 15px;
}
#list th,#list td{
 font-size: 15px;
}
h2{
  font-size: 22px;
  text-align: center;
  color: black;
  font-family: "Montserrat-SemiBold";

}
}
</style>
</head>
<body>
	<br>
<h2 style="text-align: center">Advising List</h2>
<div class="table-responsive">
<table id="list" class="table table table-hover" style="margin: 0px auto;">
<thead class="table-dark">
<tr>
    <th>Course</th>
		<th>Section</th>
    <th>Start Time</th>
    <th>End Time</th>
    <th>Day</th>
    <th>Room No.</th>
  </tr>
</thead>
  


    <?php
    $q=$db->query("SELECT * FROM advising_list WHERE section!='0' or course!='' or course!='.'");
    while ($p=$q->fetch(PDO::FETCH_OBJ)) {
      $course=$p->course;
      $section=$p->section;
      $stime=$p->stime;
      $etime=$p->etime;
      $day=$p->day;
      $room=$p->room;

    ?>
<tbody>
<tr>
<td><?= $course; ?></td>
<td><?= $section; ?></td>
<td><?= $stime; ?></td>
<td><?= $etime; ?></td>
<td><?= $day; ?></td>
<td><?= $room; ?></td>
</tr>
</tbody>
    <?php
}
	 ?>

</table>
</div>
<!-- <div align="center"><button onclick="window.print()" style="font-weight:bold;font-size: 12px; width: 90px; height: 35px;border-radius:10px;background-color:#F9054B;font-size:18px;">Print</button> </div> -->

</body>
</html>
