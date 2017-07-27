<?php
include_once 'header.php';
?>
<script>
    $(document).ready(function() {

        $("#department").change(function () {
            var department = $("#department").val();
            $.ajax({
                url: "getfac.php",
                data: {dpt: department},
                success: function (json) {

                    $.each(json, function (i, obj) {
                        $('#faculty').append($('<option>', {
                            value: obj.id,
                            text : obj.name
                        }));

                    });
                    $('select').material_select();
                }

            });
        });

        $("#faculty").change(function () {

            var fac = $("#faculty").val();
            $.ajax({
                url: "getsub.php",
                data: {fac: fac},
                success: function (json) {

                    $.each(json, function (i, obj) {
                        $('#subject').append($('<option>', {
                            value: obj.subject,
                            text : obj.subject
                        }));

                    });
                    $('select').material_select();
                }

            });
        });


        $("#subject").change(function () {

            var sub = $("#subject").val();
            var fac = $("#faculty").val();
            $.ajax({
                url: "getsec.php",
                data: {fac: fac, sub: sub},
                success: function (json) {

                    $.each(json, function (i, obj) {
                        $('#section').append($('<option>', {
                            value: obj.section,
                            text : obj.section
                        }));

                    });
                    $('select').material_select();
                }

            });
        });



    });
</script>
<body>
<div id="OK">

</div>
    <nav class="teal lighten-3">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo center">Feedback Report (Bargraph)</a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
					<li><a href="logout.php" class="right"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
				</ul>
      </div>
    </nav>
    <br><br>
    <div class="container">
        <div class="container">
            <div class="container">
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <?php
                                $qry1="SELECT DISTINCT department FROM faculty";
                                $result1=mysqli_query($con, $qry1);
                                ?>
                                <select id="department">
                                    <option value="" disabled selected>Select Branch</option>
                                    <?php
                                    while ($department=mysqli_fetch_assoc($result1))
                                    {
                                        ?>
                                        <option><?php echo $department['department']; ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class='input-field col s12'>
                                <select id="faculty">
                                    <option value="" disabled selected>Select Faculty</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <select id="subject">
                                    <option value="" disabled selected>Select Subject</option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <select id="section">
                                    <option value="" disabled selected>Select Section</option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 center">
                                <a class="waves-effect waves-light btn red">button</a>
                            </div>
                        </div>



                </div>
</body>
