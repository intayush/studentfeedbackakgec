<?php
require_once 'connect.inc.php';
if(isset($_POST['tq1'])&&isset($_POST['tq2'])&&isset($_POST['tq3'])&&isset($_POST['tq4'])&&isset($_POST['tq5'])){
  $response = array();
  $i=1;
  while($i<=5){
    $response[] = $_POST['tq'.$i];
    $i++;
  }
  while($i<=10){
    if(isset($_POST['tq'.$i])){
      $response[] = 1;
    }else{
      $response[] = 0;
    }
    $i++;
  }
  $studentid = $_POST['studentid'];
  $facultyid = $_POST['facultyid'];
  $subject = $_POST['subject'];
  $year = $_POST['year'];
  $section = $_POST['section'];
  $insert_response_sql = "insert into theory_response (`student_id`,`faculty_id`,`subject`,`year`,`section`,`q1`,`q2`,`q3`,`q4`,`q5`,`q6`,`q7`,`q8`,`q9`,`q10`) values('$studentid','$facultyid','$subject','$year','$section','$response[0]','$response[1]','$response[2]','$response[3]','$response[4]','$response[5]','$response[6]','$response[7]','$response[8]','$response[9]')";
  if($con->query($insert_response_sql)){
    header('Content-Type: application/json');
    print json_encode('Respose Recorded');
  }else{
    header('HTTP/1.1 500 Internal Server Error');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('message' => mysqli_error($con), 'code' => 500)));
  }
}
 ?>
