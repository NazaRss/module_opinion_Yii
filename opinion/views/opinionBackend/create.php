<?php
/**
 * Отображение для create:
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
    Yii::t('OpinionModule.opinion', 'Добавление'),
];

$this->pageTitle = Yii::t('OpinionModule.opinion', 'Отзывы - добавление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('OpinionModule.opinion', 'Управление Отзывы'), 'url' => ['/opinion/opinionBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('OpinionModule.opinion', 'Добавить Отзыв'), 'url' => ['/opinion/opinionBackend/create']],
];
?>

<div class="page-header">
    <h1>
        <?=  Yii::t('OpinionModule.opinion', 'Отзывы'); ?>
        <small><?=  Yii::t('OpinionModule.opinion', 'добавление'); ?></small>
    </h1>
</div>

<?=  $this->renderPartial('_form', ['model' => $model]); ?>