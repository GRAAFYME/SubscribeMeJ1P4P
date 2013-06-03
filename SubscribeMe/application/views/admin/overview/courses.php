<table border ="1"> 
    <tr>
        <th>Vak</th>
    </tr>
<?php foreach ($courses as $course_list): ?>

<div id="main">
    <?php
        $course_name = substr($course_list['full_name'], 0,100);
        $id = substr($course_list['id'],0,100);
        echo "<tr>";
        echo "<td>".anchor('vakken/vakoverzicht/'.$id,$course_name)."</td>";
        echo "</tr>";
        ?>
    </div>

<?php endforeach?>
</table>
