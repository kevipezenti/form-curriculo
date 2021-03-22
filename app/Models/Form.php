<?php

namespace Form\Models;

use Form\Source\Models;

class Form extends Models
{
    protected string $table = "form";

    protected array $required = [
        "name",
        "email",
        "phone",
        "office",
        "schooling",
        "file",
        "note",
        "date",
        "hour"
    ];
}
