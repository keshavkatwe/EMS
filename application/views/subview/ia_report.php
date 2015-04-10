<?php
if (sizeof($report_info) != 0) {
    ?>
    <button type="button" onclick="print()" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</button>

    <?php
}
?> 
<div class="clearfix"></div>
<div id="doc_print">  
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Roll no</th>
                    <th>Student Name</th>
                    <th>Reg Number</th>
                    <?php foreach ($subject_list as $sub) { ?>
                        <th width="10%" class="text-center"><?php echo $sub['subject_code']; ?></th>
                    <?php } ?>

                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($report_info as $info) {
                    ?>

                    <tr>
                        <td class='text-center'><?php echo $info['roll_number']; ?></td>
                        <td><?php echo $info['first_name'] . ' ' . $info['last_name']; ?></td>
                        <td class='text-center'><?php echo $info['reg_number']; ?></td>
                        <?php
//                        variable_dump($tooltip_details);
//                        foreach ($ia_report[$i] as $marks) {
//                            echo "<td class='text-center'><a title=''>{$marks}</a></td>";
//                        }

                        for ($j = 0; $j < sizeof($ia_report[$i]); $j++) {
                            $row = $ia_report[$i];
                            $tooltip = $tooltip_details[$i];

                            $tip = isset($tooltip[$j]) ? $tooltip[$j] : "";
                            echo "<td class='text-center'><a href='#' style='color:#000;text-decoration:none;' data-toggle='tooltip' data-placement='top' title='" . $tip . "'>{$row[$j]}</a></td>";
                        }
                        ?>
                    </tr>
                    <?php
                    $i++;
                }
                $colSpan = 3 + sizeof($subject_list);
                if (sizeof($report_info) == 0) {
                    echo "<tr><td class='text-center' colspan='{$colSpan}'>No Records found</td></tr>";
                }
                ?> 
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Sno</th>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($subject_list as $sub) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $sub['subject_code']; ?></td>
                            <td><?php echo $sub['subject_name']; ?></td>
                        </tr>
                        <?php
                        $i++;
                    }
                    if (sizeof($subject_list) == 0) {
                        echo "<tr><td class='text-center' colspan='3'>No Subjects found</td></tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
        <div class="col-md-3 col-lg-offset-3">

            <table class="table table-hover table-bordered pull-right">
                <thead>
                    <tr>
                        <th colspan="2" class="text-center">IA - Theory</th>
                    </tr>
                    <tr>
                        <td>Internal Marks</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>Attendance Marks</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>Total Marks</td>
                        <td>25</td>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

            <table class="table table-hover table-bordered pull-right">
                <thead>
                    <tr>
                        <th colspan="2" class="text-center">IA - Practical</th>
                    </tr>
                    <tr>
                        <td>Internal Marks</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Record Marks</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Attendance Marks</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>Total Marks</td>
                        <td>25</td>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
    </div>

    <div class="clearfix"></div>
</div>


<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>