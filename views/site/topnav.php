<?php

declare(strict_types=1);

/** @var \yii\web\View $this */

use app\helpers\metronic\Btn;
use app\widgets\metronic\Card;

$this->title = 'Demo9 — TopNav';
?>
<div class="grid grid-cols-1 gap-5 lg:gap-7.5">
    <?php Card::begin(['title' => 'Layout demo9']) ?>
        <p class="text-secondary-foreground text-sm">
            Эта страница использует layout <code>demo9</code> — sticky-шапка 78px без бокового sidebar,
            навигация развёрнута горизонтально в TopNav.
        </p>
        <div class="mt-4 flex gap-2 flex-wrap">
            <?= Btn::a('Вернуться на demo3', ['site/index'], ['variant' => 'primary']) ?>
        </div>
    <?php Card::end() ?>
</div>
