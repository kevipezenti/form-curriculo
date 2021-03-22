<?php

namespace Form\Controllers;

use Form\Exceptions\FormExceptions;
use Form\Form\Form;
use Form\Source\Views;
use Form\Request\FormValidationRequest;
use Form\Exceptions\FormRequestExceptions;
use Throwable;

class FormController extends Views
{

    private Form $form;

    public function __construct()
    {
        parent::__construct();

        $this->form = new Form();
    }

    public function index(): void
    {
        echo $this->render('form');
    }

    public function storage(array $requests): void
    {
        $message = [
            'status' => "Formulário enviado com sucesso."
        ];

        try {
            $validated = (
                new FormValidationRequest(array_merge($requests, $_FILES))
            )();

            $this->form->storage($validated);
        } catch (FormRequestExceptions $th) {
            $message = [
                'errors' => $th->getFieldsErrors()
            ];
        } catch (FormExceptions | Throwable $th) {
            $message = [
                'error' => $th->getMessage()
            ];
        }


        $this->addData($message);
        // dump($this->addData($message));
        // die;

        echo $this->render('form');
    }
}
