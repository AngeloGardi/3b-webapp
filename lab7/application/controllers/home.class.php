<?php 
require_once dirname(__FILE__) . '/../class/db.class.php';
require_once dirname(__FILE__) . '/../models/Model.class.php';

class HomeController {

    private $data;
    function __construct() {
        $this->data = [
            // coke
            new Model('X3D Coke Model Image 1', '', '', '', 'coke_1.png'),
            new Model('X3D Coke Model Image 2', '', '', '', 'coke_2.png'),
            // sprite 
            new Model('X3D Sprite Model Image 1', '', '', '', 'sprite_1.png'),
            new Model('X3D Sprite Model Image 2', '', '', '', 'sprite_2.png'),
            // pepper 
            new Model('X3D Pepper Model Image 1', '', '', '', 'pepper_1.png'),
            new Model('X3D Pepper Model Image 2', '', '', '', 'pepper_2.png'),
        ];
    }
    
    public function getData(){
        return $this->data;
    }
}