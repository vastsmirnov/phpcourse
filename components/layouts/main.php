
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC</title>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">MVC</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Документы<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="?r=incoming/index">Входящие</a></li>
                        <li><a href="?r=output/index">Исходящие</a></li>
                        <li><a href="?r=overhead/index">Накладные</a></li>
                    </ul>
                </li>
                <li><a href="?r=administrator/index">Администрирование</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php $user=\core\WebUser::currentUser(); ?>
                <?php if ($user):?>
                    <li><a href="#"><?php echo $user->attributes['login'];?></a></li>
                    <li><a href="?r=Authenticate/logout">Выход</a></li>
                <?php else:?>
                    <li><a href="?r=Authenticate/login">Вход</a></li>
                <?php endif; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php echo $view_content;?>
        </div>
    </div>

</div>

<script>
    'use strict';
    $(document).ready(
        function () {
            $(".remove-item").click(
                function () {
                    if (confirm("Уверены что хотите удалить?")) {
                        var h = this.href;
                        var param = {fake_method: "DELETE"};
//                        $.post(h, param, function (data) {});
                        $.ajax({
                            type: "POST",
                            url: h,
                            data: param,
                        });
                    }
                    location.reload();
                    return false;

                }
            );
        }
    );
</script>

</body>
</html>
