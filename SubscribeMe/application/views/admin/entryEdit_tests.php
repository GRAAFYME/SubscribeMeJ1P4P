<div class="crud">
    <h1><?php echo $title; ?></h1>
    <p><?php echo $message; ?></p>
    <?php echo validation_errors(); ?>
    <form method="post" action="<?php echo $action; ?>">
        <div class="data">
            <table>
                <tr>
                    <td valign="top"><?php echo ucfirst($course_fieldname).":"; ?><span style="color:red;">*</span></td>
                    <td><select name="<?php echo $course_fieldname; ?>">
                            <?php foreach($course_name as $course):?>
                                <option value="<?php echo $course['short_name']?>" <?php if($entry->course_name == $course['short_name']) { echo 'selected="selected"'; } ?>><?php echo $course['short_name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                 <tr>
                    <td valign="top"><?php echo ucfirst($year_fieldname).":"; ?><span style="color:red;">*</span></td>
                    <td>
                        <select name="<?php echo $year_fieldname; ?>">
                            <option value="1" <?php if($entry->year == 1) { echo 'selected="selected"'; } ?>>1</option>
                            <option value="2" <?php if($entry->year == 2) { echo 'selected="selected"'; } ?>>2</option>
                            <option value="3" <?php if($entry->year == 3) { echo 'selected="selected"'; } ?>>3</option>
                            <option value="4" <?php if($entry->year == 4) { echo 'selected="selected"'; } ?>>4</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="top"><?php echo ucfirst($period_fieldname).":"; ?><span style="color:red;">*</span></td>
                    <td>
                        <select name="<?php echo $period_fieldname; ?>">
                            <option value="1" <?php if($entry->period == 1) { echo 'selected="selected"'; } ?>>1</option>
                            <option value="2" <?php if($entry->period == 2) { echo 'selected="selected"'; } ?>>2</option>
                            <option value="3" <?php if($entry->period == 3) { echo 'selected="selected"'; } ?>>3</option>
                            <option value="4" <?php if($entry->period == 4) { echo 'selected="selected"'; } ?>>4</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td valign="top"><?php echo ucfirst($test_fieldname).":"; ?><span style="color:red;">*</span></td>
                    <td><input type="text" name="<?php echo $test_fieldname; ?>" class="text" value="<?php echo $this->form_validation->$test_fieldname; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" value="Save"/></td>
                </tr>
            </table>
        </div>
    </form>
    <br />
    <?php echo $link_back; ?>
</div>