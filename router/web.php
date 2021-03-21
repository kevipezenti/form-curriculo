<?php

$route->group(null);

$route->get('/', 'FormController:index');

$route->post('/', 'FormController:storage');

$route->dispatch();

if($route->error()){
    echo $route->error();
}
