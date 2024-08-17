<?php 
require_once dirname(__FILE__). '/../controllers/apiloadimage.class.php';
$apiLoadImage = new ApiLoadImage();
$products = $apiLoadImage->getProducts();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Drinks Image View</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/drink_images.js"></script>
</head>

<body>
    <h1>Choose a drink brand to see more details</h1>
    <b>Select a drinks brand name: </b>
    <form>
        <select id="select">
            <option value="-">-</option>
            <?php foreach($products as $product): ?>
            <option value="<?php echo $product->getId(); ?>"><?php echo $product->getName(); ?></option>
            <?php endforeach; ?>
        </select>
    </form>
    <div id="placeholder"></div>
</body>

</html>