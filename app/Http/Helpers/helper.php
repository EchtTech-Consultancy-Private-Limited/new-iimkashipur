<?php

if (! function_exists('humanFilesize')) {
    function humanFilesize($size, $precision = 2)
    {
        $units = ['B','kB','MB','GB','TB','PB','EB','ZB','YB'];
        $step = 1024;
        $i = 0;

        while (($size / $step) > 0.9) {
            $size = $size / $step;
            $i++;
        }
        
        return round($size, $precision).$units[$i];
    }
}

/**
 * Checks if the uploaded document is an image
 */
if (! function_exists('isFileImage')) {
    function isFileImage($filename)
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $array = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF'];
        $output = in_array($ext, $array) ? true : false;

        return $output;
    }
}

if (! function_exists('generateRandomAdditionExpression')) {
    function generateRandomAdditionExpression() {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $captchaExpression = "$num1 + $num2";
        $captchaAnswer = $num1 + $num2;
        return array('expression' => $captchaExpression, 'answer' => $captchaAnswer);
    }
}

if (! function_exists('getFileImage')) {
    function getFileImage($foldername,$filename) {
        $base = base64_encode(asset(env('IMAGE_FILE_FOLDER')."/{$foldername}/{$filename}"));    
        //$fullpath=asset(env('IMAGE_FILE_FOLDER')."/{$foldername}/{$filename}");
        return $base;
    }
}
