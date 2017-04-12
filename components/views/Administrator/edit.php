<form method="POST" action="?r=administrator/<?php echo $model['id'];?>">
    <div class="form-group">
        <label for="exampleInputEmail1">Login</label>
        <input type="text" name="login" value="<?php echo $model['login'];?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Password</label>
        <input type="text" name="password" value="<?php echo $model['password'];?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Group</label>
        <select name="group_id" class="form-control">
            <option selected value="<?php echo $group['id'];?>"><?php echo $group['name'];?></option>
            <?php foreach ($groups as $item):?>
                <?php if($item['id']!=$group['id']):?>
                <option  value="<?php echo $item['id'];?>"><?php echo $item['name'];?></option>
                <?php endif; ?>
            <?php endforeach;?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Обновить</button>
</form>