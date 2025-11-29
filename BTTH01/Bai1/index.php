<?php require "flowers.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Danh sách các loài hoa</title>
        <style>
            body { font-family: Arial; width: 900px; margin: auto; }
            .flower { display: flex; margin-bottom: 20px; }
            .flower img { width: 250px; height: 160px; object-fit: cover; margin-right: 20px; }
        </style>
    </head>
    <body>
    <h1>13 loại hoa đẹp mùa xuân – hè</h1>
    <?php foreach($flowers as $f): ?>
    <div class="flower">
        <img src="images/<?php echo $f['image']; ?>">
        <div>
            <h2><?php echo $f['name']; ?></h2>
            <p><?php echo $f['desc']; ?></p>
        </div>
    </div>
    <?php endforeach; ?>

    </body>
</html>
