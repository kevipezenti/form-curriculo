<?php

namespace Form\Form;

use stdClass;
use Throwable;
use Form\Form\Resume\Resume;
use Form\Form\Email\SendMail;
use Form\Form\Files\Curriculum;
use Form\Exceptions\DbExceptions;
use Form\Exceptions\EmailExceptions;
use Form\Exceptions\FormExceptions;
use Form\Exceptions\UploadExceptions;
use Form\Source\Response;

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
            $this->sendMail($requests, $fileName->absolute);
            $this->persistirResume($requests, $fileName->relative);
        } catch (UploadExceptions |
            EmailExceptions |
            DbExceptions |
            Throwable $th) {
                 throw new FormExceptions(
                     "Falha ao enviar formulário.",
                     Response::INTERNAL_SERVER_ERROR,
                     $th
                 );
        }

        return true;
    }

    /**
     * @param array $file
     * @return stdClass
     */
    private function saveFile(array $file): stdClass
    {
        return Curriculum::store($file);
    }

    /**
     * @param array $data
     * @param string $attachment
     * @return boolean
     */
    private function sendMail(array $data, string $attachment): bool
    {
        $this->mail->setData($data);
        $this->mail->setPathAttachment($attachment);

        return $this->mail->sendMail();
    }

    /**
     * @param array $properties
     * @param string $fileName
     * @return integer|null
     */
    public function persistirResume(array $properties, string $fileName): ?int
    {
        $properties['file'] = $fileName;

        return Resume::save($properties);
    }
}
