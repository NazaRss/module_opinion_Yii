<?php

class VotesOpinion extends CApplicationComponent
//class VotesOpinion extends CComponent
{
    public static function checkUserVote($userId, $idOpinion)
    {
        $connection=Yii::app()->db;

        $sql = ("SELECT * FROM {{store_opinion_votes}} WHERE user_id = {$userId} AND opinion_id = {$idOpinion}");
        $fromBASE = $connection->createCommand($sql)->queryAll();

        return $fromBASE;
    }

    public static function refreshVotes($choice, $userId, $idOpinion)
    {
        $connection=Yii::app()->db;

        if ($choice == 1) {

            $sql = ("UPDATE {{store_opinion}} SET rating_opinion=rating_opinion+1 WHERE id={$idOpinion}");
            $connection->createCommand($sql)->execute();

        } else {

            $sql = ("UPDATE {{store_opinion}} SET rating_opinion=rating_opinion-1 WHERE id={$idOpinion}");
            $connection->createCommand($sql)->execute();
        }

        $sql = ("INSERT INTO {{store_opinion_votes}} (user_id, opinion_id) values ({$userId}, {$idOpinion})");
        $connection->createCommand($sql)->execute();
    }
}
