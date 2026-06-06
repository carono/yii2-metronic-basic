<?php

declare(strict_types=1);

/** @var \yii\web\View $this */

use app\helpers\metronic\Btn;
use app\widgets\metronic\Badge;
use app\widgets\metronic\Card;
use yii\helpers\Url;

$this->title = 'Dashboard';
?>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-7.5">

    <?php Card::begin(['title' => 'Welcome to Metronic on Yii2']) ?>
        <p class="text-secondary-foreground text-sm">
            Шаблон Metronic v9 (Tailwind) подключён через пакет
            <code class="kt-input inline-block px-2 py-0.5">carono/yii2-metronic</code>.
            Layout — demo3 (sidebar). Переключитесь на demo9 кнопкой ниже.
        </p>
        <div class="mt-4 flex gap-2 flex-wrap">
            <?= Btn::a('Открыть demo9', ['site/topnav'], ['variant' => 'primary']) ?>
            <?= Btn::a('Компоненты', ['site/components'], ['variant' => 'outline']) ?>
            <?= Btn::a('Логин-форма', ['site/login'], ['variant' => 'ghost']) ?>
        </div>
    <?php Card::end() ?>

    <?php Card::begin(['title' => 'Статус']) ?>
        <div class="flex flex-col gap-2 text-sm">
            <div class="flex items-center justify-between">
                <span>Конфигурация</span>
                <?= Badge::widget(['label' => 'OK', 'variant' => 'success']) ?>
            </div>
            <div class="flex items-center justify-between">
                <span>Asset Manager</span>
                <?= Badge::widget(['label' => 'OK', 'variant' => 'success']) ?>
            </div>
            <div class="flex items-center justify-between">
                <span>npm-asset/apexcharts</span>
                <?= Badge::widget(['label' => 'OK', 'variant' => 'success']) ?>
            </div>
        </div>
    <?php Card::end() ?>

    <?php Card::begin(['title' => 'Quick links']) ?>
        <ul class="text-sm flex flex-col gap-2">
            <li><a class="hover:text-primary" href="<?= Url::to(['site/about']) ?>">About</a></li>
            <li><a class="hover:text-primary" href="<?= Url::to(['site/contact']) ?>">Contact</a></li>
            <li><a class="hover:text-primary" href="<?= Url::to(['site/components']) ?>">Components</a></li>
        </ul>
    <?php Card::end() ?>

</div>
