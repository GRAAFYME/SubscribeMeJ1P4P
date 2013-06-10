<h1><?php echo $title ?></h1>
<?php foreach ($news as $news_item): ?>
	<hr />
	    <h2>
	    	&nbsp;&nbsp;<?php echo substr($news_item['title'], 0, 40); 
				if(strlen($news_item['title']) > 40)    {   echo "..";  }   ?>
		</h2>


	    	&nbsp;&nbsp;&nbsp;<?php echo substr($news_item['text'], 0, 100);      
	            if(strlen($news_item['text']) > 100)    {   echo "..";  }   ?>
	            
	    <p>
	    	&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>nieuws/<?php echo $news_item['slug'] ?>">Lees meer..</a>
	    </p>
    <hr />
<?php endforeach ?>