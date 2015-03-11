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
                        IA marks
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Semester</label>
                                        <select id="sem" class="form-control" onchange="get_subjects(this.value)">
                                            <option value="">--Choose--</option>
                                            <?php
                                            foreach ($sems as $sem) {
                                                echo "<option value='{$sem['semester']}'>{$sem['semester']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <select class="form-control" id="subjects">
                                            <option value="">--Choose--</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button class="btn btn-danger" style="margin-top: 25px;" onclick="get_students()"><i class="fa fa-user"></i> Get students</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="box-body">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">Roll no</th>
                                        <th class="text-center">Reg no</th>
                                        <th>Student name</th>
                                        <th class="text-center">IA - 1</th>
                                        <th class="text-center">IA - 2</th>
                                        <th class="text-center">IA - 3</th>
                                    </tr>
                                </thead>
                                <tbody id="students"></tbody>
                            </table>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php $this->load->view('includes/bottom_menu') ?>
        </div><!-- ./wrapper -->

        <?php $this->load->view('includes/js_footer') ?>



        <script>
            function get_subjects(sem)
            {
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


                        for (i = 0; i < subjects.length; i++) {
                            subjects_data += '<option value="' + subjects[i]['subject_id'] + '">' + subjects[i]['subject_name'] + '</option>';
                        }

                        $('#subjects').html(subjects_data);

                    }
                    else
                    {
                        show_error();
                    }

                });
            }


            function get_students()
            {
                var sem = $('#sem').val();

                $.post(base_url("ia/students_ajax"),
                        {
                            sem: sem
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

                });
            }


            function ia_update(user_id, ia)
            {
                var sem = $('#sem').val();
                var subject = $('#subjects').val();

                var marks = $('#ia_marks_' + user_id + '_' + ia).val();

                
            }

        </script>

    </body>


</html>