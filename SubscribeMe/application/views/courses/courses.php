<table border ="1"> 
    <tr>
        <th>Vak</th>
        <th>Datum</th>
        <th>Jaar</th>
    </tr>
<?php foreach ($xml as $xml_list): ?>

<div id="main">
    <?php
        $name = substr($xml_list['name'], 0,100);
        $datee = substr($xml_list['datee'],0,100);
        $year = substr($xml_list['year'],0,100);
        $id = substr($xml_list['id'],0,100);


        echo "<tr>";
        echo "<td>". anchor('inschrijven/vak/'.$id,$name) ."</td>";
        echo "<td>". $datee ."</td>";
        echo "<td>". $year."</td>";
         echo "</tr>";
        ?>
    </div>

<?php endforeach?>
</table>

    