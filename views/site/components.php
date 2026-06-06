<?php

declare(strict_types=1);

/** @var \yii\web\View $this */

use app\helpers\metronic\Btn;
use app\helpers\metronic\Media;
use app\widgets\metronic\Alert;
use app\widgets\metronic\Avatar;
use app\widgets\metronic\Badge;
use app\widgets\metronic\Card;
use app\widgets\metronic\Drawer;
use app\widgets\metronic\Modal;
use app\widgets\metronic\Tabs;

$this->title = 'Components';
?>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-5 lg:gap-7.5">

    <?php Card::begin(['title' => 'Buttons']) ?>
        <div class="flex flex-wrap gap-2">
            <?= Btn::submit('Primary', ['variant' => 'primary']) ?>
            <?= Btn::submit('Secondary', ['variant' => 'secondary']) ?>
            <?= Btn::submit('Outline', ['variant' => 'outline']) ?>
            <?= Btn::submit('Ghost', ['variant' => 'ghost']) ?>
            <?= Btn::submit('Destructive', ['variant' => 'destructive']) ?>
            <?= Btn::submit('Success', ['variant' => 'success']) ?>
            <?= Btn::icon(['variant' => 'outline', 'icon' => 'ki-filled ki-trash']) ?>
        </div>
    <?php Card::end() ?>

    <?php Card::begin(['title' => 'Badges']) ?>
        <div class="flex flex-wrap gap-2">
            <?= Badge::widget(['label' => 'Primary', 'variant' => 'primary']) ?>
            <?= Badge::widget(['label' => 'Success', 'variant' => 'success']) ?>
            <?= Badge::widget(['label' => 'Info', 'variant' => 'info']) ?>
            <?= Badge::widget(['label' => 'Warning', 'variant' => 'warning']) ?>
            <?= Badge::widget(['label' => 'Danger', 'variant' => 'destructive']) ?>
            <?= Badge::widget(['label' => 'Outline', 'variant' => 'outline']) ?>
        </div>
    <?php Card::end() ?>

    <?php Card::begin(['title' => 'Avatars']) ?>
        <div class="flex items-center gap-3 flex-wrap">
            <?= Avatar::widget(['src' => Media::url('avatars/300-1.png'), 'size' => 'size-8']) ?>
            <?= Avatar::widget(['src' => Media::url('avatars/300-2.png'), 'size' => 'size-10', 'status' => 'online']) ?>
            <?= Avatar::widget(['src' => Media::url('avatars/300-3.png'), 'size' => 'size-12', 'status' => 'offline']) ?>
            <?= Avatar::widget(['src' => Media::url('avatars/300-4.png'), 'size' => 'size-14']) ?>
            <?= Avatar::widget(['initials' => 'JD', 'size' => 'size-10']) ?>
            <?= Avatar::widget(['initials' => 'AS', 'size' => 'size-12', 'status' => 'online']) ?>
        </div>
    <?php Card::end() ?>

    <?php Card::begin(['title' => 'Modal / Drawer']) ?>
        <div class="flex gap-2 flex-wrap">
            <?php Modal::begin([
                'id' => 'demo_modal',
                'title' => 'Demo modal',
                'toggleButton' => ['label' => 'Открыть modal', 'class' => 'kt-btn kt-btn-primary'],
                'footer' => Btn::submit('OK', ['variant' => 'primary']),
            ]) ?>
                <p class="text-sm text-secondary-foreground">Это пример модального окна на KTUI.</p>
            <?php Modal::end() ?>

            <?php Drawer::begin([
                'id' => 'demo_drawer',
                'placement' => 'end',
                'title' => 'Demo drawer',
                'toggleButton' => ['label' => 'Открыть drawer', 'class' => 'kt-btn kt-btn-outline'],
            ]) ?>
                <p class="text-sm text-secondary-foreground">Боковая панель открывается справа.</p>
            <?php Drawer::end() ?>
        </div>
    <?php Card::end() ?>

    <div class="lg:col-span-2">
        <?php Card::begin(['title' => 'Tabs']) ?>
            <?= Tabs::widget([
                'items' => [
                    ['label' => 'Overview', 'content' => '<p class="text-sm">Краткий обзор страницы и метрик.</p>', 'active' => true],
                    ['label' => 'Activity', 'content' => '<p class="text-sm">Журнал последних действий.</p>'],
                    ['label' => 'Settings', 'content' => '<p class="text-sm">Настройки модуля.</p>'],
                ],
            ]) ?>
        <?php Card::end() ?>
    </div>

    <div class="lg:col-span-2">
        <?= Alert::widget() ?>
    </div>

</div>
