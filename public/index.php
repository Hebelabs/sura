<?php
/*
 * Copyright (c) 2023 Sura
 *
 *  For the full copyright and license information, please view the LICENSE
 *   file that was distributed with this source code.
 *
 */

declare(strict_types=1);

use Mozg\Mozg;

// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    // should do a check here to match $_SERVER['HTTP_ORIGIN'] to a
    // whitelist of safe domains
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");         

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

}

// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
// header("Access-Control-Allow-Headers: X-Requested-With");


// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//     header('Access-Control-Allow-Origin: *');
//     header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
//     header('Access-Control-Allow-Headers: token, Content-Type');
//     header('Access-Control-Max-Age: 1728000');
//     header('Content-Length: 0');
//     // header('Content-Type: text/plain');
//     die();
// }
// header('Access-Control-Allow-Origin: *');
// // header('Content-Type: application/json');

if (\version_compare(PHP_VERSION, '8.1.5') < 0) {
    throw new \RuntimeException('Please change php version');
}
if (isset($_POST['PHPSESSID'])) {
    \session_id($_POST['PHPSESSID']);
}
\session_start();
\ob_start();
\ob_implicit_flush(false);
const ROOT_DIR = __DIR__ . '/../';
const ENGINE_DIR = ROOT_DIR . '/system';
try {
    require __DIR__ . '/../vendor/autoload.php';
} catch (\Error) {
    throw new \RuntimeException('Please install composer');
}

/** Initialize */
try {
    (new Mozg())::initialize();
} catch (JsonException $e) {
} catch (\Mozg\exception\ErrorException $e) {
}


