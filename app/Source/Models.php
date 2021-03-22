<?php

namespace Form\Source;

use CoffeeCode\DataLayer\DataLayer;

class Models extends DataLayer
{

    protected string $table;

    protected array $required;

    protected string $id = "id";

    protected bool $timestamps = true;

    public function __construct()
    {
        parent::__construct(
            $this->table,
            $this->required,
            $this->id,
            $this->timestamps
        );
    }
}
