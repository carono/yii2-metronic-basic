<?php

declare(strict_types=1);

/** @var \yii\web\View $this */
/** @var \app\models\ContactForm $model */

use app\helpers\metronic\Btn;
use app\widgets\metronic\ActiveForm;
use app\widgets\metronic\Alert;
use app\widgets\metronic\Card;
use yii\captcha\Captcha;

$this->title = 'Contact';
?>
<div class="max-w-2xl mx-auto">
    <?= Alert::widget() ?>

    <?php Card::begin(['title' => 'Contact us']) ?>
        <?php $form = ActiveForm::begin(['id' => 'contact-form']) ?>
            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['type' => 'email']) ?>
            <?= $form->field($model, 'subject')->textInput() ?>
            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                'template' => '<div class="flex items-center gap-2">{image}{input}</div>',
            ]) ?>
            <div class="mt-4">
                <?= Btn::submit('Submit', ['variant' => 'primary', 'options' => ['name' => 'contact-button']]) ?>
            </div>
        <?php ActiveForm::end() ?>
    <?php Card::end() ?>
</div>
