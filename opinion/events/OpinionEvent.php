<?php

use yupe\components\Event;

class OpinionEvent extends Event
{
    protected $opinion;
    protected $templateMail;

    public function getOpinion()
    {
        return $this->opinion;
    }

    public function getTemplateMail()
    {
        return $this->templateMail;
    }

//    public function setOpinion($opinion)
//    {
//        $this->opinion = $opinion;
//    }

    public function __construct(Opinion $opinion, $templateMail)
    {
        $this->opinion = $opinion;
        $this->templateMail = $templateMail;
    }
}
