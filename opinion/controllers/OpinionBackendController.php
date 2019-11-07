<?php
/**
* Класс opinionController:
*
*   @category Yupe\yupe\components\controllers\BackController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     https://yupe.ru
**/
class OpinionBackendController extends \yupe\components\controllers\BackController
{
    /**
     * Управление Отзывы.
     *
     * @return void
     */
    public function actionIndex()
    {
        $model = new opinion('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('opinion') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('opinion'));
        $this->render('index', ['model' => $model]);
    }
    
    /**
    * Отображает Отзыв по указанному идентификатору
    *
    * @param integer $id Идинтификатор Отзыв для отображения
    *
    * @return void
    */
    public function actionView($id)
    {
        $this->render('view', ['model' => $this->loadModel($id)]);
    }
    
    /**
    * Создает новую модель Отзыв.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate()
    {
        $model = new opinion;

        //POST
        if (Yii::app()->getRequest()->getPost('opinion') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('opinion'));
        
            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('OpinionModule.opinion', 'Запись добавлена!')
                );

                $this->redirect(
                    (array)Yii::app()->getRequest()->getPost(
                        'submit-type',
                        [
                            'update',
                            'id' => $model->id
                        ]
                    )
                );
            }
        }
        $this->render('create', ['model' => $model]);
    }
    
    /**
    * Редактирование Отзыв.
    *
    * @param integer $id Идинтификатор Отзыв для редактирования
    *
    * @return void
    */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (Yii::app()->getRequest()->getPost('opinion') !== null) {

            $model->setAttributes(Yii::app()->getRequest()->getPost('opinion'));

            if ($model->save()) {

                if ($model->status_opinion == 1)
                {
                    Yii::app()->commonRating->getCommonRatingOfProduct($model->product_id);

                    Yii::app()->mailTemplate->getModeratorMailTemplate($model);

                    $templateMail = $this->renderPartial('mailTemplate', [
                        'status_opinion' => $model->status_opinion
                            ], true);

                    Yii::app()->eventManager->fire(OpinionEvents::PUBLISHED_OPINION, new OpinionEvent($model, $templateMail));

                } elseif ($model->status_opinion == 2) {

                    Yii::app()->mailTemplate->getModeratorMailTemplate($model);

                    $templateMail = $this->renderPartial('mailTemplate', [
                        'status_opinion' => $model->status_opinion,
                        'moderation_decision' => $model->moderation_decision
                        ], true);

                    Yii::app()->eventManager->fire(OpinionEvents::PUBLISHED_OPINION, new OpinionEvent($model, $templateMail));
                }

                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('OpinionModule.opinion', 'Запись обновлена!')
                );

                $this->redirect(
                    (array)Yii::app()->getRequest()->getPost(
                        'submit-type',
                        [
                            'update',
                            'id' => $model->id
                        ]
                    )
                );
            }
        }
        $this->render('update', ['model' => $model]);
    }
    
    /**
    * Удаляет модель Отзыв из базы.
    * Если удаление прошло успешно - возвращется в index
    *
    * @param integer $id идентификатор Отзыв, который нужно удалить
    *
    * @return void
    */
    public function actionDelete($id)
    {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            // поддерживаем удаление только из POST-запроса
            $this->loadModel($id)->delete();

            Yii::app()->user->setFlash(
                yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                Yii::t('OpinionModule.opinion', 'Запись удалена!')
            );

            // если это AJAX запрос ( кликнули удаление в админском grid view), мы не должны никуда редиректить
            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                $this->redirect(Yii::app()->getRequest()->getPost('returnUrl', ['index']));
            }
        } else
            throw new CHttpException(400, Yii::t('OpinionModule.opinion', 'Неверный запрос. Пожалуйста, больше не повторяйте такие запросы'));
    }
    
    /**
    * Возвращает модель по указанному идентификатору
    * Если модель не будет найдена - возникнет HTTP-исключение.
    *
    * @param integer идентификатор нужной модели
    *
    * @return void
    */
    public function loadModel($id)
    {
        $model = opinion::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('OpinionModule.opinion', 'Запрошенная страница не найдена.'));

        return $model;
    }
}
