<table border ="1"> 
    <tr>
        <th>Vak</th>
    </tr>
<?php foreach ($courses as $course_list): ?>

<div id="main">
    <?php
        $course_name = substr($course_list['full_name'], 0,100);
        $short_name = substr($course_list['short_name'], 0,100);
        echo "<tr>";
        echo "<td>".anchor('inschrijvingen/vakken'.$short_name,$course_name)."</td>";
        echo "</tr>";   
        ?>
    </div>

<?php endforeach?>
</table>
<div id="main">
<table border="1">
    <tr>
        <th>Jaar</th>
        <th>Periode</th>
    </tr>
    <tr>
        <td>1</td>
        <td><a href="inschrijvingen/periode/1/1">1</a> - <a href="inschrijvingen/periode/1/2">2</a> - <a href="inschrijvingen/periode/1/3">3</a> - <a href="inschrijvingen/periode/1/4">4</a></td>
    </tr>
    <tr>
        <td>2</td>
        <td><a href="inschrijvingen/periode/2/1">1</a> - <a href="inschrijvingen/periode/2/2">2</a> - <a href="inschrijvingen/periode/2/3">3</a> - <a href="inschrijvingen/periode/2/4">4</a></td>
    </tr>
    <tr>
        <td>3</td>
        <td><a href="inschrijvingen/periode/3/1">1</a> - <a href="inschrijvingen/periode/3/2">2</a> - <a href="inschrijvingen/periode/3/3">3</a> - <a href="inschrijvingen/periode/3/4">4</a></td>
    </tr>
    <tr>
        <td>2</td>
        <td><a href="inschrijvingen/periode/4/1">1</a> - <a href="inschrijvingen/periode/4/2">2</a> - <a href="inschrijvingen/periode/4/3">3</a> - <a href="inschrijvingen/periode/4/4">4</a></td>
    </tr>
</table>
</div>
