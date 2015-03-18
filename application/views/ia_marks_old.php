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
                                <form id="form_get_students">
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <select class="form-control" id="subjects" name="subjects">
                                                <option value="">--Choose--</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button class="btn btn-danger" style="margin-top: 25px;"><i class="fa fa-user"></i> Get students</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <h4 id="content_heading" style="display: none"><strong id="subject_name"></strong> IA marks of <strong id="selected_sem"></strong> semester</h4>
                        </div>
                        <div class="box-body" id="content_body" style="display: none">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">Roll no</th>
                                        <th class="text-center">Reg no</th>
                                        <th>Student name</th>
                                        <th class="text-center">IA - 1</th>
                                        <th class="text-center">IA - 2</th>
                                        <th class="text-center">IA - 3</th>
                                        <th class="text-center">Average</th>
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

                        if (subjects.length)
                        {
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




            function ia_update(user_id, ia)
            {
                var sem = $('#sem').val();
                var subject_id = $('#subjects').val();

                var marks = $('#ia_marks_' + user_id + '_' + ia).val();



                $.post(base_url("ia/marks_update"),
                        {
                            student_user_id: user_id,
                            sem: sem,
                            subject_id: subject_id,
                            marks: marks,
                            ia_number: ia
                        },
                function (data)
                {

                    var reply_array = JSON.parse(data);

                    if (reply_array['success'] == true)
                    {
                        show_success('Marks updated successfully');
                        calculate_average(user_id);
                    }
                    else
                    {
                        show_error();
                    }

                });
            }

            
            function calculate_average(user_id)
            {
                var ia_1 = $('#ia_marks_' + user_id + '_1').val();
                var ia_2 = $('#ia_marks_' + user_id + '_2').val();
                var ia_3 = $('#ia_marks_' + user_id + '_3').val();
                
                
                ia_1 = (ia_1 == "")?0:ia_1;
                ia_2 = (ia_2 == "")?0:ia_2;
                ia_3 = (ia_3 == "")?0:ia_3;
                
                var marks = [ia_1,ia_2,ia_3];
                
                marks.sort(function(a, b){return b-a});
                
                var average_marks = (Number(marks[0]) + Number(marks[1]))/2;
                
                $('#average_'+user_id).html(average_marks);
            }
            

            // validate signup form on keyup and submit
            $("#form_get_students").validate({
                rules: {
                    subjects: "required",
                    sem: "required",
                },
                submitHandler: function () {

                    var sem = $('#sem').val();
                    var subject_id = $('#subjects').val();
                    
                    $('#subject_name').html($('#subjects :selected').text());
                    $('#selected_sem').html(sem);
                    $('#content_body').show();
                    $('#content_heading').show();

                    $.post(base_url("ia/students_ajax"),
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

                    });
                }
            });


            
            
        </script>

        <script src="<?php echo base_url('bower_components/angular/angular.min.js') ?>"></script>
        
        
        
        
        
        
        
    </body>


</html>