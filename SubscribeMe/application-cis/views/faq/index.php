<h1><?php echo $title ?></h1>
<?php foreach ($faq as $faq_item): ?>
	<hr />	
	    &nbsp;&nbsp;&nbsp;
	    <a href="<?php echo base_url(); ?>faq/<?php echo $faq_item['slug'] ?>"><?php echo substr($faq_item['question'], 0, 100); 
				if(strlen($faq_item['question']) > 100)    {   echo "..";  }   ?></a>
    <hr />
<?php endforeach ?>