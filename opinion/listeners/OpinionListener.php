<?php

use yupe\components\Event;

class OpinionListener
{
    public static function onCreate(Event $event)
    {
        $opinion = $event->getOpinion();
        $templateMail = $event->getTemplateMail();

        Yii::app()->opinionNotifyService->sendOpinionAdminNotify($opinion, $templateMail);
    }

    public static function onPublished(Event $event)
    {
        $opinion = $event->getOpinion();
        $templateMail = $event->getTemplateMail();

        Yii::app()->opinionNotifyService->SendOpinionPublishedUserNotify($opinion, $templateMail);

    }
}
