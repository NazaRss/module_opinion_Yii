<?php

namespace application\modules\opinion\components;

class mailTemplate
{

    public static function getModeratorMailTemplate($model)
    {
        if ($model->status_opinion == 1) {

            return $templateMail = $this->renderPartial('mailTemplate', [
            'status_opinion' => $model->status_opinion
            ], true);

        } else {

            return $templateMail = $this->renderPartial('mailTemplate', [
                'status_opinion' => $model->status_opinion,
                'moderation_decision' => $model->moderation_decision
            ], true);
        }

    }




}
