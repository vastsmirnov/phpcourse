<form method="POST" action="?r=Authenticate/login">
    <div class=""><?php echo $error ?></div>
    <div class="form-group">
        <label>Логин</label>
        <input type="text" name="login" value="" placeholder="Введите логин" class="form-control">
    </div>
    <div class="form-group">
        <label>Пароль</label>
        <input type="password" name="password" value="" placeholder="Введите пароль" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Логин</button>
</form>