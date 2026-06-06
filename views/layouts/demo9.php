<?php

declare(strict_types=1);

/**
 * Layout demo9 — sticky header + horizontal mega-menu, без sidebar.
 *
 * @var \yii\web\View $this
 * @var string $content
 */

use app\widgets\metronic\Footer;
use app\widgets\metronic\Header;
use app\widgets\metronic\TopNav;
use carono\metronic\assets\MetronicAsset;
use yii\helpers\Html;

MetronicAsset::register($this);

$this->registerJs(
    <<<'JS'
(function(){
    var defaultThemeMode = 'light';
    var themeMode;
    if (localStorage.getItem('kt-theme')) {
        themeMode = localStorage.getItem('kt-theme');
    } else if (document.documentElement.hasAttribute('data-kt-theme-mode')) {
        themeMode = document.documentElement.getAttribute('data-kt-theme-mode');
    } else {
        themeMode = defaultThemeMode;
    }
    if (themeMode === 'system') {
        themeMode = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }
    document.documentElement.classList.add(themeMode);
})();
JS,
    \yii\web\View::POS_HEAD,
    'kt-theme-mode'
);

$params = Yii::$app->params;
$brand = $params['metronic.brand'] ?? Yii::$app->name;
$topNavItems = $params['metronic.topnav'] ?? [];
$userMenu = $params['metronic.userMenu'] ?? [];
$footerLinks = $params['metronic.footerLinks'] ?? [];

$this->beginPage();
?>
<!DOCTYPE html>
<html class="h-full" data-kt-theme="true" data-kt-theme-mode="light" dir="ltr" lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="antialiased flex h-full text-base text-foreground bg-background [--header-height:78px]">
<?php $this->beginBody() ?>

<div class="flex grow flex-col in-data-kt-[sticky-header=on]:pt-(--header-height)">
    <?= Header::widget([
        'layout' => 'demo9',
        'brand' => $brand,
        'userMenu' => $userMenu,
    ]) ?>

    <?= TopNav::widget(['items' => $topNavItems]) ?>

    <div class="container-fixed w-full flex px-0">
        <main class="flex flex-col grow" id="content" role="content">
            <div class="mb-5 lg:mb-7.5">
                <div class="kt-container-fixed">
                    <?= $content ?>
                </div>
            </div>

            <?= Footer::widget(['layout' => 'demo9', 'links' => $footerLinks]) ?>
        </main>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
