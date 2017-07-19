<?php
require_once 'connect.inc.php';
if(isset($_POST['pq-1-f-1'])&&isset($_POST['pq-1-f-2'])&&isset($_POST['pq-2-f-1'])&&isset($_POST['pq-2-f-2'])&&isset($_POST['pq-3-f-1'])&&isset($_POST['pq-3-f-2'])&&isset($_POST['pq-4-f-1'])&&isset($_POST['pq-4-f-2'])&&isset($_POST['pq-5-f-1'])&&isset($_POST['pq-5-f-2'])){
  $fac_1_response = array();
  $fac_2_response = array();
  $i=1;
  while($i<=5){
    $fac_1_response[] = $_POST['pq-'.$i.'-f-1'];
    $i++;
  }
  $i=1;
  while($i<=5){
    $fac_2_response[] = $_POST['pq-'.$i.'-f-2'];
    $i++;
  }
  $studentid = $_POST['studentid'];
  $faculty_1_id = $_POST['faculty_1_id'];
  $faculty_2_id = $_POST['faculty_2_id'];
  $subject = $_POST['subject'];
  $year = $_POST['year'];
  $section = $_POST['section'];
  $insert_faculty_1_response_sql = "insert into practical_faculty_response (`student_id`,`faculty_id`,`subject`,`year`,`section`,`q1`,`q2`,`q3`,`q4`,`q5`) values('$studentid','$faculty_1_id','$subject','$year','$section','$fac_1_response[0]','$fac_1_response[1]','$fac_1_response[2]','$fac_1_response[3]','$fac_1_response[4]')";
  $insert_faculty_2_response_sql = "insert into practical_faculty_response (`student_id`,`faculty_id`,`subject`,`year`,`section`,`q1`,`q2`,`q3`,`q4`,`q5`) values('$studentid','$faculty_2_id','$subject','$year','$section','$fac_2_response[0]','$fac_2_response[1]','$fac_2_response[2]','$fac_2_response[3]','$fac_2_response[4]')";
  if($con->query($insert_faculty_1_response_sql)&&$con->query($insert_faculty_2_response_sql)){
    header('Content-Type: application/json');
    print json_encode('Respose Recorded');
  }else{
    header('HTTP/1.1 500 Internal Server Error');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('message' => mysqli_error($con), 'code' => 500)));
  }
}
 ?>
