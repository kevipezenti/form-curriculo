<?php

namespace Form\Source;

use Throwable;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use Form\Exceptions\EmailExceptions;

class Email
{
    private PHPMailer $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        try {
            $this->setConf();
            $this->verifyEncryption();
            $this->debugMode();
        } catch (Throwable $th) {
            throw new EmailExceptions(
                $this->mail->ErrorInfo,
                Response::INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * Carrega as configurações
     *
     * @return void
     */
    private function setConf(): void
    {
        $this->mail->isSMTP(true);
        $this->mail->isHTML(true);
        $this->mail->setLanguage('br');
        $this->mail->CharSet = 'UTF-8';

        $this->mail->Host = EMAIL['HOST'];
        $this->mail->SMTPAuth   = EMAIL['SMTP_AUTH'];
        $this->mail->Username   = EMAIL['USERNAME'];
        $this->mail->Password   = EMAIL['PASSWORD'];
        $this->mail->SMTPSecure = EMAIL['ENCRYPTION'];
        $this->mail->Port       = EMAIL['PORT'];

        $this->mail->setFrom(
            EMAIL['FROM_ADDRESS'],
            EMAIL['FROM_NAME']
        );

        $this->mail->addAddress(
            EMAIL['RECIPIENT_CONTACT'],
            EMAIL['NAME_RECIPIENT']
        );

        $this->mail->Subject = EMAIL['SUBJECT'];
        $this->mail->AltBody = EMAIL['ALT_BODY'];
    }

    /**
     * Defini o corpo da mensagem.
     *
     * @param string $bodyText
     * @return void
     */
    public function setBody(string $bodyText): void
    {
        $this->mail->Body = $bodyText;
    }

    /**
     * Adiciona anexos.
     *
     * @param string $pathFile
     * @param string $newName
     * @return void
     */
    public function setAttachment(string $pathFile, string $newName = ''): void
    {
        $this->mail->addAttachment($pathFile, $newName);
    }

    /**
     * Verifica se a criptografia está ativada, caso contrário,
     * será desabilitado a verificação SSL.
     *
     * @return void
     */
    private function verifyEncryption(): void
    {
        if (EMAIL['ENCRYPTION']) {
            $this->mail->SMTPSecure = EMAIL['ENCRYPTION'];
        } else {
            $this->mail->SMTPOptions = [
            'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
            ];
        }
    }

    private function debugMode(): void
    {
        switch (EMAIL['DEBUG']) {
            case 1:
                $this->mail->SMTPDebug = SMTP::DEBUG_CLIENT;
                break;
            case 2:
                $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
                break;
            case 3:
                $this->mail->SMTPDebug = SMTP::DEBUG_CONNECTION;
                break;
            case 4:
                $this->mail->SMTPDebug = SMTP::DEBUG_LOWLEVEL;
                break;

            default:
                $this->mail->SMTPDebug = SMTP::DEBUG_OFF;
                break;
        }
    }

    /**
     * Envia.
     *
     * @return boolean
     */
    public function sendMail(): bool
    {
        try {
            return $this->mail->send();
        } catch (Throwable $th) {
            throw new EmailExceptions(
                $this->mail->ErrorInfo,
                Response::INTERNAL_SERVER_ERROR
            );
        }
    }
}
