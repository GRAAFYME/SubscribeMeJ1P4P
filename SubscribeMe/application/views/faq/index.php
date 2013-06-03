<?php foreach ($faq as $faq_item): ?>

    <h3><a href="/faq/<?php echo $faq_item['slug'] ?>"><?php echo $faq_item['question'] ?></a></h3>

<?php endforeach ?>