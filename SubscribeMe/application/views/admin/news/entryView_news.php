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
            <td><?php echo $entry->text; ?></td>
        </tr>
        <tr>
            <td valign="top">Date of posting</td>
            <td><?php echo $entry->date; ?></td>
        </tr>
    </table>
    </div>
    <br />
    <?php echo $link_back; ?>
</div>