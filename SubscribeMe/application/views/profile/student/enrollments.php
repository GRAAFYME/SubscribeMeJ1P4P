<table class="default_table">
    <tr>
        <th>Vak</th>
        <th>Jaar</th>
        <th>Periode</th>
        <th>test</th>
        <th>uitschrijven</th>
    </tr>
    <?php foreach ($enrollments as $enrollment): ?>
        <?php
            $username = $enrollment['username'];
            $course_name = $enrollment['course_name'];
            $year = $enrollment['year'];
            $period = $enrollment['period'];
            $test = $enrollment['test'];
            $id = $enrollment['id'];


            echo "<tr>";
            echo form_open_multipart('mijn-inschrijvingen/uitschrijven/'.$id);
            echo "<td>". $course_name."</td>";
            echo "<td>". $year."</td>";
            echo "<td>". $period."</td>";
            echo "<td>". $test ."</td>";?>
            <?php echo "<td>"."<input type=\"submit\" value=\"schrijf uit\" onClick=\"return confirm('Weet u zeker dat u zich wilt uitschrijven voor : $course_name, $test')\">"."</td>"?>
            <?php
            echo form_close();
            echo "</tr>";
        ?>
    <?php endforeach?>
</table>