<?php

    $this->widget(
        'zii.widgets.CListView',
        [
            'dataProvider' => $dataProvider,
            'itemView' => '_item',

            'sorterHeader' => 'Сортировать по:',
            'sortableAttributes' => [
                'id' => 'Новизне',
                'rating' => 'Оценке',
                'experience' => 'Опыту использования'
            ],
            'summaryText' => '',

            'emptyText' => 'У этого товара нет отзывов',


            'pager' => [
                'cssFile' => '\themes\st\web\styles\pagerOpinion.css',
                'header' => false,

                'prevPageLabel' => '&lsaquo;',
                'nextPageLabel' => '&rsaquo;',
            ]
        ]
    ); ?>
