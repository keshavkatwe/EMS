<tr>
    <td class="text-center"><?php echo $roll_number ?></td>
    <td class="text-center"><?php echo $reg_number ?></td>
    <td><?php echo ucwords($first_name.' '.$last_name) ?></td>
    <td><input id="ia_marks_<?php echo $user_id ?>_1" class="form-control" type="text" value="" onchange="ia_update(<?php echo $user_id ?>, 1)"/></td>
    <td><input id="ia_marks_<?php echo $user_id ?>_2" class="form-control" type="text" value="" onchange="ia_update(<?php echo $user_id ?>, 2)"/></td>
    <td><input id="ia_marks_<?php echo $user_id ?>_3" class="form-control" type="text" value="" onchange="ia_update(<?php echo $user_id ?>, 3)"/></td>
</tr>