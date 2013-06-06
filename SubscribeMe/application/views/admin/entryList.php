<div class="content">
    <h1><?php echo $title ?></h1>
    <div class="paging"><?php echo $pagination; ?></div>
    <div class="data"><?php echo $table; ?></div>
    <br />
    <?php
    if($show_add_button == TRUE) {
    	echo anchor($add_data,'add new data',array('class'=>'add')); 
    } ?>
</div>