<?php
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/conf/init.php';
require_once __DIR__.'/conf/routes.php';
require_once __DIR__.'/views/base_parts/view_base_head.php';

getRoute($routes,$container);

include_once __DIR__.'/views/base_parts/view_base_foot.php';