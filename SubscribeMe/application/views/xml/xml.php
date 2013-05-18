<!-- just a test view for xml will be deleted after we completly understand xml parsing-->
<?php foreach ($xml as $product): ?>

    
    <div id="main">
        <?php 
        	echo"<p>";
            echo"<strong>".$product->name."</strong><br />";
            echo "£".$product->price."</p>";  
        ?>
    </div>

<?php endforeach ?>

	