<?php
define('PREVENT_DIRECT_ACCESS', TRUE);
/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * MIT License
 * 
 * Copyright (c) 2020 Ronald M. Marasigan
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package LavaLust
 * @author Ronald M. Marasigan <ronald.marasigan@yahoo.com>
 * @copyright Copyright 2020 (https://ronmarasigan.github.io)
 * @since Version 1
 * @link https://lavalust.pinoywap.org
 * @license https://opensource.org/licenses/MIT MIT License
 */

/*
 *---------------------------------------------------------------
 * SYSTEM DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "scheme" directory.
 * Set the path if it is not in the same directory as this file.
 * 
 * NO TRAILING SLASH!
 */
	$system_path 			= 'scheme';

/*
 *---------------------------------------------------------------
 * APPLICATION DIRECTORY NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "app"
 * directory than the default one you can set its name here.
 *
 * NO TRAILING SLASH!
 */
	$application_folder 	= 'app';

/*
 *---------------------------------------------------------------
 * APPLICATION DIRECTORY NAME
 *---------------------------------------------------------------
 * This let you set up your public folder where css, js and other public,
 * files will be visible
 */
	$public_folder			= 'public';

/*
 * ------------------------------------------------------
 * Define Application Constants
 * ------------------------------------------------------
 */
define('ROOT_DIR',  __DIR__ . DIRECTORY_SEPARATOR);
define('SYSTEM_DIR', ROOT_DIR . $system_path . DIRECTORY_SEPARATOR);
define('APP_DIR', ROOT_DIR . $application_folder . DIRECTORY_SEPARATOR);
define('PUBLIC_DIR', $public_folder);

/*
 * ------------------------------------------------------
 * Setup done? Then Hurray!
 * ------------------------------------------------------
 */

// Simple check for root URL - bypass framework routing for testing
$request_uri = $_SERVER['REQUEST_URI'] ?? '';
$script_name = $_SERVER['SCRIPT_NAME'] ?? '';
$url = str_replace($script_name, '', $request_uri);
$url = rtrim($url, '/');

if ($url === '' || $url === '/') {
    // Direct access to root URL - show simple page
    echo "<!DOCTYPE html>";
    echo "<html><head><title>ONG Killua - Working!</title></head>";
    echo "<body style='font-family: Arial, sans-serif; padding: 20px;'>";
    echo "<h1>🎉 SUCCESS! Application is working!</h1>";
    echo "<p>This is the root URL of your ONG Killua application.</p>";
    echo "<p>Current time: " . date('Y-m-d H:i:s') . "</p>";
    echo "<p>PHP Version: " . phpversion() . "</p>";
    echo "<p><a href='/test.php'>Test Page</a> | <a href='/user/create'>Create User</a></p>";
    echo "</body></html>";
    exit;
}

require_once SYSTEM_DIR . 'kernel/LavaLust.php';
?>
