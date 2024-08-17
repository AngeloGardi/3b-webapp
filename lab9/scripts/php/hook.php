<?php 
header('Content-Type: application/json');
$dir = '../../assets/images/gallery';
$allowed_extensions = ['png', 'gif', 'jpeg', 'jpg'];
$response = [
    'images' => []
];
$dir_handle = opendir($dir);

while($file = readdir($dir_handle)) {
    if(substr($file, 0, 1) != '.'){
        $splitted = explode('.', $file);
        $extension = strtolower(end($splitted));

        if(in_array($extension, $allowed_extensions)) {
            $response['images'][] = $file;
        }
    }
}

closedir($dir_handle);
echo json_encode($response);