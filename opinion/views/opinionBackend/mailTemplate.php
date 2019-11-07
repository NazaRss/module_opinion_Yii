<? if ($status_opinion == 1):?>

Здравствуйте,

Ваш отзыв на сайте Сеть техники (https://set-tehniki.com/) опубликован.

<? elseif ($status_opinion == 2):?>

Здравствуйте,

Ваш отзыв на сайте Сеть техники (https://set-tehniki.com/) не опубликован.

Причина: <?=OpinionHelper::getElementArrayModerationDecision($moderation_decision);?>

<? endif?>
