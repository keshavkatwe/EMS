<tr>
    <td class="text-center"><?php echo $roll_number ?></td>
    <td class="text-center"><?php echo $reg_number ?></td>
    <td><?php echo ucwords($first_name . ' ' . $last_name) ?></td>
    <td><input id="ia_marks_<?php echo $user_id ?>_1" class="form-control" type="text" value="<?php echo $ia_1 ?>" onchange="ia_update(<?php echo $user_id ?>, 1)"/></td>
    <td><input id="ia_marks_<?php echo $user_id ?>_2" class="form-control" type="text" value="<?php echo $ia_2 ?>" onchange="ia_update(<?php echo $user_id ?>, 2)"/></td>
    <td><input id="ia_marks_<?php echo $user_id ?>_3" class="form-control" type="text" value="<?php echo $ia_3 ?>" onchange="ia_update(<?php echo $user_id ?>, 3)"/></td>
    <td class="text-center"><span id="average_<?php echo $user_id; ?>">

            <?php
            $ia_1 = ($ia_1 == "") ? 0 : $ia_1;
            $ia_2 = ($ia_2 == "") ? 0 : $ia_2;
            $ia_3 = ($ia_3 == "") ? 0 : $ia_3;

            $marks = array($ia_1, $ia_2, $ia_3);
            rsort($marks);

            $average_marks = ($marks[0] + $marks[1]) / 2;

            echo $average_marks;
            ?>
        </span></td>
</tr>