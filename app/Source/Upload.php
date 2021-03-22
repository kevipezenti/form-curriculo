<?php

namespace Form\Source;

// use CoffeeCode\Uploader\Send as File;
use Exception;
use CoffeeCode\Uploader\Send as File;
use Form\Exceptions\UploadExceptions;

class Upload
{
    protected File $file;

    private const ALLOW_TYPES = [
        "application/pdf",
        "application/msword",
        "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
    ];

    private const EXTENSIONS = [
        "pdf",
        "doc",
        "docx",
    ];


    public function __construct(string $dirName)
    {
        $this->file = new File(
            PATH_STORAGE,
            $dirName,
            self::ALLOW_TYPES,
            self::EXTENSIONS,
            false
        );
    }

    /**
     * Pesirti o arquivo em disco e rotorna o path.
     *
     * @param array $file
     * @param string $newName
     * @return string
     */
    public function save(array $file, string $newName): string
    {
        try {
            return $this->file->upload($file, $newName);
        } catch (Exception $th) {
            throw new UploadExceptions(
                "Falha ao salvar arquivo {$newName}",
                Response::INTERNAL_SERVER_ERROR,
                $th
            );
        }
    }
}
