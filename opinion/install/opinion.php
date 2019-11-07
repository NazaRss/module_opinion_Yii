<?php
/**
 * Файл настроек для модуля opinion
 *
 * @author yupe team <team@yupe.ru>
 * @link https://yupe.ru
 * @copyright 2009-2019 amyLabs && Yupe! team
 * @package yupe.modules.opinion.install
 * @since 0.1
 *
 */
return [
    'module'    => [
        'class' => 'application.modules.opinion.OpinionModule',
    ],
    'import'    => [],
    'component' => [],
    'rules'     => [
        '/opinion' => 'opinion/opinion/index',
    ],
];