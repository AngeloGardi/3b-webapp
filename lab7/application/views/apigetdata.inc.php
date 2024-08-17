<?php
require_once dirname(__FILE__) . '/../controllers/apigetdata.class.php';
require_once dirname(__FILE__) . '/../models/Model.class.php';
$apiGetDataController = new ApiGetDataController();
$models = $apiGetDataController->getData();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>X3D Model Data</title>
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

        .boxModel {
            border: 3px solid rgba(0, 1, 0, 1.0);
            padding: 5px;
            float: left;
            margin: 5px;
            width: auto;
            height: auto;
        }

        .boxText {
            border: 1px solid rgba(1, 0, 0, 1.0);
            padding: 5px;
            float: left;
            margin: 5px;
            width: 220px;
            height: auto;
        }
    </style>
</head>

<body>
    <h1>models table rows returned from the SQLite database </h1>

    <?php foreach ($models as $model) : ?>
        <div class="boxModel">
            <div class="imgBox">
                <img src="../assets/images/<?php echo $model->getImage(); ?>" alt="<?php echo $model->getTitle(); ?>" width="300" height="300" />
            </div>
            <div class="boxText">
                <h2><?php echo $model->getTitle(); ?></h2>
            </div>
            <div class="boxText">
                <p><?php echo $model->getSubtitle(); ?></p>
            </div>
            <div class="boxText">
                <p><?php echo $model->getDescription(); ?></p>
            </div>
            <div class="boxText">
                <p><?php echo $model->getCreationMethod(); ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</body>

</html>