<?php

namespace Form\Form\Files;

use Form\Source\Upload;
use stdClass;

class Curriculum
{
    /**
     * Diretório default.
     */
    private const DIR_NAME = "curriculos";

    /**
     * @param array $file
     * @return array
     */
    public static function store(array $file): stdClass
    {
        $upload = new Upload(self::DIR_NAME);

        return $upload->save($file, $file['name']);
    }
}
