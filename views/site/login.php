<?php

declare(strict_types=1);

/** @var \yii\web\View $this */
/** @var \app\models\LoginForm $model */

use carono\metronic\helpers\Btn;
use carono\metronic\widgets\ActiveForm;
use carono\metronic\widgets\Card;

$this->title = 'Login';
?>
<div class="max-w-md mx-auto">
    <?php Card::begin(['title' => 'Login to your account']) ?>
        <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
            <div class="mt-4">
                <?= Btn::submit('Login', ['variant' => 'primary', 'options' => ['name' => 'login-button']]) ?>
            </div>
        <?php ActiveForm::end() ?>
        <div class="text-muted-foreground text-xs mt-3">
            Войти как <strong>admin/admin</strong> или <strong>demo/demo</strong>.
        </div>
    <?php Card::end() ?>
</div>
