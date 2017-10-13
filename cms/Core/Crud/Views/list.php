<div class="panel panel-default">
    <div class="panel-heading">
        <p><?=$entityName;?></p>
    </div>
    <div class="<?=$listContainerClass;?>">
        <?php foreach ($data as $row): ?>
            <?php require __DIR__ . '/row.php'; ?>
        <?php endforeach;?>
    </div>
</div>