<table border ="1"> 
    <tr>
        <th>naam</th>
        <th>vak</th>
        <th>jaar</th>
        <th>periode</th>
        <th>toets</th>
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
        echo "<td>".anchor('inschrijvingen/vak/'.$course_name."/".$year."/".$period,$course_name)."</td>";
        echo "<td>".$year."</td>";
        echo "<td>".$period."</td>";
        echo "<td>".$test."</td>";
        echo "</tr>";
        ?>
    </div>

<?php endforeach?>
</table>