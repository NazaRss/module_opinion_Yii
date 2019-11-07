<?php

class OutputOpinions extends CApplicationComponent
{
    private const STATUS_MODERATION = 0;
    private const STATUS_ALLOWED = 1;
    private const STATUS_REFUSED = 2;

    public function getOpinionsApproved(int $productId)
    {
        $criteria = new CDbCriteria([
            'select' => 't.*',
            'condition' => "product_id = $productId AND status_opinion = " . self::STATUS_ALLOWED,
        ]);

        $dataProvider = new CActiveDataProvider('opinion', [
                'criteria' => $criteria,
                'pagination' => array(
                    'pageSize' => 5,
                ),
//                'sort' => array(
                //атрибуты по которым происходит сортировка
//                    'attributes'=>array(
//                        'rating'=>array(
//                            'asc'=>'rating ASC',
//                            'desc'=>'rating DESC',
//                            //по умолчанию, сортируем поле rating по убыванию (desc)
//                            'default'=>'asc',
//                        ),
//                        'id'=>array(
//                            'asc'=>'id ASC',
//                            'desc'=>'id DESC',
//                            'default'=>'asc',
//                        )
//                    ),
//                )
            ]
        );

        return $dataProvider;
    }
}
