<?php
    echo '<h2>'.$subscribe_item['title'].'</h2>';
    echo '<p>'.$subscribe_item['text'].'</p>';
?>

<table class="default_table"> 
    <tr>
        <th>Vak</th>
        <th>Jaar</th>
        <th>Periode</th>
        <th>toets</th>
    </tr>
    <?php foreach ($courses as $row): ?>
        <?php
            $course_name = $row['course_name'];
            $year = $row['year'];
            $period = $row['period'];
            $test = $row['test'];
            $id = $row['id'];

            echo "<tr>";
            echo "<td>". anchor('inschrijven/vak/'.$id,$course_name) ."</td>";
            echo "<td>". $year."</td>";
            echo "<td>". $period."</td>";
            echo "<td>". $test ."</td>";
            echo "</tr>";
        ?>
    <?php endforeach?>
</table>