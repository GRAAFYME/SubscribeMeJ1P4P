<table class="default_table"> 
    <tr>
        <th>Vak</th>
        <th>Jaar</th>
        <th>Periode</th>
        <th>toets</th>
    </tr>
<?php foreach ($xml as $xml_list): ?>

    <?php
        $course_name = substr($xml_list['course_name'], 0,100);
        $year = substr($xml_list['year'],0,100);
        $period = substr($xml_list['period'],0,100);
        $test = substr($xml_list['test'],0,100);
        $id = substr($xml_list['id'],0,100);


        echo "<tr>";
        echo "<td>". $course_name."</td>";
        echo "<td>". $year ."</td>";
        echo "<td>". $period."</td>";
        echo "<td>". $test."</td>";
         echo "</tr>";
        ?>
        <?php echo form_open_multipart('subscribe/signup/'.$id);?>
<?php endforeach?>
</table>
<input type="submit" value="Schrijf in" />
    