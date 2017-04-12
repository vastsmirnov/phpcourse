<form method="POST" action="?r=incoming/<?php echo $model['id'];?>">
    <div class="form-group">
        <label for="exampleInputEmail1">Заголовок</label>
        <input type="text" name="title" value="<?php echo $model['title'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Описание</label>
        <input type="text" name="description" value="<?php echo $model['description'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleTextarea">Текст</label>
        <textarea class="form-control" id="exampleTextarea" rows="12" name="text"><?php echo $model['text']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Обновить</button>
</form>