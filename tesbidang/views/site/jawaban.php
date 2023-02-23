<?php

use app\models\JawabanForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Jawaban';

// create a new instance of JawabanForm model
$model = new JawabanForm();

// start form
$form = ActiveForm::begin(['id' => 'jawaban-form']);
?>

<div class="site-index">
    <div>
        <center>
            <h1>Deteksi KTP Duplikat</h1>
        </center>
        <br>
    </div>
</div>

<?= $form->field($model, 'ktp')->textarea([
    'rows' => '6',
    'style' => 'resize: vertical;',
    'placeholder' => '3871921234XXX,3871921198XXX,...'
])->label('Masukkan nomor KTP, pisahkan dengan koma (,)') ?>

<?= Html::submitButton('Temukan KTP pelanggar', ['class' => 'btn btn-lg btn-primary']) ?>

<?php ActiveForm::end(); ?>

<?php if (isset($pelanggar)) : ?>
    <?php if (!empty($pelanggar)) : ?>
        <h4>Daftar KTP pelanggar:</h4>
        <ul>
            <?php foreach ($pelanggar as $ktp) : ?>
                <li><?= $ktp ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Tidak ditemukkan adanya KTP pelanggar</p>
    <?php endif; ?>
<?php endif; ?>