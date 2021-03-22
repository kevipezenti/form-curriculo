<?php

// URL da aplicação
define("URL", "http://localhost:8080");

/**
 * Define o namespace default dos controllers
 */
define("NAMESPACE_CONTROLLERS", "Form\Controllers");

/**
 * Diretório raiz dos uploads.
 */
define("PATH_STORAGE", __DIR__ . "/../../storage");

/**
 * Local de onde será carregado os templates.
 */
define("PATH_VIEWS", __DIR__ . "/../../views");

/**
 * Local de onde será carregado os templates.
 */
define("PATH_ASSETS", __DIR__ . "/../../public");

/**
 * Se definido como true usa o método de cache de nome de arquivo.
 */
define("CACHE_ASSETS", false);


define("SCHOOLINGS", [
    'Ensino Médio',
    'Ensino Médio - Cursando',
    'Graduação',
    'Graduação - Cursando',
    'Mestrado',
    'Mestrado - Cursando',
    'Doutorado',
    'Doutorado - Cursando',
]);

/**
 * Configurações de disparo de e-mail
 */
define("EMAIL", [
    "HOST" => "smtp.host.com",
    "SMTP_AUTH" => true,
    "ENCRYPTION" => null,
    "DEBUG" => false,
    "USERNAME" => "r",
    "PASSWORD" => "",
    "PORT" => 25,
    "FROM_ADDRESS" => "",
    "FROM_NAME" => "",
    "RECIPIENT_CONTACT" => "",
    "NAME_RECIPIENT" => "",
    "SUBJECT" => "",
    "ALT_BODY" => "",
]);
