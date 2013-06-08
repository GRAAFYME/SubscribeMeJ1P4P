<table class="default_table"> 
    <tr>
        <th>Vak</th>
        <th>Jaar</th>
        <th>Periode</th>
        <th>toets</th>
    </tr>
<?php foreach ($courses as $row): ?>


    <?php
        $course_name = substr($row['course_name'], 0,100);
        $year = substr($row['year'],0,100);
        $period = substr($row['period'],0,100);
        $test = substr($row['test'],0,100);
        $id = substr($row['id'],0,100);


        echo "<tr>";
        echo "<td>". anchor('inschrijven/vak/'.$id,$course_name) ."</td>";
        echo "<td>". $year."</td>";
        echo "<td>". $period."</td>";
        echo "<td>". $test ."</td>";
        echo "</tr>";
        ?>


<?php endforeach?>
</table>

    