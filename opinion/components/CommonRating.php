<?php

class CommonRating extends CApplicationComponent
//class CommonRating extends CComponent
{
    public static function getCommonRatingOfProduct($product_id)
    {
        $connection=Yii::app()->db;
        $sql = ("SELECT rating FROM {{store_opinion}} WHERE product_id = {$product_id} AND status_opinion = 1");
        $commonRatingQuerySQL=$connection->createCommand($sql)->queryAll();

        $countNumbers = count($commonRatingQuerySQL);

        foreach ($commonRatingQuerySQL as $one)
        {
            (int) $sumOfAllRatings += $one[rating];
        }

        (float) $commonRating = $sumOfAllRatings / $countNumbers;
        $commonRating = round($commonRating, 1);

        $sql = ("UPDATE {{store_product}} SET common_rating={$commonRating}, amount_opinions={$countNumbers} WHERE id={$product_id}");
        $connection->createCommand($sql)->execute();
    }
}
