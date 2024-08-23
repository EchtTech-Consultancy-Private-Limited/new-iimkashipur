<?php 
namespace App\Http\Helpers;

use DB,Log;


class CustomCaptcha {

    function generateRandomAdditionExpression() {
        $num1 = rand(11, 39);
        $num2 = rand(1, 10);
        $captchaExpression = "$num1 + $num2";
        $captchaAnswer = $num1 + $num2;
        return array('expression' => $captchaExpression, 'answer' => $captchaAnswer);
    }

}