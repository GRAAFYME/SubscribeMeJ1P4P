<table class="default_table"> 
    <tr>
        <th>Vak</th>
    </tr>
    <?php foreach ($courses as $course_list): ?>
        <?php
            $course_name = $course_list['full_name'];
            $short_name = $course_list['short_name'];
            echo "<tr>";
            echo "<td>".anchor(base_url() .'inschrijvingen/vakken/'.$short_name,$course_name)."</td>";
            echo "</tr>";   
        ?>
    <?php endforeach?>
</table>
<br /><br /><br /><br />
<table class="default_table"> 
    <tr>
        <th>Jaar</th>
        <th>Periode</th>
    </tr>
    <tr>
        <td>1</td>
        <td><a href="<?php echo base_url(); ?>inschrijvingen/periode/1/1">1</a> - <a href="<?php echo base_url(); ?>inschrijvingen/periode/1/2">2</a> - <a href="<?php echo base_url(); ?>inschrijvingen/periode/1/3">3</a> - <a href="<?php echo base_url(); ?>inschrijvingen/periode/1/4">4</a></td>
    </tr>
    <tr>
        <td>2</td>
        <td><a href="<?php echo base_url(); ?>inschrijvingen/periode/2/1">1</a> - <a href="<?php echo base_url(); ?>inschrijvingen/periode/2/2">2</a> - <a href="<?php echo base_url(); ?>inschrijvingen/periode/2/3">3</a> - <a href="<?php echo base_url(); ?>inschrijvingen/periode/2/4">4</a></td>
    </tr>
    <tr>
        <td>3</td>
        <td><a href="<?php echo base_url(); ?>inschrijvingen/periode/3/1">1</a> - <a href="<?php echo base_url(); ?>inschrijvingen/periode/3/2">2</a> - <a href="<?php echo base_url(); ?>inschrijvingen/periode/3/3">3</a> - <a href="<?php echo base_url(); ?>inschrijvingen/periode/3/4">4</a></td>
    </tr>
    <tr>
        <td>2</td>
        <td><a href="<?php echo base_url(); ?>inschrijvingen/periode/4/1">1</a> - <a href="<?php echo base_url(); ?>inschrijvingen/periode/4/2">2</a> - <a href="<?php echo base_url(); ?>inschrijvingen/periode/4/3">3</a> - <a href="<?php echo base_url(); ?>inschrijvingen/periode/4/4">4</a></td>
    </tr>
</table>