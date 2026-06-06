<?php

declare(strict_types=1);

/**
 * Layout demo3 — sidebar + header + navbar.
 * Импорты — из проектного namespace app\widgets\metronic\*, который наследует виджеты
 * пакета carono/yii2-metronic. Меняйте/расширяйте проектные виджеты по необходимости.
 *
 * @var \yii\web\View $this
 * @var string $content
 */

use app\widgets\metronic\Footer;
use app\widgets\metronic\Header;
use app\widgets\metronic\Navbar;
use app\widgets\metronic\Sidebar;
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
$sidebarItems = $params['metronic.sidebar'] ?? [];
$navbarItems = $params['metronic.navbar'] ?? [];
$accountMenu = $params['metronic.accountMenu'] ?? [];
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
<body class="antialiased flex h-full text-base text-foreground bg-background [--header-height:58px] [--sidebar-width:58px] [--navbar-height:56px] lg:overflow-hidden bg-muted">
<?php $this->beginBody() ?>

<div class="flex grow">
    <?= Header::widget([
        'layout' => 'demo3',
        'brand' => $brand,
        'accountMenu' => $accountMenu,
        'userMenu' => $userMenu,
    ]) ?>

    <div class="flex flex-col lg:flex-row grow pt-(--header-height)">
        <?= Sidebar::widget(['items' => $sidebarItems]) ?>

        <?= Navbar::widget(['items' => $navbarItems]) ?>

        <div class="flex grow rounded-b-xl bg-background border-x border-b border-input lg:mt-(--navbar-height) mx-5 lg:ms-(--sidebar-width) mb-5">
            <div class="flex flex-col grow kt-scrollable-y lg:[scrollbar-width:auto] pt-7 lg:[&_.kt-container-fluid]:pe-4" id="scrollable_content">
                <main class="grow" role="content">
                    <div class="kt-container-fluid">
                        <?= $content ?>
                    </div>
                </main>

                <?= Footer::widget(['layout' => 'demo3', 'links' => $footerLinks]) ?>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
