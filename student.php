<?php
include_once 'header.php';
date_default_timezone_set("Asia/Kolkata");
$date = date("d-m-Y");
?>
<body>
    <nav class="teal lighten-3">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo center">Student Feedback Portal</a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
					<li><a href="logout.php" class="right"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
				</ul>
      </div>
    </nav>
		<div class="container">
<?php
	session_start();
if(!isset($_SESSION['ses_name']) && isset($_POST['rollno'])){
	$_SESSION['ses_rollno']=$_POST['rollno'];
	$rollno = $_POST['rollno'];
}
else if(isset($_SESSION['ses_name']) && isset($_SESSION['ses_rollno'])){
	$rollno = $_SESSION['ses_rollno'];
}
	$query = "SELECT * FROM student WHERE rollno='$rollno'";
	if(!($result=mysqli_query($con,$query))){
		echo mysqli_error($con);
    die();
	}
	 if(!mysqli_num_rows($result)){
	 	header('Location:index.php?login=false');
	}
  $row=mysqli_fetch_assoc($result);
	if(!isset($_SESSION['ses_name'])){
			$_SESSION['ses_name']=$row['name'];
	}
	$branch = strtoupper(substr($row['section'],0,strlen($row['section'])-1));
     echo '
     <div class="row">
          <div class="col s12 m12"><br><br></div>
					<div class="col s12 m12">
					<table class="centered">
			<thead>
				<tr>
						<th>Name</th>
						<th>Roll No.</th>
						<th>Section</th>
						<th>Year</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>'.ucwords($row["name"]).'</td>
					<td>'.$row["rollno"].'</td>
					<td>'.strtoupper($row["section"]).'</td>
					<td>'.$row["year"].'</td>
				</tr>
			</tbody>
		</table>
					</div>
     </div>';
		 $sql = "select * from student_theory where student_id = '$row[tid]'";
		 if(!($t=mysqli_query($con,$sql))){
			 echo mysqli_error($con);
			 die();
		 }
		 $sql = "select * from student_practical where student_id = '$row[pid]'";
		 if(!($p=mysqli_query($con,$sql))){
			 echo mysqli_error($con);
			 die();
		 }
		$theory  = mysqli_fetch_assoc($t);
		$practical = mysqli_fetch_assoc($p);
		$i=1;$no_of_theory=0;$no_of_practical=0;
		$subject=array();
		$faculty=array();
		$practical_sub=array();
		$practical_fac_1=array();
		$practical_fac_2=array();
			while($i<=7){
				 $code="f".$i;	//faculty f1 f2 f3....
				 if($theory[$code]!=3){ //if fac not null
					 $fac_sql = "select * from faculty where id = '$theory[$code]'"; //get faculty details
					 if(!($fa=mysqli_query($con,$fac_sql))){
						 echo mysqli_error($con);
						 die();
					 }
					$fac  = mysqli_fetch_assoc($fa);
						$no_of_theory++;
						$th="t".$i;
						array_push($subject,$theory[$th]);
						array_push($faculty,$fac);
						$modal_no_theory=$no_of_theory-1;

            $ques = "select * from theory_questions where part='a'";//Fetch Part A Questions
            if(!($qu=mysqli_query($con,$ques))){
              echo mysqli_error($con);
              die();
            }
            $ques2 = "select * from theory_questions where part='b'";//Fetch Part B Questions
            if(!($qu2=mysqli_query($con,$ques2))){
              echo mysqli_error($con);
              die();
            }

						echo '
						<div id="modal'.$modal_no_theory.'" class="modal modal-fixed-footer">
							<div class="modal-content">

                <div class="row">

                  <div class="col s6 m6">
									<div class="col s12 m12">
										Name:<div class="right">'.ucwords($row["name"]).'</div>
									</div>
									<div class="col s12 m12">
										Department:<div class="right">'.strtoupper($fac["department"]).'</div>
									</div>
									<div class="col s12 m12">
										Name of faculty:<div class="right">'.ucwords($fac["name"]).'</div>
									</div>
									<div class="col s12 m12">
										Subject Code:<div class="right">'.strtoupper($theory[$th]).'</div>
									</div>
									</div>

									<div class="col s6 m6">
									<div class="col s12 m12">
									Subject Name:<div class="right">'.strtoupper($theory[$th]).'</div>
									</div>
									<div class="col s12 m12">
									Branch/Year:<div class="right">'.$branch.'&nbsp;'.$row["year"].'</div>
									</div>
									<div class="col s12 m12">
									Section:<div class="right">'.strtoupper($row["section"]).'</div>
									</div>
									<div class="col s12 m12">
									Date:<div class="right">'.$date.'</div>
									</div>
									</div>

								</div>

		<div class="row">
			<div class="col s12 m12"><h5>Part-A</h5></div>
			<div class="col s12 m12"><blockquote>Please indicate your assessment on a scale of 1 to 5. 5 is the best.</blockquote></div>
		</div>';
   while($disp_ques  = mysqli_fetch_assoc($qu)){
     $disp_question = $disp_ques['question'];
     $qid = $disp_ques['id'];
      echo '
      <div class="row">
      <div class="col s7 m7">'.$qid.' '.$disp_question.'</div>

			<div class="col s1 m1">
				<p>
					<input name="'.$modal_no_theory.'tq'.$qid.'" type="radio" value="1" id="'.$modal_no_theory.$qid.'1"/>
					<label for="'.$modal_no_theory.$qid.'1">1</label>
				</p>
			</div>
			<div class="col s1 m1">
				<p>
        <input name="'.$modal_no_theory.'tq'.$qid.'" type="radio" value="2" id="'.$modal_no_theory.$qid.'2"/>
        <label for="'.$modal_no_theory.$qid.'2">2</label>
				</p>
			</div>
			<div class="col s1 m1">
				<p>
        <input name="'.$modal_no_theory.'tq'.$qid.'" type="radio" value="3" id="'.$modal_no_theory.$qid.'3"/>
        <label for="'.$modal_no_theory.$qid.'3">3</label>
				</p>
			</div>
			<div class="col s1 m1">
				<p>
        <input name="'.$modal_no_theory.'tq'.$qid.'" type="radio" value="4" id="'.$modal_no_theory.$qid.'4"/>
        <label for="'.$modal_no_theory.$qid.'4">4</label>
				</p>
			</div>
			<div class="col s1 m1">
				<p>
        <input name="'.$modal_no_theory.'tq'.$qid.'" type="radio" value="5" id="'.$modal_no_theory.$qid.'5"/>
        <label for="'.$modal_no_theory.$qid.'5">5</label>
				</p>
			</div>
			</div><br>';
    }

    echo '<div class="row">
			<div class="col s12 m12"><h5>Part-B</h5></div>
			<div class="col s12 m12"><blockquote>Please put a tick on your answer.</blockquote></div>
		</div>';
    $number=1;
   while($disp_ques2  = mysqli_fetch_assoc($qu2)){
     $disp_question = $disp_ques2['question'];
     $qid = $disp_ques2['id'];
      echo '
      <div class="row">
      <div class="col s10 m10">'.$number.' '.$disp_question.'</div>

			<div class="col s2 m2">
				<p>
					<input name="'.$modal_no_theory.'tq'.$qid.'" type="checkbox" id="'.$modal_no_theory.$qid.'b">
          <label for="'.$modal_no_theory.$qid.'b"></label>
				</p>
			</div>
			</div><br>';
      $number++;
    }

    echo'
		</div>
							<div class="modal-footer">
								<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
							</div>
						</div>
						';
				 }
				 $i++;
			}
			$i=1;
			while($i<=4){
				 $code="l".$i;	//lab l1 l2 l3....
				 if($practical[$code]!=''){ //if lab not null
					 $fac_1_code = "f".$i.'1';
					 $fac_2_code = "f".$i.'2';
					 $fac_1_sql = "select * from faculty where id = '$practical[$fac_1_code]'"; //get faculty 1 details
					 if(!($fa_1=mysqli_query($con,$fac_1_sql))){
						 echo mysqli_error($con);
						 die();
					 }
					$fac_1 = mysqli_fetch_assoc($fa_1);
						$l="l".$i;
						array_push($practical_sub,$practical[$l]);
						array_push($practical_fac_1,$fac_1);
						$fac_2_sql = "select * from faculty where id = '$practical[$fac_2_code]'"; //get faculty 2 details
 					 if(!($fa_2=mysqli_query($con,$fac_2_sql))){
 						 echo mysqli_error($con);
 						 die();
 					 }
 					$fac_2 = mysqli_fetch_assoc($fa_2);
 						$l="l".$i;
 						array_push($practical_fac_2,$fac_2);
					$no_of_practical++;
				}
				 $i++;
			}
			echo'
			<div class="row">
	<div class="col s6 m6">
  <div class="collection">
    <a href="#!" class="collection-item"><span class="badge">'.$no_of_theory.'</span>Theory Subjects</a>
  </div>
	</div>
	</div>
	<div class="row">';
	$j=0;
	foreach ($subject as $key => $value) {
		echo'<div class="col s2 m2"><a class="waves-effect waves-light btn red lighten-1" href="#modal'.$j.'">'.$value.'</a></div>';
		$j++;
	}
	echo '</div>';

	echo'
	<div class="row">
<div class="col s6 m6">
<div class="collection">
<a href="#!" class="collection-item"><span class="badge">'.$no_of_practical.'</span>Practical Subjects</a>
</div>
</div>
</div>
<div class="row">';
foreach ($practical_sub as $key => $value) {
echo'<div class="col s2 m2"><a class="waves-effect waves-light btn red lighten-1">'.$value.'</a></div>';
}
echo '</div>';
?>
			</div>
     </body>
