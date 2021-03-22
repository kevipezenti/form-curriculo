<?php

namespace Form\Source;

// use CoffeeCode\Uploader\Send as File;
use Exception;
use CoffeeCode\Uploader\Send as File;
use Form\Exceptions\UploadExceptions;
use stdClass;

class Upload
{
    protected File $file;

    public stdClass $objStd;

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

        $this->objStd = new stdClass;
    }

    /**
     * Pesirti o arquivo em disco e rotorna um array de path.
     *
     * stdClass retornada:
     *
     * $obsolute - Caminho absoluto do arquivo;
     * $relative - Caminho relativo do arquivo.
     *
     *
     * @param array $file
     * @param string $newName
     * @return stdClass
     */
    public function save(array $file, string $newName): stdClass
    {
        try {
            $pathFile = $this->file->upload($file, $newName);

            $this->objStd->absolute = static::getAbsPath($pathFile);
            $this->objStd->relative = static::getRelativePath($pathFile);

            return $this->objStd;
        } catch (Exception $th) {
            throw new UploadExceptions(
                "Falha ao salvar arquivo {$newName}",
                Response::INTERNAL_SERVER_ERROR,
                $th
            );
        }
    }

    /**
     * Retorna o caminho absoluto do arquivo.
     *
     * @param string $pathFile
     * @return string
     */
    public static function getAbsPath(string $pathFile): string
    {
        return realpath($pathFile);
    }

    /**
     * Undocumented function
     *
     * @param string $pathFile
     * @return string
     */
    public static function getRelativePath(string $pathFile): string
    {
        return strstr(
            static::getAbsPath($pathFile),
            static::getDir()
        );
    }

    /**
     * Retorna o nome do doretório de upload.
     *
     * @return string
     */
    private static function getDir(): string
    {
        return strrchr(PATH_STORAGE, "/");
    }
}
