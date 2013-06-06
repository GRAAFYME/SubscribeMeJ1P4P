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
            <td valign="top"><?php echo $title_fieldname; ?><span style="color:red;">*</span></td>
            <td><input type="text" name="<?php echo $title_fieldname; ?>" class="text" value="<?php echo $this->form_validation->$title_fieldname; ?>"/>
            </td>
        </tr>
        <tr>
            <td valign="top"><?php echo $content_fieldname; ?><span style="color:red;">*</span></td>
            <td><textarea id="<?php echo $content_fieldname; ?>" name="<?php echo $content_fieldname; ?>" wrap = "hard" rows ="10" cols="70" value="<?php echo $this->form_validation->$content_fieldname; ?>" ><?php echo $this->form_validation->$content_fieldname; ?></textarea>
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