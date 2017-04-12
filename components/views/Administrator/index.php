
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">Users</div>

    <!-- Table -->
    <table class="table">
        <thead>
        <tr>
            <td>№</td>
            <td>Login</td>
            <td>Password</td>
            <td>Group</td>
            <td>Управлние</td>
        </tr>
        </thead>
        <tbody>
        <?php $number =0; ?>
        <?php foreach ($model as $item):?>
            <tr>
                <td><?php echo ++$number; ?></td>
                <td><?php echo $item['login']?></td>
                <td><?php echo $item['password']?></td>
                <td><?php
                        foreach ($groups as $group){
                            if ($item['group_id']==$group['id']){
                                echo $group['name'];
                                break;
                            }
                        }
                    ?></td>
                <td><div class="">
                        <a href="?r=administrator/<?php echo $item['id']; ?>" class="btn btn-default btn-xs">V</a>
                        <a href="?r=administrator/edit/<?php echo $item['id']; ?>" class="btn btn-default btn-xs">U</a>
                        <a href="#"  class="btn btn-default btn-xs remove-item">D</a>
                    </div>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>