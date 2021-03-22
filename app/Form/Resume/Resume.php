<?php

namespace Form\Form\Resume;

use Form\Exceptions\DbExceptions;
use Form\Models\Resume as ModelsResume;
use Form\Source\Response;

class Resume
{

    public static function save(array $data): ?int
    {
        $resume = new ModelsResume;

        $resume->name = $data['name'];
        $resume->email = $data['email'];
        $resume->phone = $data['phone'];
        $resume->office = $data['office'];
        $resume->schooling = $data['schooling'];
        $resume->file = $data['file'];
        $resume->note = $data['note'];
        $resume->date_occurred = $data['date'];
        $resume->hour_occurred = $data['hour'];

        $id = $resume->save();

        if (!$id) {
            throw new DbExceptions(
                "Error ao salvar dados na base.",
                Response::INTERNAL_SERVER_ERROR,
                $resume->fail()
            );
        }

        return $id;
    }
}
