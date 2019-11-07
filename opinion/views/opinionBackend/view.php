<?php
/**
 * Отображение для view:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     https://yupe.ru
 **/
$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('OpinionModule.opinion', 'Отзывы') => ['/opinion/opinionBackend/index'],
    $model->name,
];

$this->pageTitle = Yii::t('OpinionModule.opinion', 'Отзывы - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('OpinionModule.opinion', 'Управление Отзывы'), 'url' => ['/opinion/opinionBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('OpinionModule.opinion', 'Добавить Отзыв'), 'url' => ['/opinion/opinionBackend/create']],
    ['label' => Yii::t('OpinionModule.opinion', 'Отзыв') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('OpinionModule.opinion', 'Редактирование Отзыв'), 'url' => [
        '/opinion/opinionBackend/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('OpinionModule.opinion', 'Просмотреть Отзыв'), 'url' => [
        '/opinion/opinionBackend/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('OpinionModule.opinion', 'Удалить Отзыв'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/opinion/opinionBackend/delete', 'id' => $model->id],
        'confirm' => Yii::t('OpinionModule.opinion', 'Вы уверены, что хотите удалить Отзыв?'),
        'csrf' => true,
    ]],
];
?>

<div class="page-header">
    <h1>
        <?=  Yii::t('OpinionModule.opinion', 'Просмотр') . ' ' . Yii::t('OpinionModule.opinion', 'Отзыв'); ?>        <br/>
        <small>&laquo;<?=  $model->name; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        'name',
        'surname',
        'patronymic',
        'email',
        'phone',
        'city_id',
        'experience',
        'advantage',
        'limitations',
        'comment',
        'status_opinion',
        'rating',
        'product_id',
        'dateCreate',
        'rating_opinion',
    ],
]); ?>
