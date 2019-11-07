<?php
// namespace application\modules\opinion\widgets;

//use opinion;
//use yupe\widgets\YWidget;

class OpinionWidget extends \yupe\widgets\YWidget
{
    public $productId;

    public function init()
    {
        parent::init();
        // этот метод будет вызван внутри CBaseController::beginWidget()
    }

    public function run()
    {
        // этот метод будет вызван внутри CBaseController::endWidget()

       $model = new opinion;

        if (Yii::app()->getUser()->isAuthenticated())
        {
            $user = Yii::app()->getUser()->getProfile();

            $model->name = $user->first_name;
            $model->surname = $user->last_name;
            $model->patronymic = $user->middle_name;
            $model->email = $user->email;
            $model->phone = $user->phone;
            $model->product_id = $this->productId;
            $model->city_id = Yii::app()->user->getPosition();
        }

       $this->render('opinionWidget', [

           'model' => $model
           ]);

    }
}
