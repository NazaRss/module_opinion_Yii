<?php

//namespace application\modules\opinion\widgets;

class OpinionOutputWidget extends \yupe\widgets\YWidget
{
    public $productId;

    public function init()
    {
        parent::init();
        // этот метод будет вызван внутри CBaseController::beginWidget()
    }

    public function run()
    {
        $dataProvider = Yii::app()->outputOpinions->getOpinionsApproved($this->productId);

        $this->render('opinionOutputWidget', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
