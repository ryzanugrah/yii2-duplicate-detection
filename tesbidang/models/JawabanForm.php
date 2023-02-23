<?php

namespace app\models;

use yii\base\Model;

class JawabanForm extends Model
{
    // public property for the KTP number input field
    public $ktp;

    // validation rules
    public function rules()
    {
        return [
            [['ktp'], 'required'],
            [['ktp'], 'string'],
        ];
    }
}
