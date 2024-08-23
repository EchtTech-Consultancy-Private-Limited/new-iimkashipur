<?php 
namespace App\Forms;

class LoginForm
{
  public $component = "login-form";

  public function schema() {
    return [
      "email" => [
        "type" => "text",
        "label" => "Email address",
        "rules" => "required|email",
      ],
      "password" => [
        "type" => "password",
        "label" => "Password",
        "rules" => "required"
      ],
      "remember" => [
        "type" => "toggle",
        "text" => "Remember me"
      ]
    ];
  }
}