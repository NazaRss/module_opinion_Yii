<?php

use yupe\components\controllers\FrontController;

Yii::import('application.modules.store.controllers.ProductController');

class opinionController extends FrontController
{
    public function actionIndex()
    {
        $model = new opinion;

        $model->dateCreate = time();

        if (Yii::app()->getRequest()->getIsPostRequest() || Yii::app()->getRequest()->getIsAjaxRequest()) {
          //POST
            if (Yii::app()->getRequest()->getPost('opinion') !== null) {

                $model->setAttributes(Yii::app()->getRequest()->getPost('opinion'));

                if ($model->save()) {
                    $data['success'] = 'Отзыв отправлен, ожидает проверки модератора';
                    echo json_encode($data);

                    $templateMail = $this->renderPartial('mailTemplate',[], true);

                    Yii::app()->eventManager->fire(OpinionEvents::CHECK_NEW_OPINION, new OpinionEvent($model, $templateMail));

                    exit();

                } else {
                    echo CActiveForm::validate($model);
                    exit();
                }
            }
        } else {
            throw new CHttpException(404, 'Запрашиваемая страница не существует.');
        }
    }

    public function actionVotes()
    {
        if (Yii::app()->getRequest()->getIsPostRequest() || Yii::app()->getRequest()->getIsAjaxRequest()) {

            if (Yii::app()->getUser()->isAuthenticated()) {
                $user = Yii::app()->getUser()->getProfile();
                $idOpinion = Yii::app()->getRequest()->getPost('opinion');

                $valueButton = explode('=', Yii::app()->getRequest()->requestUri);

                $fromBase = Yii::app()->votesOpinion->checkUserVote($user->id, $idOpinion[id]);

                if ($fromBase) {
                    $data['successError'] = 'Вы больше не можете проголосовать за этот отзыв!';
                    echo json_encode($data);

                } elseif ($valueButton[1] == 1) {

                    Yii::app()->votesOpinion->refreshVotes($valueButton[1], $user->id, $idOpinion[id]);

                    $data['successVotesPlus'] = 'Вы проголосовали за этот отзыв +1!';
                    $data['id'] = $idOpinion[id];
                    echo json_encode($data);

                } else {

                    Yii::app()->votesOpinion->refreshVotes($valueButton[1], $user->id, $idOpinion[id]);

                    $data['successVotesMinus'] = 'Вы проголосовали за этот отзыв -1!';
                    $data['id'] = $idOpinion[id];
                    echo json_encode($data);
                }
            } else {
                $data['successError'] = 'Для того чтобы проголосовать за отзыв, необходимо авторизоваться!';
                echo json_encode($data);
            }
        } else {
            throw new CHttpException(404, 'Запрашиваемая страница не существует.');
        }

    }

}

