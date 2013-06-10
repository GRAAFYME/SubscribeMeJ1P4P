<?php
    echo '<h1>'.$home_item['title'].'</h1>';
    echo 'Welkom ' .$username .'!';
    echo '<p>'.$home_item['text'].'</p>';
?>

<div id="latestnews">
	<h2> Laatste nieuws:</h2>
    <?php foreach ($news as $news_item): ?>
        <hr />        
            <h3>
                &nbsp;&nbsp;<?php echo substr($news_item['title'], 0, 25); 
                    if(strlen($news_item['title']) > 25)    {   echo "..";  }   ?>
            </h3>

                &nbsp;&nbsp;&nbsp;<?php echo substr($news_item['text'], 0, 75);      
                    if(strlen($news_item['text']) > 75)    {   echo "..";  }   ?>
                    
            <p>
                &nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>nieuws/<?php echo $news_item['slug'] ?>">Lees meer..</a>
            </p>
        <hr />
    <?php endforeach ?>
</div>