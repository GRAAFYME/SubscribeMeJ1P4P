<table border ="1"> 
    <tr>
        <th>Vak</th>
        <th>Jaar</th>
        <th>Periode</th>
        <th>test</th>
        <th>uitschrijven</th>
    </tr>
<?php foreach ($enrollments as $enrollment): ?>

<div id="main">
    <?php
        $username = substr($enrollment['username'], 0,100);
        $course_name = substr($enrollment['course_name'], 0,100);
        $year = substr($enrollment['year'],0,100);
        $period = substr($enrollment['period'],0,100);
        $test = substr($enrollment['test'],0,100);
        $id = substr($enrollment['id'],0,100);


        echo "<tr>";
        echo form_open_multipart('my_enrollment/unroll/'.$id);
        echo "<td>". $course_name."</td>";
        echo "<td>". $year."</td>";
        echo "<td>". $period."</td>";
        echo "<td>". $test ."</td>";?>
        <?php echo "<td>"."<input type=\"submit\" value=\"schrijf uit\" onClick=\"return confirm('Weet u zeker dat u zich wilt uitschrijven voor : $course_name, $test')\">"."</td>"?>
        <?php
        echo form_close();
        echo "</tr>";
        ?>
        
        
    </div>

<?php endforeach?>
</table>
<a href='to_excell'><span style='color:green;'>Export All Data</span></a>