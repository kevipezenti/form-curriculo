<?php

namespace Form\Models;

use Form\Source\Models;

class Resume extends Models
{
    protected string $table = "resumes";

    protected array $required = [
        "name",
        "email",
        "phone",
        "office",
        "schooling",
        "file",
        "date_occurred",
        "hour_occurred",
        "ip",
    ];

    public function __construct()
    {
        parent::__construct();
    }
}
