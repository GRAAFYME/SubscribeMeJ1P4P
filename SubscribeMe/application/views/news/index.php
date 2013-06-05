<?php foreach ($news as $news_item): ?>

    <h2><?php echo substr($news_item['title'], 0, 50); 
    if(strlen($news_item['title']) > 50)
    	{
    		echo "..";
    	}
    	?>
    </h2>
    <div id="main">
        <?php echo substr($news_item['text'], 0, 100);     	
	    if(strlen($news_item['text']) > 100)
    	{
    		echo "..";
    	}
    	?>
    </div>
    <p><a href="/nieuws/<?php echo $news_item['slug'] ?>">Bekijk nieuwsbericht</a></p>

<?php endforeach ?>