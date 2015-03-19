<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->config->item('site_name') ?> | Attendance Report</title>

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
                        Attendance Report
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="box">

                        <div class="box-body">
                            <ul class="nav nav-tabs" role="tablist" id="DeptTab">
                                <?php
                                $i = 0;
                                foreach ($departments as $dept) {
                                    echo '<li role="presentation">
                                            <a href="#summary_info" onclick="getDeptInfo(' . $dept['department_id'] . ');" aria-controls="home" role="tab" data-toggle="tab">' . $dept['department_name'] . '</a>
                                        </li>';
                                    $i++;
                                }
                                ?>
                            </ul>
                            <div class="tab-content">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Semester</label>
                                        <select class="form_control">
                                            <option>ss</option>
                                            <option>ss</option>
                                            <option>ss</option>
                                        </select>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane active" id="attendance_info">

                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            
                        </div><!-- /.box-footer-->
                    </div><!-- /.box -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php $this->load->view('includes/bottom_menu') ?>
        </div><!-- ./wrapper -->

        <?php $this->load->view('includes/js_footer') ?>
        <script>
            $(function () {
                $('#DeptTab a:first').tab('show')
            })

            $(document).ready(function () {
               // getAttendanceInfo(<?php echo $departments[0]['department_id']; ?>)
            });


            function getAttendanceInfo(dept_id) {
                $("#attendance_info").html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-2x"></i></div>');
                $.post(base_url("Attendance/getDeptReport"), {dept_id: dept_id}, function (data) {
                    $("#attendance_info").html(data);
                });
            }
        </script>
    </body>


</html>