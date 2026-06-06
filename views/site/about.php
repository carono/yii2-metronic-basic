<?php

declare(strict_types=1);

/** @var \yii\web\View $this */

use app\widgets\metronic\Card;

$this->title = 'About';
?>
<?php Card::begin(['title' => 'About']) ?>
    <p class="text-sm text-secondary-foreground">Это демонстрация Metronic-шаблона для Yii2 — пакет <code>carono/yii2-metronic</code>.</p>
<?php Card::end() ?>
