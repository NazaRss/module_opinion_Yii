<?php

$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id'                     => 'opinion-model-form',
        'action' => ['/opinion/opinion/index'],
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'htmlOptions'            => ['class' => 'well'],
    ]
);
?>

<?=  $form->errorSummary($model); ?>

        <div class="creater-review-wrapper">
            <div class="creater-review__ttl">
                <h3>Написать отзыв</h3>
            </div>

            <div class="creater-review__val"><span>Ваша оценка</span>
                <div class="star-check clearfix">

                    <div class="star-check__item" data-star="1" title="Ужасно!"><i class="ico big-star"></i></div>
                    <div class="star-check__item" data-star="2" title="Плохо"><i class="ico big-star"></i></div>
                    <div class="star-check__item" data-star="3" title="Нормально"><i class="ico big-star"></i></div>
                    <div class="star-check__item" data-star="4" title="Хорошо"><i class="ico big-star"></i></div>
                    <div class="star-check__item" data-star="5" title="Отлично!"><i class="ico big-star"></i></div>

                </div>
            </div>

            <?= $form->hiddenField($model, 'rating'); ?>
            <?= $form->error($model, 'rating');?>

            <script>
                $('.star-check__item').click(function(){
                    $('#opinion_rating').val($(this).data('star'));
                })
            </script>

            <div class="creater-review__form">
                <form id="reviews-form" class="form-check">

                    <div class="form-group">
                        <div class="control-label">
                            <label class="input-wrap">
                                <?=  $form->textFieldGroup($model, 'name')?>
                                <br>
                                <?=  $form->textFieldGroup($model, 'surname')?>
                                <br>
                                <?=  $form->textFieldGroup($model, 'patronymic')?>
                            </label>
                        </div>
                    </div>

                    <div class="row"></div>

                    <div class="form-group">
                        <div class="control-label">
                            <label class="input-wrap">
                                <?=  $form->textFieldGroup($model, 'phone'); ?>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-label">
                            <label class="input-wrap">
                                <?=  $form->textFieldGroup($model, 'email'); ?>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-label">
                            <label class="input-wrap">
                                <?=  $form->textFieldGroup($model, 'city_id'); ?>
                            </label>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="control-label">
                                <?=$form->dropDownList($model,'experience', OpinionHelper::getArrayExperienceOfUse(),
                                    [
                                     'empty' => 'Опыт использования',
                                     'class' => 'selectpicker form-control'
                                    ]);?>
                        </div>
                    </div>
                    <?=$form->error($model, 'experience');?>
                    <br>
                    <div class="form-group">
                        <div class="control-label">
                            <label class="input-wrap"><span>Достоинства</span>

                                    <?=$form->textAreaGroup($model, 'advantage', [
                                        'widgetOptions' => [
                                            'htmlOptions' => [
                                                'rows' => 6,
                                                'cols' => 50,
                                                'data-original-title' => $model->getAttributeLabel('advantage'),
                                                'data-content' => $model->getAttributeDescription('advantage')
                                            ]
                                        ]]); ?>

                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-label">
                            <label class="input-wrap"><span>Недостатки</span>

                                    <?=$form->textAreaGroup($model, 'limitations', [
                                            'widgetOptions' => [
                                                'htmlOptions' => [
                                                    'rows' => 6,
                                                    'cols' => 50,
                                                    'data-original-title' => $model->getAttributeLabel('limitations'),
                                                    'data-content' => $model->getAttributeDescription('limitations')
                                                ]
                                            ]]); ?>

                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-label">
                            <label class="input-wrap"><span>Комментарий</span>
                                    <?=$form->textAreaGroup($model, 'comment', [
                                        'widgetOptions' => [
                                            'htmlOptions' => [
                                                'rows' => 6,
                                                'cols' => 50,
                                                'data-original-title' => $model->getAttributeLabel('comment'),
                                                'data-content' => $model->getAttributeDescription('comment')
                                            ]
                                        ]]); ?>
                            </label>
                        </div>
                    </div>

                    <div class="row"><?=  $form->hiddenField($model, 'product_id'); ?></div>

                    <?= CHtml::submitButton(Yii::t('UserModule.user', 'Отправить отзыв'), [
                        'id' => 'senFastOrder',
                        'class' => 'button button_orange',
                        'ajax'=>array(
                            'type'=>'POST',
                            'url'=>Yii::app()->createUrl('/opinion/opinion/index'),
                            'success'=> 'js: opinionSendSuccess'
                        )
                    ]);
                    ?>
                </form>
            </div>
        </div>


<?php $this->endWidget(); ?>

<script>
    function opinionSendSuccess(data){
        let response= jQuery.parseJSON (data);
        if (response.success) {
            alert(response.success);
        } else {
            $.each(response, function(key,value) {
                $('#'+key+'_em_').html(''+value).show();
            });
        }
        console.log(response);
    }
</script>
