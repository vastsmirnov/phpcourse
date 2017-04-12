
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Входящая корреспонденция</div>
    <div class="panel-body">
        <div><a href="?r=incoming/new_item" class="btn btn-default btn-xs">Создать</a></div>
    </div>

    <!-- Table -->
    <table class="table">
        <thead>
        <tr>
            <td>№</td>
            <td>Заголовок</td>
            <td>Описание</td>
            <td>Дата создания</td>
            <td>Управлние</td>
        </tr>
        </thead>
        <tbody>
        <?php $number =0; ?>
        <?php foreach ($model as $item):?>
            <tr>
                <td><?php echo ++$number; ?></td>
                <td><?php echo $item['title']?></td>
                <td><?php echo $item['description']?></td>
                <td><?php echo $item['create_date']?></td>
                <td><div class="col-xs-4"><a href="?r=incoming/<?php echo $item['id']?>" class="btn btn-default btn-xs">Просмотреть</a></div>
                    <div class="col-xs-4"><a href="?r=incoming/edit/<?php echo $item['id'] ?>" class="btn btn-default btn-xs">Обновить</a></div>
                    <div class="col-xs-4">
                        <a href="?r=incoming/<?php echo $item['id']; ?>"  class="btn btn-default btn-xs remove-item">Удалить</a>
                    </div>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
