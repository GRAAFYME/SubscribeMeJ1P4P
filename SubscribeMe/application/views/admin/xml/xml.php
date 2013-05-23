<!-- just a test view for xml will be deleted after we completly understand xml parsing-->
<?php foreach ($xml as $xml_list): ?>

    
    <div id="main">
        <?php 
        	$name = substr($xml_list['name'], 0, 100);
        	$description = substr($xml_list['description'],0,100);
            $datee = substr($xml_list['datee'],0,100);
        	echo $name; 
        	echo $description;
            echo $datee;

        	
    	?>
    </div>

<?php endforeach ?>

	