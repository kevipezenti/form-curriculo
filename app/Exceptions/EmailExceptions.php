<?php

namespace Form\Exceptions;

use Exception;
use Throwable;

class EmailExceptions extends Exception
{

    private const MESSAGE = "Erro send email";

    private Throwable $th;

    public function __construct(
        string $message,
        int $code,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
        $this->th = $previous;
        $this->render();
    }

      /**
     * Registrar o log.
     *
     * @return void
     */
    public function report()
    {
    }

    /**
     * Renderiza uma página de erro.
     *
     * @return void
     */
    public function render(): void
    {
        dump($this->messages);
    }

    /**
     * Retorna as mensagens de erros dos camos.
     *
     * @return array
     */
    public function getFieldsErrors(): array
    {
        return $this->messages;
    }

    public function __toString(): string
    {
        return __CLASS__ . ": [{$this->code}]: " . self::MESSAGE;
    }
}
