<?php require_once dirname(__FILE__) . '/../views/views.inc.php'; ?>
<h1>Available Routes</h1>
<ol>
    <?php foreach ($views as $key => $value) : ?>
        <li><a href="../index.php/<?php echo $key; ?>"><?php echo $key; ?></a></li>
    <?php endforeach; ?>
</ol>