<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=studenten_uitdraai.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border ="1"> 
    <tr>
        <th>username</th>
        <th>course_name</th>
        <th>year</th>
        <th>period</th>
        <th>test</th>
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