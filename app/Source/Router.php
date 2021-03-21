<?php

namespace Form\Source;

use CoffeeCode\Router\Router as CooffeRouter;

class Router extends CooffeRouter
{

    public function __construct() {

        parent::__construct(URL);

        // Set Controllers
        $this->namespace(NAMESPACE_CONTROLLERS);
    }

}