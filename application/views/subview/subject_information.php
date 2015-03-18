<legend>Subject details of <b><?php echo $dept; ?></b> department at semester <b><?php echo $sem; ?></b></legend>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Si No.</th>
            <th>Subject code</th>
            <th>Subject name</th>
            <th>Faculty Incharge</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=1;
        foreach ($subject_info as $sub) {
            echo "<tr>
                    <td>{$i}</td>
                    <td>{$sub['subject_code']}</td>
                    <td>{$sub['subject_name']}</td>
                    <td>";
            ?>
    <select class="form-control"  onchange="assign_faculty(<?php echo "{$sub['subject_id']}"; ?>, this.value);">
        <option>--Choose--</option>
        <?php
            foreach($faculty_info as $faculty){
                $fullname = $faculty['first_name'].' '.$faculty['last_name'];
                echo "<option value='{$faculty['faculty_id']}'";
                echo ($faculty['faculty_id'] == $sub['faculty_id']) ? " selected ":"";
                echo ">{$fullname}</option>";
            }
        ?>
        
    </select>
        <?php
        echo "</td>
                </tr>";
        $i++;
    }
    ?>

</tbody>
</table>

