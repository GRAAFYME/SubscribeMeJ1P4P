<div class="content">
    <h1><?php echo $title; ?></h1>
    <p><?php echo $message; ?></p>
    <?php echo validation_errors(); ?>
    <form method="post" action="<?php echo $action; ?>">
    <div class="data">
    <table>
<!--             <tr>
            <td width="30%">ID</td>
            <td><input type="text" name="id" disabled="disable" class="text" value="<?php echo $this->form_validation->id; ?>"/></td>
            <input type="hidden" name="id" value="<?php echo $this->form_validation->id; ?>"/>
        </tr> -->
        <tr>
            <td valign="top"><?php echo "test"; ?><span style="color:red;">*</span></td>
            <td>  <select name="course" select="<?php $entry->$course_name?>" > <?php foreach($course_name as $course):?><option value="<?php echo $course['short_name']?>"><?php echo$course['short_name'] ?></option><?php endforeach ?></select></td>
        </tr>
         <tr>
            <td valign="top"><?php echo $year_fieldname; ?><span style="color:red;">*</span></td>
            <td><input type="text" name="<?php echo $year_fieldname; ?>" class="text" value="<?php echo $this->form_validation->$year_fieldname; ?>"/>
            </td>
        </tr>
        <tr>
            <td valign="top"><?php echo $period_fieldname; ?><span style="color:red;">*</span></td>
            <td><input type="text" name="<?php echo $period_fieldname; ?>" class="text" value="<?php echo $this->form_validation->$period_fieldname; ?>"/>
            </td>
        </tr>
        <tr>
            <td valign="top"><?php echo $test_fieldname; ?><span style="color:red;">*</span></td>
            <td><input type="text" name="<?php echo $test_fieldname; ?>" class="text" value="<?php echo $this->form_validation->$test_fieldname; ?>"/>
            </td>
        </tr>
        <!-- <tr>
            <td valign="top">Date (dd-mm-yyyy)<span style="color:red;">*</span></td>
            <td><input type="text" name="date" onclick="displayDatePicker('date');" class="text" value="<?php echo $this->validation->date; ?>"/>
            <a href="javascript:void(0);" onclick="displayDatePicker('date');"><img src="<?php echo base_url(); ?>style/images/calendar.png" alt="calendar" border="0"></a>
            </td>
        </tr> -->
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