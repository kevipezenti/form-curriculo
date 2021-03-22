<?php

/**
 * Monta a URL na view
 *
 * @param string $uri
 * @return string
 */
function url(string $uri): string
{
    return URL . $uri;
}

function dump($variable): void
{
    echo "<pre>", print_r($variable, true), "</pre>";
}
