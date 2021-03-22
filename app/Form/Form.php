<?php

namespace Form\Form;

use Form\Form\Email\SendMail;
use Throwable;
use Form\Form\Files\Curriculum;

class Form
{

    private SendMail $mail;

    public function __construct()
    {
        $this->mail = new SendMail;
    }

    public function storage(array $requests): bool
    {
        try {
            $fileName = $this->saveFile($requests['file']);
            $this->sendMail($requests, $fileName);
        } catch (Throwable $th) {
            dump($th);
        }

        return true;
    }

    private function saveFile(array $file): string
    {
        return Curriculum::store($file);
    }

    private function sendMail(array $data, string $attachment): bool
    {
        $this->mail->setData($data);
        $this->mail->setPathAttachment($attachment);

        return $this->mail->sendMail();
    }
}
