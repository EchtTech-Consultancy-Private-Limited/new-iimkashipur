<?php 

return [
    'proxies' => '*', // Or specify the IPs of your proxies/load balancers
    'headers' => [
        \Illuminate\Http\Request::HEADER_FORWARDED => 'FORWARDED',
        \Illuminate\Http\Request::HEADER_X_FORWARDED_FOR => 'X_FORWARDED_FOR',
        \Illuminate\Http\Request::HEADER_X_FORWARDED_HOST => 'X_FORWARDED_HOST',
        \Illuminate\Http\Request::HEADER_X_FORWARDED_PORT => 'X_FORWARDED_PORT',
        \Illuminate\Http\Request::HEADER_X_FORWARDED_PROTO => 'X_FORWARDED_PROTO',
    ],
    'hosts' => [
        env('APP_URL_DOMAIN'),
        env('APP_URL_WWW'),
    ],
];