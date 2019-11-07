<?php
/**
 * Отображение для _form:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     https://yupe.ru
 *
 *   @var $model opinionBackend
 *   @var $form TbActiveForm
 *   @var $this OpinionBackendController
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id'                     => 'opinion-model-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'htmlOptions'            => ['class' => 'well'],
    ]
);
?>

<div class="alert alert-info">
    <?=  Yii::t('OpinionModule.opinion', 'Поля, отмеченные'); ?>
    <span class="required">*</span>
    <?=  Yii::t('OpinionModule.opinion', 'обязательны.'); ?>
</div>

<?=  $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textFieldGroup($model, 'name', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('name'),
                        'data-content' => $model->getAttributeDescription('name')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textFieldGroup($model, 'surname', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('surname'),
                        'data-content' => $model->getAttributeDescription('surname')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textFieldGroup($model, 'patronymic', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('patronymic'),
                        'data-content' => $model->getAttributeDescription('patronymic')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textFieldGroup($model, 'email', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('email'),
                        'data-content' => $model->getAttributeDescription('email')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textFieldGroup($model, 'phone', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('phone'),
                        'data-content' => $model->getAttributeDescription('phone')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textFieldGroup($model, 'city_id', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('city_id'),
                        'data-content' => $model->getAttributeDescription('city_id')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textFieldGroup($model, 'experience', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('experience'),
                        'data-content' => $model->getAttributeDescription('experience')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textAreaGroup($model, 'advantage', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'rows' => 6,
                    'cols' => 50,
                    'data-original-title' => $model->getAttributeLabel('advantage'),
                    'data-content' => $model->getAttributeDescription('advantage')
                ]
            ]]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textAreaGroup($model, 'limitations', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'rows' => 6,
                    'cols' => 50,
                    'data-original-title' => $model->getAttributeLabel('limitations'),
                    'data-content' => $model->getAttributeDescription('limitations')
                ]
            ]]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textAreaGroup($model, 'comment', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'rows' => 6,
                    'cols' => 50,
                    'data-original-title' => $model->getAttributeLabel('comment'),
                    'data-content' => $model->getAttributeDescription('comment')
                ]
            ]]); ?>
        </div>
    </div>

<div class="row">
    <div class="col-sm-7">
        <p><b>Поставьте оценку товару:</b></p>
        <?= $form->dropDownList($model,'rating', OpinionHelper::getArrayRatingProduct());?>
    </div>
</div>

<br>

    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textFieldGroup($model, 'product_id', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('product_id'),
                        'data-content' => $model->getAttributeDescription('product_id')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textFieldGroup($model, 'dateCreate', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('dateCreate'),
                        'data-content' => $model->getAttributeDescription('dateCreate')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?=  $form->textFieldGroup($model, 'rating_opinion', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('rating_opinion'),
                        'data-content' => $model->getAttributeDescription('rating_opinion')
                    ]
                ]
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-7">
            <p><b>Выберите статус отзыва:</b></p>
            <?= $form->dropDownList($model,'status_opinion', OpinionHelper::getArrayStatusOpinion());?>
        </div>
    </div>

<br>

<div class="row">
    <div class="col-sm-7">
        <p><b>Решение модератора:</b></p>
        <?= $form->dropDownList($model,'moderation_decision', OpinionHelper::getArrayModerationDecision());?>
    </div>
</div>

<!--    <div class="row">-->
<!--        <div class="col-sm-7">-->
<!--            --><?//=  $form->textFieldGroup($model, 'moderation_decision', [
//                'widgetOptions' => [
//                    'htmlOptions' => [
//                        'class' => 'popover-help',
//                        'data-original-title' => $model->getAttributeLabel('Решение модерации, будет отправленое пользователю на его почту'),
//                        'data-content' => $model->getAttributeDescription('Решение модерации, будет отправленое пользователю на его почту')
//                    ]
//                ]
//            ]); ?>
<!--        </div>-->
<!--    </div>-->


<br>

    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('OpinionModule.opinion', 'Сохранить Отзыв и продолжить'),
        ]
    ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
            'label'      => Yii::t('OpinionModule.opinion', 'Сохранить Отзыв и закрыть'),
        ]
    ); ?>

<?php $this->endWidget(); ?>
