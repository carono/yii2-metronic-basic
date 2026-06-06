# Yii2 Metronic Basic

Скелет Yii2-приложения с готовым шаблоном админки **Metronic v9 (Tailwind CSS)** —
доступны два layout-а (sidebar + header), набор виджетов Metronic (Card, GridView, ListView,
ItemList, DetailView, Modal, Drawer, Avatar, Badge, Tabs и др.) и предустановленные npm-зависимости
(apexcharts, jquery, clipboard, canvas-confetti) через asset-packagist.

## Установка

```bash
composer create-project carono/yii2-metronic-basic myapp
cd myapp
php yii serve
```

Откройте `http://localhost:8080`.

Для использования с web-сервером (nginx/Apache) укажите DocumentRoot на `web/`.


## Что внутри

- **Layout demo3** (`@vendor/carono/yii2-metronic/src/views/layouts/demo3`) — фиксированный
  header 58px + вертикальный sidebar с иконками + горизонтальный navbar.
- **Layout demo9** (`@vendor/carono/yii2-metronic/src/views/layouts/demo9`) — sticky header
  78px с горизонтальной мега-навигацией без sidebar.

Пункты меню, бренд, копирайт настраиваются через `config/params.php`:

```php
'metronic.brand' => 'My App',
'metronic.sidebar' => [
    ['label' => 'Dashboard', 'icon' => 'ki-filled ki-chart-line-star', 'url' => ['site/index']],
    ...
],
'metronic.navbar' => [...],
'metronic.topnav' => [...],   // для demo9
'metronic.userMenu' => [...],
'metronic.footerLinks' => [...],
```

## Виджеты Metronic

В контроллерах/views используйте классы из `carono\metronic\widgets`:

```php
use carono\metronic\widgets\{Card, GridView, ListView, ItemList, DetailView, Modal, Drawer,
    Avatar, Badge, Tabs, ActiveForm, Alert, Sidebar, Header, TopNav, Footer, Menu, Breadcrumbs};
use carono\metronic\helpers\{Btn, Media};
```

## Документация шаблона

Документация по пакету Metronic — `vendor/carono/yii2-metronic/README.md` (если опубликован).

## Лицензия

Шаблон Metronic — проприетарный (см. лицензию Keenthemes). Yii2 — BSD-3-Clause.
