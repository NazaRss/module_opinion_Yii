<?php
/**
 * Отображение для index:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   NR
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     https://yupe.ru
 **/
$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('OpinionModule.opinion', 'Отзывы') => ['/opinion/opinionBackend/index'],
    Yii::t('OpinionModule.opinion', 'Управление'),
];

$this->pageTitle = Yii::t('OpinionModule.opinion', 'Отзывы - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('OpinionModule.opinion', 'Управление Отзывы'), 'url' => ['/opinion/opinionBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('OpinionModule.opinion', 'Добавить Отзыв'), 'url' => ['/opinion/opinionBackend/create']],
];
?>
<div class="page-header">
    <h1>
        <?=  Yii::t('OpinionModule.opinion', 'Отзывы'); ?>
        <small><?=  Yii::t('OpinionModule.opinion', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?=  Yii::t('OpinionModule.opinion', 'Поиск Отзывы');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('opinion-model-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?=  Yii::t('OpinionModule.opinion', 'В данном разделе представлены средства управления Отзывы'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id'           => 'opinion-model-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'name',
            'surname',
            'patronymic',
            'email',
            'phone',
//            'city_id',
//            'experience',
//            'advantage',
//            'limitations',
//            'comment',
            'status_opinion',
//            'rating',
            'product_id',
//            'dateCreate',
//            'rating_opinion',
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
            ],
        ],
    ]
); ?>
