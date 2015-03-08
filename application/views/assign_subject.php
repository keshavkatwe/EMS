<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->config->item('site_name') ?> | Assign Subject</title>

        <?php $this->load->view('includes/css_header') ?>
    </head>

    <body class="<?php echo THEME_COLOR; ?>">
        <!-- Site wrapper -->
        <div class="wrapper">
            <?php $this->load->view('includes/top_menu') ?>
            <?php $this->load->view('includes/left_menu') ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Assign Subject
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box box-default" style="min-height: 600px">
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Department:</label>
                                        <select name="department" id="department" class="form-control">
                                            <option value="">--Choose--</option>
                                            <?php echo get_departments(set_value('department')); ?>
                                        </select>
                                        <i class="text-danger" id="department_error"></i>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Semester:</label>
                                        <select name="semester" id="semester" class="form-control">
                                            <option value="">--Choose--</option>
                                            <?php echo get_semester(set_value('semester')); ?>
                                        </select>
                                        <i class="text-danger" id="semester_error"></i>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <button style="margin-top: 25px;" onclick="load_subjects();" type="submit" class="btn btn-danger"><i class="fa fa-info"> </i> &nbsp;Get Information</button>
                                    </div>
                                </div>
                            </div>

                            <br/>

                            <div id="result">

                            </div>


                        </div><!-- /.box-body -->
                    </div>
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php $this->load->view('includes/bottom_menu') ?>
        </div><!-- ./wrapper -->

        <?php $this->load->view('includes/js_footer') ?>

        <script type="text/javascript">
            function load_subjects() {
                var department = document.getElementById('department').value.trim();
                var semester = document.getElementById('semester').value.trim();

                var flag1 = true;
                var flag2 = true;
                
                if (semester == "") {
                    $("#semester_error").html("Please choose semester");
                    flag1 = false;
                }
                else {
                    $("#semester_error").html("");
                    flag1 = true;
                }

                if (department == "") {
                    $("#department_error").html("Please choose department");
                    flag2 = false;
                }
                else {
                    $("#department_error").html("");
                    flag2 = true;
                }

                if (flag1 && flag2) {
                    $.post(base_url("Assign_faculty/load_information"), {dept: department, sem: semester}, function (data) {
                        $("#result").html(data);
                    });
                }


            }
        </script>
    </body>


</html>