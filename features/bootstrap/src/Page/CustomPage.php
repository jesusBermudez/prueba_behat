<?php
namespace src\Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class CustomPage extends Page
{

    /**
     * @param $elementCssSelector
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function showElementWithJS($elementCssSelector)
    {
        $this->getDriver()->evaluateScript(
            "jQuery('".$elementCssSelector."').show();"
        );
    }

    /**
     * @param $elementCssSelector
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function getTextElementWithJS($elementCssSelector)
    {
        $this->getDriver()->evaluateScript(
            "jQuery('".$elementCssSelector."').click();"
        );
    }

    /**
     * @param $element
     *
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function deleteElementWithJS($element)
    {
        if ($this->hasElement($element)) {
            $this->getDriver()->evaluateScript(
                "jQuery('".$this->elements[$element]['css']."').remove();"
            );
        }
    }

    /**
     * @param $element
     * @param $value
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function setElementValueWithJS($element, $value)
    {
        $this->getDriver()->evaluateScript(
            "jQuery('".$this->elements[$element]['css']."').val('".$value."');"
        );
    }

    /**
     * @param $element
     *
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function focusElementWithJS($element)
    {
        if ($this->hasElement($element)) {
            $this->getDriver()->evaluateScript(
                "jQuery('".$this->elements[$element]['css']."').focus();"
            );
        }
    }

    /**
     * @param $element
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function clickElementWithJS($element)
    {
        $this->getDriver()->evaluateScript(
            "jQuery('".$this->elements[$element]['css']."').click();"
        );
    }

    /**
     * @param $timeToWait
     * @param bool $condition
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function iWait($timeToWait, $condition = false)
    {
        $this->getDriver()->wait(($timeToWait * 1000), $condition);
    }

    /**
     * @param $time
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function iWaitForAjaxToFinish($time)
    {
        $condition = '(typeof(jQuery)=="undefined" ||'.
            ' (0 === jQuery.active && 0 === jQuery(\':animated\').length))';
        $this->iWait($time, $condition);
    }

    /**
     * @param array $urlParameters
     *
     * @return Page
     */
    public function open(array $urlParameters = array())
    {
        $url = $this->getUrl($urlParameters);
        $this->getSession()->visit($url);
        $this->verify($urlParameters);

        return $this;
    }

    /**
     * @param $element
     * @param $selector
     * @param $time
     *
     * @return bool
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function waitForElementAppears($element, $selector, $time)
    {
        $waitTime = 0;
        while (($this->find($selector, $element) == null) && $waitTime < $time) {
            $this->iWait(0.5);
            $waitTime += 0.5;
        }

        if ($waitTime == $time) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $element
     * @param $selector
     * @param $time
     *
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     *
     * @return bool
     */
    public function waitForElementNotAppears($element, $selector, $time)
    {
        $waitTime = 0;
        while (($this->find($selector, $element)->isVisible() == true) && $waitTime < $time) {
            $this->iWait(0.5);
            $waitTime += 0.5;
        }

        if ($waitTime == $time) {
            return false;
        } else {
            return true;
        }
    }
}