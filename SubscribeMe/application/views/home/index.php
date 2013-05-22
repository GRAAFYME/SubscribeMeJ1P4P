<div id="home">
	<?php
	echo '<h2>'.$home_item['title'].'</h2>';
	echo $home_item['text'];
	?>
</div>
<div id="latestnews">
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
</div>
<!-- This should be loaded from DB -->
<div id="links">
<p><b>Handige links</b></p>
<ul>
	<li><a href="http://www.nhl.nl" target="_blank">NHL</a></li>
	<li><a href="http://www.mijnnhl.nl" target="_blank">Mijn NHL</li>
	<li><a href="http://elo.nhl.nl" target="_blank">Blackboard</a></li>
	<li><a href="http://educator.nhl.nl" target="_blank">Educator</a></li>
	<li>Mail
		<ul>
			<li><a href="https://exchange.nhl.nl/owa/" target="_blank">Medewerkers Mail</a></li>
			<li><a href="http://mail.student.nhl.nl/" target="_blank">Studenten Mail</a></li>
		</ul>
	</li>
</ul>
</div>