<? $arrayRusMonths = [
    'января',
    'февраля',
    'марта',
    'апреля',
    'мая',
    'июня',
    'июля',
    'августа',
    'сентября',
    'октября',
    'ноября',
    'декабря'
];

$month = date('n', $data->dateCreate)-1;

    $outDate = date('d', $data->dateCreate) . ' ' . $arrayRusMonths[$month] . ' ' . date('Y', $data->dateCreate);

?>

        <div class="card-reviews__item">
            <div class="card-reviews__user">
                <div class="card-rev__user__stars clearfix">

                    <?
                    $starFull = '<div class="prodItem__stars-item active"><i class="ico star-active"></i></div>';
                    $starEmpty = '<div class="prodItem__stars-item"><i class="ico star"></i></div>';

                    for ($i=0; $i<5; $i++) {
                        if ($i<$data->rating) {
                            echo $starFull;
                        } else {
                            echo $starEmpty;
                        }
                    }

                    ?>
                </div>

                <span class="card-rev__user__name">
                    <?=$data->surname; ?>
                    <?=' ' . $data->name; ?>
                    <?=' ' . $data->patronymic; ?>
                </span>

                <span class="card-rev__user__date"><?=$outDate;?></span>

                <div class="tabFaq__answer-like">
                    <div class="likeCount clearfix">

                        <div class="likeCount-btn-wrap clearfix">

                            <? if ($data->rating_opinion >= 0): ?>
                                <div id="<?=$data->id;?>" class="likeCount-count green"><?=$data->rating_opinion;?></div>
                            <? else:?>
                                <div id="<?=$data->id;?>" class="likeCount-count red"><?=$data->rating_opinion;?></div>
                            <? endif?>

                            <?
                            $form = $this->beginWidget(
                            'bootstrap.widgets.TbActiveForm', [
                            'id'                     => 'opinion-model-vote',
                            'action' => ['/opinion/opinion/votes'],
                            'enableAjaxValidation'   => false,
                            'enableClientValidation' => true,
                            'htmlOptions'            => ['class' => 'well'],
                            ]
                            );
                            ?>
                                <?=  $form->hiddenField($data, 'id'); ?>

                            <?= CHtml::htmlButton('',[
                                    'id' => 'update_plus',
                                    'name' => 'button_plus_minus',
                                    'class' => 'btn-plus',
                                    'value' => '1',
                                    'type' => 'button',

                                    'ajax'=>array(
                                        'type'=>'POST',
                                        'url'=>Yii::app()->createUrl('/opinion/opinion/votes', ['a'=>'1']),
                                        'success'=> 'js: opinionVotesFunction'
                                    ),
                            ]);?>

                            <?= CHtml::htmlButton('',[
                                'id' => 'update_minus',
                                'name' => 'button_plus_minus',
                                'class' => 'btn-minus',
                                'value' => '0',
                                'type' => 'button',

                                'ajax'=>array(
                                    'type'=>'POST',
                                    'url'=>Yii::app()->createUrl('/opinion/opinion/votes', ['a'=>'0']),
                                    'success'=> 'js: opinionVotesFunction'
                                ),
                            ]);?>

                            <?php $this->endWidget(); ?>
                            <script>
                                function opinionVotesFunction(data){
                                    let response = jQuery.parseJSON (data);

                                    if (response.successError) {
                                        alert(response.successError);
                                    }

                                    if (response.successVotesPlus) {
                                        $('#'+response.id).html(function(i, val) {

                                            let ratingOpinion = +val+1;
                                            if (ratingOpinion < 0) {
                                                document.getElementById(response.id).style.color = "red";
                                            } else {
                                                document.getElementById(response.id).style.color = "#54ad2f";
                                            }

                                            return ratingOpinion;
                                        });
                                        alert(response.successVotesPlus);
                                    }

                                    if (response.successVotesMinus) {
                                        $('#'+response.id).html(function(i, val) {

                                            let ratingOpinion = +val-1;
                                            if (ratingOpinion < 0) {
                                                document.getElementById(response.id).style.color = "red";
                                            } else {
                                                document.getElementById(response.id).style.color = "#54ad2f";
                                            }

                                            return ratingOpinion;
                                        });
                                        alert(response.successVotesMinus);
                                    }
                                    console.log(response);
                                }
                            </script>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card-reviews__about">
                <div class="card-rev__about__ttl">Достоинства</div>
                <div class="card-rev__about__txt"><?= $data->advantage?></div>
            </div>

            <div class="card-reviews__about">
                <div class="card-rev__about__ttl">Недостатки</div>
                <div class="card-rev__about__txt"><?= $data->limitations; ?></div>
            </div>

            <div class="card-reviews__about">
                <div class="card-rev__about__ttl">Комментарий</div>
                <div class="card-rev__about__txt"><?= $data->comment; ?></div>
            </div>

            <div class="card-reviews__exp"><span class="exp__word">Опыт: &nbsp;</span><span class="exp__count">

                    <?=OpinionHelper::getElementArrayExperienceOfUse($data->experience)?>

            </div>

        </div>

