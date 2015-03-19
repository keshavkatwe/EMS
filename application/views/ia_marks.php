<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->config->item('site_name') ?> | IA marks</title>

        <?php $this->load->view('includes/css_header') ?>
    </head>

    <body class="<?php echo THEME_COLOR; ?>" ng-app="AMS">
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
                <section class="content" ng-controller="myCtrl">

                    <!-- Default box -->
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="row">
                                <form id="form_get_students">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Semester</label>
                                            <select id="sem" name="sem" ng-model="marks.sem" class="form-control" ng-change="get_subjects(marks.sem)">
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
                                            <select class="form-control" ng-model="marks.subject_id"  id="subjects" name="subjects">
                                                <option ng-repeat="subject in subjects" ng-if="true" value="{{subject.subject_id}}">{{subject.subject_name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button class="btn btn-danger" style="margin-top: 25px;" ng-click="getStudents(marks)"><i class="fa fa-user"></i> Get students</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <h4 id="content_heading"><strong id="subject_name"></strong> IA marks of <strong id="selected_sem"></strong> semester</h4>
                        </div>
                        <div class="box-body" id="content_body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 6%;">Roll no</th>
                                        <th class="text-center" style="width: 9%;">Reg no</th>
                                        <th>Student name</th>
                                        <th class="text-center" style="width: 10%;">IA - 1</th>
                                        <th class="text-center" style="width: 10%;">IA - 2</th>
                                        <th class="text-center" style="width: 10%;">IA - 3</th>
                                        <th class="text-center" style="width: 10%;">Average</th>
                                        <th class="text-center" style="width: 10%;">Attendance</th>
                                    </tr>
                                </thead>
                                <tbody id="students">
                                    <tr ng-repeat="student in students">

                                        <td class="text-center">{{ student.roll_number}}</td>
                                        <td class="text-center">{{ student.reg_number}}</td>
                                        <td>{{ student.first_name + ' ' + student.last_name}}</td>
                                        <td>
                                            <input class="form-control" type="text" ng-model="student.ia_1" ng-blur="updateMarks(student)"/>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" ng-model="student.ia_2" ng-blur="updateMarks(student)"/>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" ng-model="student.ia_3" ng-blur="updateMarks(student)"/>
                                        </td>
                                        <td ng-init="updateMarks(student)" class="text-center">
                                            {{student.average}}
                                        </td>
                                        <td class="text-center">{{student.present}}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->



                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php $this->load->view('includes/bottom_menu') ?>
        </div><!-- ./wrapper -->

        <?php $this->load->view('includes/js_footer') ?>




        <script src="<?php echo base_url('bower_components/angular/angular.min.js') ?>"></script>



        <script>
            var app = angular.module('AMS', []);
            app.controller('myCtrl', function ($scope, $http) {
                
//                $scope.subjects = [
//                    {"make": "Nissan", "model": "Sentra"},
//                    {"make": "Honda", "model": "Prelude"},
//                    {"make": "Toyota", "model": "Prius"}
//                ]
                
                $scope.getStudents = function (marks_data) {
                    var req = {
                        method: 'POST',
                        url: base_url("ia/students_ajax"),
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify(marks_data)
                    };
                    $http(req)
                    .success(function (response) {
                        $scope.students = response.data;
                
                    });
                };

                $scope.updateMarks = function (student_info) {

                    var ia_1 = student_info.ia_1;
                    var ia_2 = student_info.ia_2;
                    var ia_3 = student_info.ia_3;

                    var average_marks = get_average(ia_1, ia_2, ia_3);

                    $http({
                        method: 'POST',
                        url: base_url("ia/marks_update"),
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                        data: JSON.stringify(student_info)
                    })
                    .success(function (response) {
                        show_success('Marks updated successfully');
                    });

                    student_info.average = average_marks;
                };
                
                
                $scope.get_subjects = function (sem) {
                    
                    var req = {
                        method: 'POST',
                        url: base_url("ia/subjects_ajax"),
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify(sem)
                    };
                    $http(req)
                    .success(function (response) {
                        console.log(response.data);
                        $scope.subjects = response.data;
                        
                        $scope.marks.subject_id = response.data[0].subject_id;
                        
                    });
                    
                };

            });



            function get_average(ia_1, ia_2, ia_3)
            {
                ia_1 = (ia_1 === "") ? 0 : ia_1;
                ia_2 = (ia_2 === "") ? 0 : ia_2;
                ia_3 = (ia_3 === "") ? 0 : ia_3;

                var marks = [ia_1, ia_2, ia_3];

                marks.sort(function (a, b) {
                    return b - a;
                });

                var average_marks = (Number(marks[0]) + Number(marks[1])) / 2;
                
                
                return average_marks;
            }

        </script>


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

                        var subjects_data;

                        if (subjects.length)
                        {
                            subjects_data = '<option value="">--Choose subject--<option>';
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


                ia_1 = (ia_1 == "") ? 0 : ia_1;
                ia_2 = (ia_2 == "") ? 0 : ia_2;
                ia_3 = (ia_3 == "") ? 0 : ia_3;

                var marks = [ia_1, ia_2, ia_3];

                marks.sort(function (a, b) {
                    return b - a
                });

                var average_marks = (Number(marks[0]) + Number(marks[1])) / 2;

                $('#average_' + user_id).html(average_marks);
            }


            // validate signup form on keyup and submit
            $("#form_get_studentsss").validate({
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





    </body>


</html>