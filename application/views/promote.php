<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $this->config->item('site_name') ?> | Promote</title>

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
                        Promote students
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content" ng-controller="myCtrl">

                    <!-- Default box -->
                    <div class="box">
                        <form method="post" action="">
                            
                            
                            
                            <div class="box-header with-border">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select class="form-control" ng-model="class_info.department_id" ng-init="class_info.department_id = ''">
                                                <option value="" selected>--Choose--</option>
                                                <?php echo get_departments(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Semester</label>
                                            <select class="form-control" ng-model="class_info.semester" ng-init="class_info.semester = ''">
                                                <option value="" selected>--Choose--</option>
                                                <?php echo get_semester() ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <br/>
                                        <button class="btn btn-danger" style="margin-top: 4px;" ng-click="getStudents(class_info)" type="button"><i class="fa fa-user"></i> Get students</button>
                                    </div>
                                </div>

                            </div>
                            
                            <input type="hidden" name="semester_selected" value="{{class_info.semester}}"/>
                            
                            <div class="box-body" ng-show="students.length">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 8%;">Roll no</th>
                                            <th class="text-center" style="width: 10%;">Reg. no</th>
                                            <th>Name</th>
                                            <th ng-show="semester_show === '2' || semester_show === '4'" class="text-center" style="width: 13%;">Promote to sem {{class_info.semester * 1 + 1}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="student in students">
                                            <td class="text-center">{{student.roll_number}}</td>
                                            <td class="text-center">{{student.reg_number}}</td>
                                            <td>{{student.first_name + ' ' + student.last_name}}</td>
                                            <td class="text-center" ng-show="semester_show === '2' || semester_show === '4'">
                                                <label class="radio-inline">
                                                    <input type="radio" name="student_promote[{{$index}}]" value="yes" ng-checked="true" /> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="student_promote[{{$index}}]" value="no" /> No
                                                </label>
                                                <input type="hidden" name="student_id[{{$index}}]" value="{{student.student_id}}"/>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div><!-- /.box-body -->
                            <div class="box-footer text-right" ng-show="students.length && semester_show !== '6'">
                                <button class="btn btn-danger" type="submit">Promote</button>
                            </div><!-- /.box-footer-->


                        </form>
                    </div><!-- /.box -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php $this->load->view('includes/bottom_menu') ?>
        </div><!-- ./wrapper -->

        <?php $this->load->view('includes/js_footer') ?>
    </body>

    <script>
        var app = angular.module('AMS', []);
        app.controller('myCtrl', function ($scope, $http) {
            
            
            
            $scope.getStudents = function (class_info) {
                
                $scope.semester_show = class_info.semester;
                
                var req = {
                    method: 'POST',
                    url: base_url("promote/get_students"),
                    headers: {'Content-Type': 'application/json'},
                    data: JSON.stringify(class_info)
                };

                console.log(class_info);

                if (class_info.department_id !== "" && class_info.semester !== "")
                {
                    $http(req)
                            .success(function (response) {

                                //console.log(response);
                                $scope.students = response;
//                                $scope.subject_info = response.subject_info;
                            });
                }
            };



        });


    </script>

</html>