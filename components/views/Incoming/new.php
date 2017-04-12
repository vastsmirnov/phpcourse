<form method="POST" action="?r=incoming/create">
    <div class="form-group">
        <label for="exampleInputEmail1">Заголовок</label>
        <input type="text" name="title" value="" placeholder="Введите заголовок" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Описание</label>
        <input type="text" name="description" value="" placeholder="Введите описание"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleTextarea">Текст</label>
        <textarea class="form-control" id="exampleTextarea" rows="12" name="text" placeholder="Введите текст"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Обновить</button>
</form>