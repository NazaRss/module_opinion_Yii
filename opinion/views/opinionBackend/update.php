<?php
/**
 * Отображение для update:
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
    $model->name => ['/opinion/opinionBackend/view', 'id' => $model->id],
    Yii::t('OpinionModule.opinion', 'Редактирование'),
];

$this->pageTitle = Yii::t('OpinionModule.opinion', 'Отзывы - редактирование');

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
        <?=  Yii::t('OpinionModule.opinion', 'Редактирование') . ' ' . Yii::t('OpinionModule.opinion', 'Отзыв'); ?>        <br/>
        <small>&laquo;<?=  $model->name; ?>&raquo;</small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model]); ?>