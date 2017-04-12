<?php setlocale(LC_TIME,"ru_RU");?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo  $model['title']." от ".date('d.m.Y, H:i',strtotime($model['create_date'])); ?></div>
    <div class="panel-body">
        <?php echo $model['text'];?>
    </div>
</div>
