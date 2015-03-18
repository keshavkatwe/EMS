<tr>
    <td><?php echo $sno;?></td>
    <td><?php echo $subject_code;?></td>
    <td><?php echo $subject_name;?></td>
    <?php $faculty_name = $first_name.' '.$last_name; ?>
    <td><?php echo (trim($faculty_name)!="")?$faculty_name:"NA"; ?></td>
    <td><a class="btn btn-primary btn-sm" href="<?php echo base_url("faculties/edit/".$user_id); ?>"><i class="fa fa-eye"></i> View</a></td>
</tr>