<?php

//namespace application\modules\opinion\helpers;

class OpinionHelper
{
    private static $array_rating_product = [
        '1'=>'Ужасно',
        '2'=>'Плохо',
        '3'=>'Нормально',
        '4'=>'Хорошо',
        '5'=>'Отлично'
    ];

    private static $array_status_opinion = [
        '0'=>'На модерации',
        '1'=>'Опубликован',
        '2'=>'Не опубликован'
    ];

    private static $array_experience_of_use = [
        '0'=>'Менее месяца',
        '1'=>'До года',
        '2'=>'Больше года'
    ];

    private static $array_moderation_decision = [
        '0'=>'Всё впорядке. Отзыв опубликован',
        '1'=>'Спам',
        '2'=>'Оскорбления',
        '3'=>'Внешнии ссылки ведущии на ресурс непристойного или запрещённого содержания',
        '4'=>'Введение в заблуждение',
        '5'=>'Мошенничество',
        '6'=>'Призыв к экстремизму',
    ];

    public static function getArrayRatingProduct()
    {
        return self::$array_rating_product;
    }

    public static function getArrayStatusOpinion()
    {
        return self::$array_status_opinion;
    }

    public static function getArrayExperienceOfUse()
    {
        return self::$array_experience_of_use;
    }

    public static function getArrayModerationDecision()
    {
        return self::$array_moderation_decision;
    }

    public static function getElementArrayModerationDecision($index)
    {
        return self::$array_moderation_decision[$index];
    }

    public static function getElementArrayExperienceOfUse($index)
    {
        return self::$array_experience_of_use[$index];
    }
}
