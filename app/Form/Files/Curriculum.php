<?php

namespace Form\Form\Files;

use Form\Source\Upload;

class Curriculum
{
    /**
     * Diretório default.
     */
    private const DIR_NAME = "curriculos";

    /**
     * @param array $file
     * @return string
     */
    public static function store(array $file): string
    {
        $upload = new Upload(self::DIR_NAME);

        return $upload->save($file, $file['name']);
    }
}
