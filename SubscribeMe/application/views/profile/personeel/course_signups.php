<table class="default_table"> 
    <tr>
        <th>naam</th>
        <th>vak</th>
        <th>jaar</th>
        <th>periode</th>
        <th>toets</th>
    </tr>
    <?php foreach ($signups as $row): ?>
        <?php
            $username = $row['username'];
            $course_name = $row['course_name'];
            $year = $row['year'];
            $period = $row['period'];
            $test = $row['test'];

            echo "<tr>";
            echo "<td>".$username."</td>";
            echo "<td>".$course_name."</td>";
            echo "<td>".$year."</td>";
            echo "<td>".$period."</td>";
            echo "<td>".$test."</td>";
            echo "</tr>";
        ?>
    <?php endforeach?>
</table>
<br /><br />
<a href='<?php echo base_url(); ?>vakken/excel_export/<?php echo $course_name?>/<?php echo $year?>/<?php echo $period?>'><span style='color:green;'>Exporteer de data naar Excell</span></a>