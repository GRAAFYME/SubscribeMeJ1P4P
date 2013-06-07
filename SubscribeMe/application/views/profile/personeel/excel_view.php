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

<div id="main">
    <?php
        $username = substr($row['username'], 0,100);
        $course_name = substr($row['course_name'], 0,100);
        $year = substr($row['year'], 0,100);
        $period = substr($row['period'], 0,100);
        $test = substr($row['test'], 0,100);

        echo "<tr>";
        echo "<td>".$username."</td>";
        echo "<td>".$course_name."</td>";
        echo "<td>".$year."</td>";
        echo "<td>".$period."</td>";
        echo "<td>".$test."</td>";
        echo "</tr>";
        ?>
    </div>

<?php endforeach?>
</table>