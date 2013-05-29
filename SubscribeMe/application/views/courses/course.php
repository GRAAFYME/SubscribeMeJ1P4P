<table border ="1"> 
    <tr>
        <th>Vak</th>
        <th>Datum</th>
        <th>Jaar</th>
        <th>Description</th>
    </tr>
<?php foreach ($xml as $xml_list): ?>

<div id="main">
    <?php
        $name = substr($xml_list['name'], 0,100);
        $datee = substr($xml_list['datee'],0,100);
        $year = substr($xml_list['year'],0,100);
        $description = substr($xml_list['description'],0,100);
        $id = substr($xml_list['id'],0,100);


        echo "<tr>";
        echo "<td>". $name."</td>";
        echo "<td>". $datee ."</td>";
        echo "<td>". $year."</td>";
        echo "<td>". $description."</td>";
         echo "</tr>";
        ?>
        <?php echo form_open_multipart('subscribe/signup/'.$id);?>

    </div>

<?php endforeach?>
</table>

<input type="submit" value="Schrijf in" />

    