<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->config->item('site_name') ?> | IA Report</title>

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
                        IA Report
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
                                            <a href="#summary_info" onclick="getIAInfo(' . $dept['department_id'] . ');" aria-controls="home" role="tab" data-toggle="tab">' . $dept['department_name'] . '</a>
                                        </li>';
                                    $i++;
                                }
                                ?>
                            </ul>
                            <div class="tab-content">
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Semester</label>
                                        <select name="semester" id="semester" class="form-control" onchange="get_subjects(this.value)">
                                            <option value="">--Choose--</option>
                                            <?php
                                            if ($this->session->role_id == 2) {
                                                foreach ($sems as $sem) {
                                                    echo "<option value='{$sem['semester']}'>{$sem['semester']}</option>";
                                                }
                                            } else {
                                                echo get_semester(set_value('semester', $form_data['semester']));
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <select class="form-control" id="subjects" name="subjects">
                                                <option value="">--Choose--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>IA</label>
                                        <select class="form-control" name="ia_type" id="ia_type">
                                            <option value="0">IA Marks</option>
                                            <option value="1">IA - I</option>
                                            <option value="2">IA - II</option>
                                            <option value="3">IA - III</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Search type</label>
                                        <select class="form-control" name="search_type" id="search_type">
                                            <option value="1">Roll Number</option>
                                            <option value="2">Name</option>
                                            <option value="3">Reg Number</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label>Keyword</label>
                                        <input type="text" name="keyword" id="keyword" placeholder="Keyword" class="form-control"/>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-primary" style="margin-top: 25px" onclick="fetchReports();"><i class="fa fa-search"></i> Get Report</button>
                                    </div>
                                </div>
                                <br>
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

            var deptartment_id = <?php echo $departments[0]['department_id']; ?>;

            $(function () {
                $('#DeptTab a:first').tab('show')
            })

            $(document).ready(function () {
                getIAInfo(deptartment_id);
            });


            function getIAInfo(dept_id) {
                deptartment_id = dept_id;
                $("#semester").val("1");
                $("#search_type").val("1");
                $("#keyword").val("");
                var data = {
                    dept_id: dept_id,
                    semester: $("#semester").val()
                };
                $("#attendance_info").html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-2x"></i></div>');
                $.post(base_url("report/getIAReport"), data, function (result) {
                    $("#attendance_info").html(result);
                });
            }


            function fetchReports() {
                var data = {
                    dept_id: deptartment_id,
                    semester: $("#semester").val(),
                    search_type: $("#search_type").val(),
                    ia_type: $("#ia_type").val(),
                    keyword: $("#keyword").val(),
                    subject_id: $("#subjects").val()
                };
                $("#attendance_info").html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-2x"></i></div>');
                $.post(base_url("report/getIAReport"), data, function (result) {
                    $("#attendance_info").html(result);
                });
            }
            
            function get_subjects(sem)
            {
                var role = '<?php echo $this->session->role_id; ?>';

                $('#students').html("");
                $.post(base_url("attendance/report_subjects_ajax"),
                        {
                            sem: sem,
                            dept_id: deptartment_id
                        },
                function (data)
                {
                    var reply_array = JSON.parse(data);

                    if (reply_array['success'] == true)
                    {
                        var subjects = reply_array['data'];

                        
                        if (role == 1) {
                            var subjects_data = '<option value="">All</option>';
                        }
                        else {
                            var subjects_data = null;
                        }

                        if (subjects.length) {

                            for (i = 0; i < subjects.length; i++) {
                                subjects_data += '<option value="' + subjects[i]['subject_id'] + '">' + subjects[i]['subject_name'] + '</option>';
                            }

                            $('#subjects').html(subjects_data);


                        }
                        else
                        {
                            $('#subjects').html('<option value="">--No subjects--</option>');
                        }

                    }
                    else
                    {
                        show_error();
                    }

                });
            }
        </script>
    </body>


</html>