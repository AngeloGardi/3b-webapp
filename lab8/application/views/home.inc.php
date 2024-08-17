<?php
require_once dirname(__FILE__) . '/../controllers/home.class.php';
require_once dirname(__FILE__) . '/../models/Model.class.php';
$homeController = new HomeController();
$data = $homeController->getData();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Simple View</title>

        <style>
            h1 {
                color: red;
                margin-left: 5px;
            }

            h2 {
                color: blue;
                margin: 5px;
            }

            p {
                color: green;
                margin-left: 5px;
            }

            .imgBox {
                padding: 0.25rem;
                margin-top: 5px;
                margin-bottom: 5px;
                border: 1px solid #dee2e6;
                border-radius: 0.25rem;
                width: 300px;
            }

            .box {
                border: 1px solid rgba(0, 0, 0, 1.0);
                padding: 5px;
                float: left;
                margin: 5px;
                height: 400px;
            }
        </style>
    </head>

    <body>
        <h1>3D App Test View </h1>
        <p>If you are seeing the test Model 3D Image Data below, then your basic MVC framework is working </p>
        <?php foreach ($data as $item): ?>
            <div class="box">
                <h2><?php echo $item->getTitle(); ?></h2>
                <img class="imgBox" src='../assets/images/<?php echo $item->getImage(); ?>' />
            </div>
        <?php endforeach; ?>
    </body>
</html>