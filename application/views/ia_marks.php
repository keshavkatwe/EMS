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
                            <h4 id="content_heading" ng-show="students.length"><strong id="subject_name">{{subject_info.subject_name}}</strong> IA marks of <strong id="selected_sem">{{subject_info.semester}}</strong> semester</h4>
                        </div>
                        <div class="box-body" id="content_body" ng-show="students.length">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 6%;">Roll no</th>
                                        <th class="text-center" style="width: 9%;">Reg no</th>
                                        <th>Student name</th>
                                        <th class="text-center" style="width: 10%;">IA - 1</th>
                                        <th class="text-center" style="width: 10%;">IA - 2</th>
                                        <th class="text-center" style="width: 10%;"><span ng-show="subject_info.subject_type == 1">IA - 3</span><span ng-show="subject_info.subject_type != 1">Record marks</span></th>
                                        <th class="text-center" style="width: 10%;">Average</th>
                                        <th class="text-center" style="width: 10%;">Attendance</th>
                                        <th class="text-center" style="width: 10%;">Attendance marks</th>
                                        <th class="text-center" style="width: 10%;">Total marks</th>
                                    </tr>
                                </thead>
                                <tbody id="students">
                                    <tr ng-repeat="student in students">

                                        <td class="text-center">{{ student.roll_number}}</td>
                                        <td class="text-center">{{ student.reg_number}}</td>
                                        <td>{{ student.first_name + ' ' + student.last_name}}</td>
                                        <td>
                                            <input class="form-control numericOnly" type="text" ng-model="student.ia_1" ng-blur="updateMarks(student, subject_info)" />
                                        </td>
                                        <td>
                                            <input class="form-control numericOnly" type="text" ng-model="student.ia_2" ng-blur="updateMarks(student, subject_info)" />
                                        </td>
                                        <td>
                                            <input class="form-control numericOnly" type="text" ng-model="student.ia_3" ng-blur="updateMarks(student, subject_info)" />
                                        </td>
                                        <td class="text-center">
                                            {{(student.average = (subject_info | average_marks:student.ia_1:student.ia_2:student.ia_3)|round)}}
                                        </td>
                                        <td class="text-center">{{ (student.attendance = (student.present / student.number_taken) * 100) | percentage}}</td>
                                        <td class="text-center">{{ student.attendance_marks = (student.attendance | ia_attendance_marks)}}</td>
                                        <td class="text-center">{{ (student.attendance_marks * 1 + student.average * 1)|round}}</td>
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








        <script>


            var app = angular.module('AMS', []);
            app.controller('myCtrl', function ($scope, $http) {
                $scope.getStudents = function (marks_data) {
                    var req = {
                        method: 'POST',
                        url: base_url("ia/students_ajax"),
                        headers: {'Content-Type': 'application/json'},
                        data: JSON.stringify(marks_data)
                    };

                    if (marks_data.sem != "" && marks_data.subject_id)
                    {
                        $http(req)
                                .success(function (response) {
                                    $scope.students = response.data;
                                    $scope.subject_info = response.subject_info;
                                });
                    }
                };

                $scope.updateMarks = function (student_info, subject_info) {

                    var max_marks;
                    if (subject_info.subject_type == 1)
                    {
                        max_marks = 20;
                    }
                    else
                    {
                        max_marks = 10;
                    }

                    if (!isNumber(student_info.ia_1) || Number(student_info.ia_1) < 0 || Number(student_info.ia_1) > max_marks)
                    {
                        show_error('Invalid marks');
                        student_info.ia_1 = 0;
                    }
                    else if (!isNumber(student_info.ia_2) || Number(student_info.ia_2) < 0 || Number(student_info.ia_2) > max_marks)
                    {
                        show_error('Invalid marks');
                        student_info.ia_2 = 0;
                    }
                    else if (!isNumber(student_info.ia_3) || Number(student_info.ia_3) < 0 || Number(student_info.ia_3) > max_marks)
                    {
                        show_error('Invalid marks');
                        student_info.ia_3 = 0;
                    }
                    else
                    {
                        $http({
                            method: 'POST',
                            url: base_url("ia/marks_update"),
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                            data: JSON.stringify(student_info)
                        })
                                .success(function (response) {
                                    show_success('Marks updated successfully');
                                });
                    }
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

                                if (response.data.length) {
                                    $scope.subjects = response.data;
                                }
                                else
                                {
                                    $scope.subjects = [{
                                            subject_id: "",
                                            subject_name: "--No subjects--"
                                        }];
                                }
                                $scope.marks.subject_id = $scope.subjects[0].subject_id;
                            });

                };

            });

            app.filter('percentage', ['$filter', function ($filter) {
                    return function (input) {
                        return $filter('number')(Math.round(input)) + '%';
                    };
                }]);


            app.filter('average_marks', ['$filter', function ($filter) {
                    return function (subject_info, ia_1, ia_2, ia_3) {
                        var average_markss;
                        if (subject_info.subject_type == 1)
                        {
                            ia_1 = (ia_1 === "") ? 0 : ia_1;
                            ia_2 = (ia_2 === "") ? 0 : ia_2;
                            ia_3 = (ia_3 === "") ? 0 : ia_3;

                            var marks = [ia_1, ia_2, ia_3];

                            marks.sort(function (a, b) {
                                return b - a;
                            });

                            average_markss = (Number(marks[0]) + Number(marks[1])) / 2;
                        }
                        else
                        {
                            average_markss = (Math.max(Number(ia_1), Number(ia_2))) + Number(ia_3);
                        }
                        return $filter('number')(average_markss);
                    };
                }]);

            app.filter('round', function () {
                return function (input) {
                    return Math.round(input);
                };
            });
            
            app.filter('ia_attendance_marks', ['$filter', function ($filter) {
                    return function (input, decimals) {

                        var attendance_marks = 0;
                        if (input >= 95)
                            attendance_marks = 5;
                        else if (input >= 85 && input < 95)
                            attendance_marks = 4;
                        else if (input >= 75 && input < 85)
                            attendance_marks = 3;
                        else if (input >= 60 && input < 75)
                            attendance_marks = 2;
                        else if (input < 60)
                            attendance_marks = 0;

                        return $filter('number')(attendance_marks);
                    };
                }]);

            function isNumber(n) {
                return !isNaN(parseFloat(n)) && isFinite(n);
            }

        </script>
    </body>


</html>