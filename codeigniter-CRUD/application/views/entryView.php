<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 
<title>SubscribeMe</title>
 
<link href="<?php echo base_url(); ?>style/style.css" rel="stylesheet" type="text/css" />
 
</head>
<body>
    <div class="content">
        <h1><?php echo $title; ?></h1>
        <div class="data">
        <table>
            <tr>
                <td width="30%">ID</td>
                <td><?php echo $entry->id; ?></td>
            </tr>
            <tr>
                <td valign="top">Title</td>
                <td><?php echo $entry->title; ?></td>
            </tr>
            <tr>
                <td valign="top">Content</td>
                <td><?php echo $entry->content; ?></td>
            </tr>
            <tr>
                <td valign="top">Date of posting (dd-mm-yyyy)</td>
                <td><?php echo $entry->date; ?></td>
            </tr>
        </table>
        </div>
        <br />
        <?php echo $link_back; ?>
    </div>
</body>
</html>