<div class="crud">
    <h1><?php echo $title; ?></h1>
    <p><?php echo $message; ?></p>
    <?php echo validation_errors(); ?>
    <form method="post" action="<?php echo $action; ?>">
        <div class="data">
            <table>
                <tr>
                    <td valign="top"><?php echo ucfirst($title_fieldname).":"; ?><span style="color:red;">*</span></td>
                    <td><input type="text" name="<?php echo $title_fieldname; ?>" class="text" value="<?php echo $this->form_validation->$title_fieldname; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td valign="top"><?php echo ucfirst($content_fieldname).":"; ?><span style="color:red;">*</span></td>
                    <td><textarea id="<?php echo $content_fieldname; ?>" name="<?php echo $content_fieldname; ?>" wrap = "hard" rows ="10" cols="70" value="<?php echo $this->form_validation->$content_fieldname; ?>" ><?php echo $this->form_validation->$content_fieldname; ?></textarea>
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