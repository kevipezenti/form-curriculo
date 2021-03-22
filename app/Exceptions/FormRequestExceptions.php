<?php

namespace Form\Exceptions;

use Exception;
use Throwable;

class FormRequestExceptions extends Exception
{

    private const MESSAGE = "Erro Form Validation";

    private ?Throwable $th;

    private array $messages;

    public function __construct(
        array $messages,
        int $code,
        Throwable $previous = null
    ) {
        parent::__construct(self::MESSAGE, $code, $previous);
        $this->th = $previous;
        $this->messages = $messages;
        $this->report();
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
