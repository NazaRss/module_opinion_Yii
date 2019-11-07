<?php

use yupe\components\controllers\FrontController;

class OpinionNotifyService extends CApplicationComponent
{
    public function sendOpinionAdminNotify(Opinion $opinion, $mailBody)
    {
        $mailTheme = '[НОВЫЙ ОТЗЫВ К ТОВАРУ] Оставили новый отзыв';

//        mail(Указать почтовый адрес, $mailTheme, $mailBody);
    }

    public function SendOpinionPublishedUserNotify(Opinion $opinion, $mailBody)
    {
        //$templateMail = $this->renderPartial('mailTemplate', [
//                        'status_opinion' => $model->status_opinion
//                            ], true);

        if ($opinion->status_opinion == 1) {

            $mailTheme = 'Ваш отзыв на сайте "Сеть техники" опубликован';

        } elseif ($opinion->status_opinion == 2){

            $mailTheme = 'Ваш отзыв на сайте "Сеть техники" не опубликован';
        }

//        mail($opinion->email, $mailTheme, $mailBody);
    }

}
