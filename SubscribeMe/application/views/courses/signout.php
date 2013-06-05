<table border ="1"> 
    <tr>
        <th>Vak</th>
        <th>Jaar</th>
        <th>Periode</th>
        <th>toets</th>
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
        echo "<td>". $course_name."</td>";
        echo "<td>". $year ."</td>";
        echo "<td>". $period."</td>";
        echo "<td>". $test."</td>";
         echo "</tr>";
        ?>
        <?php echo form_open_multipart('subscribe/unroll/'.$this->uri->segment(3));?>

    </div>

<?php endforeach?>
</table>

<?php echo "<input type=\"submit\" value=\"schrijf uit\" onClick=\"return confirm('Weet u zeker dat u zich wilt uitschrijven voor : $course_name, $test')\">"?>