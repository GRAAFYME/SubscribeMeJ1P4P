<?php foreach ($news as $news_item): ?>

    <h2><?php echo $news_item['title'] ?></h2>
    <div id="main">
        <?php 
        	$small = substr($news_item['text'], 0, 100);
        	echo $small        	
    	?>
    </div>
    <p><a href="/news/<?php echo $news_item['slug'] ?>">Bekijk nieuwsbericht</a></p>

<?php endforeach ?>
