<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->config->item('site_name') ?> | IA marks</title>

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
                        Attendance
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="row">
                                <form id="form_get_students">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Semester</label>
                                            <select id="sem" name="sem" class="form-control" onchange="get_subjects(this.value)">
                                                <option value="">--Choose--</option>
                                                <?php
                                                foreach ($sems as $sem) {
                                                    echo "<option value='{$sem['semester']}'>{$sem['semester']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <select class="form-control" id="subjects" name="subjects" onchange="clear_students();">
                                                <option value="">--Choose--</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" class="form-control" id="date" name="date"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button class="btn btn-danger" style="margin-top: 25px;"><i class="fa fa-user"></i> Get students</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <h4 id="content_heading" style="display: none"><strong id="subject_name"></strong> Attendance of <strong id="selected_sem"></strong> semester</h4>
                        </div>
                        <form id="attendance_form" name="attendance_form" method="POST" action="<?php echo base_url('attendance/save_attendance'); ?>">

                            <input type="hidden" id="subject_id_hidden" name="subject_id_hidden">
                            <input type="hidden" id="date_hidden" name="date_hidden">

                            <div class="box-body" id="content_body" style="display: none">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Roll no</th>
                                            <th class="text-center">Reg no</th>
                                            <th>Student name</th>
                                            <th class="text-center col-md-4">Attendance</th>
                                        </tr>
                                    </thead>
                                    <tbody id="students"></tbody>
                                </table>
                                <div>
                                    <br>
                                    <button type="submit" id="save_attendance" onclick="save_records()" name="save_attendance" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
                                    <div class="clearfix"></div>
                                </div>

                            </div><!-- /.box-body -->
                        </form>
                    </div><!-- /.box -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php $this->load->view('includes/bottom_menu') ?>
        </div><!-- ./wrapper -->

        <?php $this->load->view('includes/js_footer') ?>



        <script>

            function clear_students() {
                $('#content_heading').html("");
                $('#students').html("");
                document.getElementById("save_attendance").style.display = "none";
            }


            function get_subjects(sem)
            {
                $('#content_heading').html("");
                $('#students').html("");
                document.getElementById("save_attendance").style.display = "none";

                $.post(base_url("ia/subjects_ajax"),
                        {
                            sem: sem
                        },
                function (data)
                {
                    var reply_array = JSON.parse(data);

                    if (reply_array['success'] == true)
                    {
                        var subjects = reply_array['data'];

                        var subjects_data = '';

                        if (subjects.length) {
                            for (i = 0; i < subjects.length; i++) {
                                subjects_data += '<option value="' + subjects[i]['subject_id'] + '">' + subjects[i]['subject_name'] + '</option>';
                            }

                            $('#subjects').html(subjects_data);

                        }
                        else
                        {
                            $('#subjects').html('<option value="">--No subjects--<option>');
                        }

                    }
                    else
                    {
                        show_error();
                    }

                });
            }


            // validate signup form on keyup and submit
            $("#form_get_students").validate({
                rules: {
                    subjects: "required",
                    sem: "required",
                    date: "required"
                },
                submitHandler: function () {

                    var sem = $('#sem').val();
                    var subject_id = $('#subjects').val();
                    var date = $('#date').val();
                    
                    $('#subject_id_hidden').val(subject_id);
                    $('#date_hidden').val(date);

                    $('#subject_name').html($('#subjects :selected').text());
                    $('#selected_sem').html(sem);
                    $('#content_body').show();
                    $('#content_heading').show();

                    $.post(base_url("attendance/students_ajax"),
                            {
                                sem: sem,
                                subject_id: subject_id
                            },
                    function (data)
                    {

                        var reply_array = JSON.parse(data);
                        if (reply_array['success'] == true)
                        {
                            $('#students').html(reply_array['data']);
                        }
                        else
                        {
                            show_error();
                        }

                        if (reply_array['count'] > 0) {
                            document.getElementById("save_attendance").style.display = "";
                        }
                        else {
                            document.getElementById("save_attendance").style.display = "none";
                        }

                    });
                }
            });



            function save_records() {


                var sem = $('#sem').val();
                var subject_id = $('#subjects').val();
                var subject_id = $('#subjects').val();

                var attendance = $('input[name=attendance]').val();

                var data = {
                    sem: sem,
                    subject_id: subject_id,
                    date: date,
                    attendance: attendance

                };

                console.log(data);


            }


        </script>

    </body>


</html>