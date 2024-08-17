<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Flickr API test</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <h1>Flickr API</h1>
        <h2>Search on Flickr Feed</h2>
        <div class="textInput">
            <input type="text" value="Coke Can" id="query" />
        </div>

        <div class="btn">
            <button>Search</button>
        </div>

        <div id="images-container"></div>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/flickr_api.js"></script>
    </body>
</html>