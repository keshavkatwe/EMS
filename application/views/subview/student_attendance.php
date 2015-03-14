

<tr>
    <td class="text-center"><?php echo $roll_number ?></td>
    <td class="text-center"><?php echo $reg_number ?></td>
    <td><?php echo ucwords($first_name . ' ' . $last_name) ?></td>
    <td class="col-md-4 text-center">
        <input type="hidden" name="student_id[<?php echo $index_id; ?>]" value="<?php echo $student_id; ?>"
        <div class="form-group">
            <label class="col-md-6">
                <input type="radio" name="attendance[<?php echo $index_id; ?>]" class="flat-red" value="1" checked/>
                Present
            </label>
            <label class="col-md-6">
                <input type="radio" name="attendance[<?php echo $index_id; ?>]" class="flat-red" value="0"/>
                Absent
            </label>
        </div>
    </td>
</tr>