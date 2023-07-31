<?php

shell_exec('composer create laravel/laravel laravel');


$env = explode(PHP_EOL, file_get_contents('laravel/.env'));

$_env = explode(PHP_EOL, file_get_contents('/app/.env'));

$env_prod = '';
foreach ($_env as $key => &$_environment) {
    foreach ($env as $_key => &$environment) {
        $_e = explode('=', $_environment);
        $e = explode('=', $environment);
        if ($_e[0] == $e[0]) {
            $environment = $e[0] . '=' . $_e[1];
            $_environment = null;
            continue 2;
        }

    }
}
foreach ($_env as $key => &$_environment) {
    if (isset($_environment)) {
        $_e = explode('=', $_environment);
        $env[] = $_e[0] . '=' . $_e[1];
    }
}

foreach ($env as $_env) {
    $env_prod .= $_env . "\n";
}

file_put_contents('laravel/.env', $env_prod);

//shell_exec('mv -v  laravel/* laravel/.* ./');
