<table border ="1"> 
    <tr>
        <th>Vak</th>
        <th>Jaar</th>
        <th>Periode</th>
        <th>test</th>
    </tr>
<?php foreach ($xml as $xml_list): ?>

<div id="main">
    <?php
        $course_name = substr($xml_list['course_name'], 0,100);
        $year = substr($xml_list['year'],0,100);
        $period = substr($xml_list['period'],0,100);
        $test = substr($xml_list['test'],0,100);
        $id = substr($xml_list['id'],0,100);


        echo "<tr>";
        echo "<td>". anchor('inschrijven/vak/'.$id,$course_name) ."</td>";
        echo "<td>". $year."</td>";
        echo "<td>". $period."</td>";
        echo "<td>". $test ."</td>";
        echo "</tr>";
        ?>
    </div>

<?php endforeach?>
</table>

    