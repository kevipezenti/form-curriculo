<?php

namespace Form\Form\Email;

use Form\Source\Email;
use Form\Source\Views;
use Form\Source\Response;
use Form\Exceptions\EmailExceptions;

class SendMail extends Email
{
    private const TEMPLATE_MAIL = "email/curriculum";

    private Views $view;

    private array $data;

    private string $tmpBody;

    public function __construct()
    {
        parent::__construct();
        $this->view = new Views;
    }

    /**
     * Dados do corpo do email.
     *
     * @param array $data
     * @return void
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @param string $path
     * @return void
     */
    public function setPathAttachment(string $path): void
    {
        if ($this->existsAttachment($path)) {
            parent::setAttachment($path);
        }
    }

    /**
     * Compila o template de e-mail.
     *
     * @return void
     */
    private function makeTemplate(): void
    {
        $tmpl = $this->view->makeTemplate(self::TEMPLATE_MAIL);

        ob_start();

        echo $tmpl->render($this->data);

        $this->tmpBody = ob_get_contents();

        ob_end_clean();
    }

    /**
     * Verifica se o anexo existe.
     *
     * @param string $file
     * @return boolean
     */
    private function existsAttachment(string $file): bool
    {
        if (!file_exists($file)) {
            throw new EmailExceptions(
                "Anexo não encontrado em: {$file}",
                Response::INTERNAL_SERVER_ERROR
            );
        }

        return true;
    }

    public function sendMail(): bool
    {
        $this->makeTemplate();

        parent::setBody($this->tmpBody);
        return parent::sendMail();
    }
}
