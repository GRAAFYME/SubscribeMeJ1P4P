<table class="default_table"> 
    <tr>
        <th>Vak</th>
        <th>Jaar</th>
        <th>Periode</th>
        <th>toets</th>
    </tr>
<?php foreach ($xml as $xml_list): ?>

    <?php
        $course_name = $xml_list['course_name'];
        $year = $xml_list['year'];
        $period = $xml_list['period'];
        $test = $xml_list['test'];
        $id = $xml_list['id'];

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
<br />
<center>
    <input type="submit" value="Schrijf in" class="button" />
</center>    