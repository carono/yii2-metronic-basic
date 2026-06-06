<?php

declare(strict_types=1);

/**
 * @var \yii\web\View $this
 * @var \yii\data\ArrayDataProvider $dataProvider
 * @var array $detail
 */

use carono\metronic\helpers\Btn;
use carono\metronic\helpers\Media;
use carono\metronic\widgets\Badge;
use carono\metronic\widgets\Card;
use carono\metronic\widgets\DetailView;
use carono\metronic\widgets\GridView;
use carono\metronic\widgets\ItemList;
use carono\metronic\widgets\ListView;
use yii\helpers\Html;

$this->title = 'Grid + Detail';
?>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-7.5">

    <div class="lg:col-span-2">
        <?php Card::begin([
            'title' => 'Users',
            'subtitle' => 'GridView с пагинацией и sort',
            'icon' => 'ki-filled ki-people',
            'variant' => 'grid',
            'toolbar' => Btn::a('Add user', '#', ['variant' => 'primary', 'size' => 'sm']),
            'menu' => [
                ['label' => 'Export CSV', 'icon' => 'ki-filled ki-exit-down', 'url' => '#'],
                ['label' => 'Import', 'icon' => 'ki-filled ki-entrance-left', 'url' => '#'],
                ['label' => 'Settings', 'icon' => 'ki-filled ki-setting-2', 'url' => '#'],
            ],
        ]) ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    'id',
                    'name',
                    'email:email',
                    [
                        'attribute' => 'role',
                        'format' => 'raw',
                        'value' => fn(array $r) => Badge::widget(['label' => $r['role'], 'variant' => 'outline']),
                    ],
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function (array $r) {
                            $variant = match ($r['status']) {
                                'active' => 'success',
                                'invited' => 'info',
                                'banned' => 'destructive',
                                default => 'secondary',
                            };
                            return Badge::widget(['label' => ucfirst($r['status']), 'variant' => $variant]);
                        },
                    ],
                    'created_at:datetime',
                ],
            ]) ?>
        <?php Card::end() ?>
    </div>

    <div class="flex flex-col gap-5 lg:gap-7.5">
        <?php Card::begin([
            'title' => 'User detail',
            'subtitle' => 'DetailView пары label → value',
            'menu' => [
                ['label' => 'Edit', 'icon' => 'ki-filled ki-pencil', 'url' => '#'],
                ['label' => 'Delete', 'icon' => 'ki-filled ki-trash', 'url' => '#'],
            ],
            'footer' => Btn::a('Open profile', '#', ['variant' => 'outline', 'size' => 'sm']),
        ]) ?>
            <?= DetailView::widget([
                'model' => $detail,
                'attributes' => [
                    'id',
                    'name',
                    'email:email',
                    'role',
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => Badge::widget(['label' => ucfirst($detail['status']), 'variant' => 'success']),
                    ],
                    'created_at:datetime',
                ],
            ]) ?>
        <?php Card::end() ?>

        <?php Card::begin(['title' => 'Block List']) ?>
            <div class="text-sm text-foreground mb-3">
                Users on the block list are unable to send chat requests or messages to you.
            </div>
            <?= ItemList::widget([
                'items' => [
                    [
                        'avatar' => Media::url('avatars/300-1.png'),
                        'title' => 'Esther Howard',
                        'subtitle' => '6 commits',
                        'action' => Btn::icon(['variant' => 'ghost', 'icon' => 'ki-filled ki-trash']),
                    ],
                    [
                        'avatar' => Media::url('avatars/300-2.png'),
                        'title' => 'Tyler Hero',
                        'subtitle' => '29 commits',
                        'action' => Btn::icon(['variant' => 'ghost', 'icon' => 'ki-filled ki-trash']),
                    ],
                    [
                        'avatar' => Media::url('avatars/300-3.png'),
                        'title' => 'Arlene McCoy',
                        'subtitle' => '34 commits',
                        'action' => Btn::icon(['variant' => 'ghost', 'icon' => 'ki-filled ki-trash']),
                    ],
                ],
            ]) ?>
        <?php Card::end() ?>
    </div>

    <div class="lg:col-span-2">
        <?php Card::begin(['title' => 'Manage your Data', 'subtitle' => 'ItemList без аватаров — пары title/description + произвольный action']) ?>
            <?= ItemList::widget([
                'items' => [
                    [
                        'title' => 'Only invited People',
                        'subtitle' => 'Invite selected people via email.',
                        'action' => Btn::a('Start', '#', ['variant' => 'outline', 'size' => 'sm']),
                    ],
                    [
                        'title' => 'People with the link',
                        'subtitle' => 'Create a public link for your report.',
                        'action' => Btn::a('Delete', '#', ['variant' => 'outline', 'size' => 'sm']),
                    ],
                    [
                        'title' => 'No one',
                        'subtitle' => 'Reports will be visible only for you.',
                        'action' => Html::checkbox('manage-noone', false, ['class' => 'kt-switch kt-switch-sm']),
                    ],
                ],
            ]) ?>
        <?php Card::end() ?>
    </div>

    <div class="lg:col-span-3">
        <?php Card::begin(['title' => 'Recent users (ListView)', 'subtitle' => 'DataProvider + пагинация + кастомный itemMap']) ?>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemMap' => fn(array $u): array => [
                    'avatar' => Media::url('avatars/300-' . (($u['id'] % 6) + 1) . '.png'),
                    'title' => $u['name'],
                    'subtitle' => $u['email'] . ' · ' . $u['role'],
                    'url' => '#',
                    'action' => Badge::widget([
                        'label' => ucfirst($u['status']),
                        'variant' => match ($u['status']) {
                            'active' => 'success',
                            'invited' => 'info',
                            'banned' => 'destructive',
                            default => 'secondary',
                        },
                    ]),
                ],
            ]) ?>
        <?php Card::end() ?>
    </div>

</div>
