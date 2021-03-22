<?php

namespace Form\Request;

use Form\Source\FormRequest;

class FormValidationRequest extends FormRequest
{

    /**
     * Configuração das regras de validação.
     */
    protected const VALIDATION_RULES = [
        "name" => "required|max_len, 45|min_len,3|alpha_space",
        "email" => 'required|valid_email|max_len,45',
        "phone" => "required|phone",
        "office" => "required|alpha_numeric_space|min_len,3|max_len,45",
        "schooling" => "required|existIn",
        "file" => "required_file|extension,doc;docx;pdf|size_file,1024",
        "date" => "required|date",
        "hour" => "required|hour",
    ];

    /**
     * Configuração das regras de filtros.
     */
    protected const FILTER_RULES = [
        "name" => "sanitize_string|trim",
        "office" => "sanitize_string|trim",
        "note" => "sanitize_string|trim"
    ];

    /**
     * Configuração de alias dos fields.
     */
    protected const FIELD_NAME = [
        "name" => "nome",
        "email" => "e-mail",
        "phone" => "telefone",
        "office" => "cargo",
        "schooling" => "escolaridade",
        "file" => "currículo",
        "note" => "Observação",
        "date" => "data",
        "hour" => "hora",
    ];

    /**
     * Messages de erros customizadas.
     */
    protected const ERROR_MESSAGES = [
        'phone' => [
            'phone' => 'O campo {field} precisa conter um valor com formato válido'
        ],
        'file' => [
            'size_file' => 'O campo {field} deve ter o tamanho máximo de 1MB'
        ]
    ];


    /**
     * Valida o campo phone no formato: (dd) ddddd-dddd
     *
     * @param mixed $field
     * @param array $input
     * @param array $params
     * @param mixed $value
     * @return boolean
     */
    protected function validate_phone(
        $field,
        array $input,
        array $params = [],
        $value
    ): bool {
        $regx = "/^[(][[:digit:]]{2}[)] [[:digit:]]{5}[-]([[:digit:]]){3,4}$/";

        return preg_match($regx, $value);
    }

    /**
     * Valida se o valor preenchido está pré definido.
     *
     * @param mixed $field
     * @param array $input
     * @param array $params
     * @param mixed $value
     * @return boolean
     */
    protected function validate_existIn(
        $field,
        array $input,
        array $params = [],
        $value
    ): bool {
        return in_array($value, SCHOOLINGS);
    }

    /**
     * Valida o tamanho do arquivo, valor do paramentro
     * em kb.
     *
     * @param mixed $field
     * @param array $input
     * @param array $params
     * @param mixed $value
     * @return boolean
     */
    protected function validate_size_file(
        $field,
        array $input,
        array $params = [],
        $value
    ): bool {
        return $input[$field]['size'] <= $params[0]*1024;
    }

    /**
     * Valida o formato da hora em hh:mm.
     *
     * @param mixed $field
     * @param array $input
     * @param array $params
     * @param mixed $value
     * @return boolean
     */
    protected function validate_hour(
        $field,
        array $input,
        array $params = [],
        $value
    ): bool {
        $regx = "/^[[:digit:]]{2}:[[:digit:]]{2}$/";

        return preg_match($regx, $value);
    }
}
