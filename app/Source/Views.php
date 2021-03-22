<?php

namespace Form\Source;

use Throwable;
use League\Plates\Engine;
use League\Plates\Extension\Asset;
use Form\Exceptions\ViewsExceptions;
use League\Plates\Template\Template;

class Views extends Engine
{

    public function __construct()
    {
        try {
            parent::__construct(PATH_VIEWS);
        } catch (Throwable $th) {
            throw new ViewsExceptions(
                "Falha ao instanciar a view",
                Response::INTERNAL_SERVER_ERROR,
                $th
            );
        }
    }

    public function loadAssets(): void
    {
        try {
            parent::loadExtension(new Asset(PATH_ASSETS, CACHE_ASSETS));
        } catch (Throwable $th) {
            throw new ViewsExceptions(
                "Falha ao carregar os assets",
                Response::INTERNAL_SERVER_ERROR,
                $th
            );
        }
    }

    public function makeTemplate(string $templateLocation): Template
    {
        return new Template($this, $templateLocation);
    }
}
