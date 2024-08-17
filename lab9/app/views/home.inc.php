<?php 
require_once dirname(__FILE__) . '/../controllers/CardStrings.class.php';
require_once dirname(__FILE__) . '/../controllers/SliderStrings.class.php';
require_once dirname(__FILE__) . '/../controllers/ContactInfoStrings.class.php';
$cardStrings = new CardStrings();
$cardStrings = $cardStrings->getCardStrings();
$SliderStrings = new SliderStrings();
$SliderStrings = $SliderStrings->getSliderStrings();
$contactInfoStrings = new ContactInfoStrings();
$contactInfoStrings = $contactInfoStrings->getContactInfoStrings();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!--Font Awesome-->
        <script src="js/dbfd48137d.js"></script>
        <!--X3DOM CSS-->
        <link rel="stylesheet" href="css/x3dom.css" />
        <!--Fancybox CSS-->
        <link rel="stylesheet" href="css/jquery.fancybox.min.css" />
        <!--Stylesheet-->
        <link rel="stylesheet" href="css/style.css" />

        <title>Mobile 3D App Lab 9</title>
    </head>
    <body>
        <!--Logo and navigation bar-->
        <nav class="navbar sticky-top navbar-expand-sm navbar_coca_cola">
            <!--Brand-->
            <div class="logo">
                <a class="navbar-brand" href="#">
                    <h1>1oca</h1>
                    <h2>Cola</h2>
                    <h3>Journey</h3>
                    <p>Refreshing the world, one story at a time</p>
                </a>
            </div>

            <!--callapsible navbar menu icon-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Link Menu item button to the links class navbar-collapse selector -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Links -->
                <ul class="navbar-nav ml-auto">
                    <!--use mx-auto to align centre, default to left or use mr-auto -->
                    <li class="nav-item">
                        <a class="nav-link active" data-page="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="#"
                            data-toggle="popover"
                            data-trigger="hover"
                            data-placement="bottom"
                            title="About Web 3D Applications"
                            data-content="3D Apps is a final year and postgraduate module ..."
                            >About</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="#"
                            data-toggle="popover"
                            data-trigger="hover"
                            data-placement="bottom"
                            title="3D Models"
                            data-content="3D models of Coca Cola products ..."
                            data-page="models"
                            >Models</a
                        >
                    </li>
                    <li class="nav-item">
                        <a data-toggle="modal" data-target="#contact-modal" href="" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Main body -->
        <div id="home" class="container-fluid main_contents mt-0 mt-sm-3">
            <div class="row">
                <!-- Main_3D Image or Carousel -->
                <div class="col-sm-12 px-0 px-sm-3">
                    <div id="main_3d_image">
                        <div id="main_text" class="col-12 col-lg-4">
                            <h3><?php echo $SliderStrings->getTitle(); ?></h3>
                            <h4><?php echo $SliderStrings->getSubTitle(); ?></h4>
                            <p><?php echo $SliderStrings->getDescription(); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <br />

            <!-- row of cards on the grid -->
            <div class="row" id="main-products-cards">
                <?php foreach($cardStrings as $cardString): ?>
                <!-- Column -->
                <div class="col-md-4">
                    <div class="card info-card">
                        <a href="#">
                            <img class="card-img-top img fluid img-thumbnail" src="assets/images/<?php echo $cardString->getImage(); ?>" alt="Coca Cola" />
                        </a>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $cardString->getTitle(); ?></h4>
                            <div class="card-subtitle"><?php echo $cardString->getSubTitle(); ?></div>
                            <p class="card-text"><?php echo $cardString->getDescription(); ?></p>
                            <button type="button" class="btn btn-primary">Find Out More...</button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div id="models" class="container-fluid main_contents mt-0 mt-sm-3 d-none">
            <!--— Row to hold two cards to hold 1) the X3D model and 2) the gallery -->
            <div class="row">
                <!-- Column to hold the X3D Model -->
                <div class="col-12 col-md-9">
                    <div class="card text-left">
                        <div class="card-header card-header-tabs">
                            <ul class="nav nav-tabs" id="models-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-model="coke">Coke</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-model="sprite">Sprite</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-model="pepper">Pepper</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Bootstrap 4 card body to hold information about the X3D model -->
                        <div class="card-body x3dmodel-card">
                            <h4 class="card-title"></h4>
                            <div class="model3D">
                                <x3d id="coke_model">
                                    <scene class="scene-background" data-product="cola">
                                        <inline nameSpaceName="coke_modelX3D" mapDEFToID="true" url="assets/x3d/coke.x3d"></inline>
                                    </scene>
                                </x3d>

                                <x3d id="sprite_model" class="d-none">
                                    <scene class="scene-background" data-product="sprite">
                                        <inline nameSpaceName="sprite_modelX3D" mapDEFToID="true" url="assets/x3d/sprite.x3d"></inline>
                                    </scene>
                                </x3d>

                                <x3d id="pepper_model" class="d-none">
                                    <scene class="scene-background" data-product="pepper">
                                        <inline nameSpaceName="pepper_modelX3D" mapDEFToID="true" url="assets/x3d/pepper.x3d"></inline>
                                    </scene>
                                </x3d>
                            </div>
                            <p class="card-text mt-3"></p>
                        </div>
                    </div>
                    <!-- Column to hold 3D Image gallery -->
                </div>

                <!-- Column to hold 3D Image gallery -->
                <div class="col-12 col-md-3 mt-4 mt-md-0">
                    <div class="card text-left gallery-card">
                        <div class="card-header gallery-header">Gallery</div>
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <!-- Dynamically generated image gallery using JS and PHP -->
                            <div class="gallery" id="gallery">
                                <div class="row"></div>
                            </div>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>
            </div>

            <!--— Row to hold 1 card to hold the coca cola descriptive text, etc. -->

            <div class="col-sm-12 mt-3 px-0">
                <div class="row">
                    <!-- Column for the camera view controls -->
                    <div class="col-sm-12 col-md-4 mt-3 mt-md-0" id="camera-views-btns">
                        <div class="card text-left bottom-control-card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <!-- Dropdown nav-tab -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-expanded="false">Cameras</a>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" data-view="front">Front</button>
                                            <button class="dropdown-item" data-view="back">Back</button>
                                            <button class="dropdown-item" data-view="left">Left</button>
                                            <button class="dropdown-item" data-view="right">Right</button>
                                            <button class="dropdown-item" data-view="top">Top</button>
                                            <!-- <button class="dropdown-item" onclick="cameraBottom();">Bottom</button> -->
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="card-Title camera-title drinksText">
                                    <h3></h3>
                                </div>
                                <button data-view="front" class="btn btn-primary btn-responsive camera-font">Front</button>
                                <button data-view="back" class="btn btn-secondary btn-responsive camera-font">Back</button>
                                <button data-view="left" class="btn btn-success btn-responsive camera-font">Left</button>
                                <button data-view="right" class="btn btn-danger btn-responsive camera-font">Right</button>
                                <button data-view="top" class="btn btn-warning btn-responsive camera-font">Top</button>
                                <div class="card-text camera-description">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column for the animation controls -->
                    <div class="col-sm-12 col-md-4 mt-3 mt-md-0" id="animation-control-btns">
                        <div class="card text-left bottom-control-card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active">Animation</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="card-Title animation-title drinksText">
                                    <h3></h3>
                                </div>
                                <button class="btn btn-responsive btn-info" data-action="play">Play</button>
                                <button class="btn btn-outline-dark btn-responsive" data-action="stop">Stop</button>
                                <button class="btn btn-responsive btn-danger" data-action="loop">Loop On/Off</button>
                                <div class="card-text animation-description drinksText">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column for the render type and lighting controls -->
                    <div class="col-sm-12 col-md-4 mt-3 mt-md-0" id="render-options-btns">
                        <div class="card text-left bottom-control-card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" aria-expanded="false">Render</a>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" data-action="render">Toggle Render Mode</button>
                                        </div>
                                </li>
                                    <!-- Dropdown nav-tab -->
                                    <li class="nav-item dropdown">
                                        <button class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" aria-expanded="false">Lights</button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" data-action="omni">Onmi On/Off</button>
                                            <button class="dropdown-item" data-action="headlight">Headlight On/Off</button>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="card-Title rendering-title drinksText">
                                    <h3></h3>
                                </div>
                                <button href="#" class="btn btn-warning btn-responsive" data-action="render">Toggle Render Mode</button>
                                <button href="#" class="btn btn-success btn-responsive" data-action="headlight">Headlight On/Off</button>
                                <div class="card-text rendering-description drinksText">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Coca Cola Column -->
            <div class="col-sm-12 mx-0 px-0 my-4" id="bottom-card">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"></h3>
                        <p class="card-text"></p>
                        <a href="#" class="btn btn-primary">Find out more ...</a>
                    </div>
                </div>
            </div>
            <!-- End main_contents container-fluid -->
        </div>

        <!-- Your 3D App footer -->

        <nav id="footerColor" class="navbar navbar-expand-sm footer">
            <div class="container-fluid">
                <div class="navbar-text float-left copyright">
                    <p>
                        <span class="align-baseline">© <?php echo date('Y'); ?> 3D Apps | <a href="javascript:changeLook()">Restyle</a> | <a href="javascript:resetToDefault()">Reset</a></span>
                    </p>
                </div>
                <div class="social">
                    <a href="#"><i class="fab fa-facebook-square fa-2x" style="font-size: 35px; color: black"></i></a>
                    <a href="#"><i class="fab fa-twitter fa-2x" style="font-size: 35px; color: rgb(4, 155, 255)"></i></a>
                    <a href="#"><i class="fab fa-google-plus fa-2x" style="font-size: 35px; color: rgba(4, 255, 17, 0.781)"></i></a>
                    <a href="https://github.com/AngeloGardi/3d-webapp" target="_blank"><i class="fab fa-github-square fa-2x" style="font-size: 35px; color: rgba(255, 255, 255, 0.781)"></i></a>
                </div>
            </div>
        </nav>

        <!-- Contact Modal -->
        <div id="contact-modal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <?php echo $contactInfoStrings->getFullName(); ?><br />
                            <?php echo $contactInfoStrings->getAddress(); ?> <br />
                            Email: <a href="mailto:<?php echo $contactInfoStrings->getEmail(); ?>"><?php echo $contactInfoStrings->getEmail(); ?></a>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/x3dom.js"></script>
        <script src="js/jquery.fancybox.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
