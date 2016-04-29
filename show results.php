<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="center">
    <div class="content">



        <?php $par =  parcel($string_parcel);    ?>



        <?php $results = filter_wrapper($par['dice_type'], $par['count'], $par['trigger'], $par['operator'], $par['min_value']); ?>

        <?php foreach ($results as $result): ?>
            <div class="dice-<?php echo $result; ?> dices"></div><br/>
        <?php endforeach; ?>



        <form action="index.php" method="get" role="form">
            <div class="btn_center">
                <input type="submit" value="На главную" class="btn btn-danger">
            </div>
        </form>
    </div>
</div>
</body>
</html>