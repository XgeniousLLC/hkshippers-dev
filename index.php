<?php
//pof47v6l
ob_start();
/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */
if(!file_exists('@core/.env')){
    echo 'Please install the script first, by yourdomain.com/install wizard';
}


define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/@core/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/@core/bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);


function image_resize($img,$w,$h){
    $context = stream_context_create([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ]);
    $image_data_raw = file_get_contents($img, false, $context);
    if ($image_data_raw === false) {
        return $img;
    }
    $size = getimagesizefromstring($image_data_raw);
    $_w = $size[0];
    $_h = $size[1];
    $ext = pathinfo(parse_url($img, PHP_URL_PATH), PATHINFO_EXTENSION);

    $src = imagecreatefromstring($image_data_raw);
    if ($src === false) {
        return $img;
    }

    ob_start();
    
    $resized_image = imagecreatetruecolor($w, $h);
    switch ( strtolower($ext) )
    {
        case 'jpg':
        case 'jpeg':
            imagecopyresampled($resized_image, $src, 0, 0, 0, 0, $w, $h, $_w, $_h);
            imagejpeg($resized_image);
            break;
        case 'png':
            imagealphablending($resized_image, FALSE);
            imagesavealpha($resized_image, TRUE);
            imagecopyresampled($resized_image, $src, 0, 0, 0, 0, $w, $h, $_w, $_h);
            imagepng($resized_image);
            break;
        case 'gif':
            imagecopyresampled($resized_image, $src, 0, 0, 0, 0, $w, $h, $_w, $_h);
            $background = imagecolorallocate($resized_image, 0, 0, 0); 
            imagecolortransparent($resized_image, $background);
            imagegif($resized_image);
            break;
    }
    $image_data = ob_get_contents(); 
    ob_end_clean(); 
    imagedestroy($src);
    imagedestroy($resized_image);
    return 'data:image/' . $ext . ';base64,' . base64_encode($image_data);
}