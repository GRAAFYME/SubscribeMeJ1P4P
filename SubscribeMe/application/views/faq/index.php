<?php foreach ($faq as $faq_item): ?>

    <h3><a href="/faq/<?php echo $faq_item['slug'] ?>"><?php echo substr($faq_item['question'], 0, 50);
    if(strlen($faq_item['question']) > 50)
    	{
    		echo "..";
    	}
    	?>
    </a></h3>

<?php endforeach ?>