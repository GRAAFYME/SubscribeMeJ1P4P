<div class="content">
    <h1><?php echo $title; ?></h1>
    <div class="data">
    <table>
        <tr>
            <td width="30%">ID</td>
            <td><?php echo $entry->id; ?></td>
        </tr>
        <tr>
            <td valign="top">Question</td>
            <td><?php echo $entry->question; ?></td>
        </tr>
        <tr>
            <td valign="top">Answer</td>
            <td><?php echo $entry->answer; ?></td>
        </tr>
    </table>
    </div>
    <br />
    <?php echo $link_back; ?>
</div>