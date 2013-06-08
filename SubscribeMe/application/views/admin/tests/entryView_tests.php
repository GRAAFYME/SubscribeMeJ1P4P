    <h1><?php echo $title; ?></h1>
    <div class="content">
    <div class="data">
    <table>
        <tr>
            <td width="30%">ID</td>
            <td><?php echo $entry->id; ?></td>
        </tr>
        <tr>
            <td valign="top">Course_name</td>
            <td><?php echo $entry->course_name; ?></td>
        </tr>
        <tr>
            <td valign="top">Year</td>
            <td><?php echo $entry->year; ?></td>
        </tr>
         <tr>
            <td valign="top">Period</td>
            <td><?php echo $entry->period; ?></td>
        </tr>
         <tr>
            <td valign="top">Test</td>
            <td><?php echo $entry->test; ?></td>
        </tr>
    </table>
    </div>
    <br />
    <?php echo $link_back; ?>
</div>
