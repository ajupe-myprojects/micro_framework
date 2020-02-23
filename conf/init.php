<?php
require_once __DIR__.'/settings.php';
//++++Container++++//

$container = new App\Container();

//++++global variables++++//



//++++ global functions++++//

function e( string $str) : string
{
    $fstrg = htmlentities($str, ENT_QUOTES, 'UTF-8');
    return nl2br($fstrg);
}
