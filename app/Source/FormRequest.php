<?php

namespace Form\Source;

use GUMP;
use Form\Exceptions\FormRequestExceptions;

class FormRequest extends GUMP
{

    private array $requests;

    public function __construct(array $requests)
    {

        $this->requests = $requests;

        parent::__construct('pt-br');
        $this->validation_rules(static::VALIDATION_RULES);
        $this->filter_rules(static::FILTER_RULES);
        $this->set_field_names(static::FIELD_NAME);
        $this->set_fields_error_messages(static::ERROR_MESSAGES);
    }

    public function __invoke()
    {
        $validated = $this->run($this->requests);

        if ($this->errors()) {
            throw new FormRequestExceptions(
                $this->get_errors_array(),
                Response::METHOD_NOT_ALLOWED
            );
        } else {
            return $validated;
        }
    }
}
