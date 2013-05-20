<!-- just a test view for xml will be deleted after we completly understand xml parsing-->
<?php foreach ($xml as $xml_list): ?>

    
    <div id="main">
        <?php 
        	$name = substr($xml_list['name'], 0, 100);
        	$price = substr($xml_list['price'],0,100);
        	echo $name; 
        	echo $price;

        	
    	?>
    </div>

<?php endforeach ?>

	