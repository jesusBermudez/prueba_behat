<?php

namespace src;

trait BrowserOperator
{
    /**
     * @var array
     */
    protected $parameters = [];

    protected $browserMob;
    private $waitCause;

    /**
     * @param $time int in seconds
     */
    public function iWaitForAjaxToFinish($time)
    {
        $condition = '(typeof(jQuery)=="undefined" || (0 === jQuery.active && 0 === jQuery(\':animated\').length))';
        $this->waitCause = $this->getSession()->wait(($time * 1000), $condition);
    }
}
