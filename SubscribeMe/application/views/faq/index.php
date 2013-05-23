<?php foreach ($faq as $faq_item): ?>

    <h2><?php echo $faq_item['question'] ?></h2>
    <div id="main">
        <?php 
        	$small = substr($faq_item['answer'], 0, 100);
        	echo $small        	
    	?>
    </div>
    <p><a href="/faq/<?php echo $faq_item['slug'] ?>">Lees meer..</a></p>

<?php endforeach ?>