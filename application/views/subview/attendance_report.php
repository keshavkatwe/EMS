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
                foreach ($attendance_report[$i] as $attendance) {
                    echo "<td class='text-center'>{$attendance}</td>";
                }
                ?>
            </tr>
            <?php
            $i++;
        }
        $colSpan=3+sizeof($subject_list);
        if(sizeof($report_info)==0){
                echo "<tr><td class='text-center' colspan='{$colSpan}'>No Records found</td></tr>";
            }
        ?> 
            <tr style="display: <?php echo (sizeof($report_info)==0)?"none":""; ?>">
                <th colspan="3" class="text-center">Number of classes taken</th>
                <?php
                    foreach($total_classes_taken as $total){
                       echo "<th class='text-center'>{$total}</th>";
                    }
                ?>
            </tr>    
    </tbody>
</table>
<table class="table table-hover table-bordered" style="width: 50%;">
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
         if(sizeof($subject_list)==0){
                echo "<tr><td class='text-center' colspan='3'>No Subjects found</td></tr>";
            }
        ?>

    </tbody>
</table>

