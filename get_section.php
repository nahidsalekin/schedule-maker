<?php
include('connection.php');

// print_r($_POST['course']);
$received_course=$_POST;
$course = json_decode($_POST['course']);
$course=strtoupper($course);
// print_r($course);
//echo "got the php file";
$q=$db->query("SELECT DISTINCT section FROM advising_list WHERE course='$course' ");
$i=0;
while ($p=$q->fetch(PDO::FETCH_OBJ)) {
   $c1s[$i]=$p->section;
  $i++;
}
echo json_encode($c1s);

?>
