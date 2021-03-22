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
        $resume->ip = static::getClientIP();

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

    /**
     * Tenta retorna o IP do cliente.
     *
     * @return string
     */
    public static function getClientIP(): string
    {
        $ipaddress = 'UNKNOWN';

        if ($_SERVER['HTTP_CLIENT_IP']) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } elseif ($_SERVER['HTTP_X_FORWARDED_FOR']) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif ($_SERVER['HTTP_X_FORWARDED']) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        } elseif ($_SERVER['HTTP_FORWARDED_FOR']) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } elseif ($_SERVER['HTTP_FORWARDED']) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        } elseif ($_SERVER['REMOTE_ADDR']) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        }

        return $ipaddress;
    }
}
