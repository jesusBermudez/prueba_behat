<?php
namespace src\Page\Element;

use \src\Page\CustomPage;

class SearchBar extends CustomPage
{
    protected $elements = [
        'searchIconSpan' => ['css' => 'span[class="menu-search-icon"]'],
        'searchInput' => ['css' => 'input[class="search-input"]'],
        'cartBox' => ['css' => 'div#mainDivBolsa'],
        'popup' => ['css' => 'div[class="container-content"]']
    ];

    /**
     * @param $text
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function search($text)
    {
        $this->waitForElementAppears($this->elements['popup']['css'], 'css', 30);
        $this->deleteElementWithJS('popup');
        $this->waitForElementAppears($this->elements['searchIconSpan']['css'], 'css', 30);
        $this->clickElementWithJS('searchIconSpan');
        $this->waitForElementAppears($this->elements['searchInput']['css'], 'css', 30);
        $this->focusElementWithJS('searchInput');
        $this->setElementValueWithJS('searchInput', $text);
        $this->iWaitForAjaxToFinish(5);
    }

    /**
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function showCart()
    {
        $this->waitForElementAppears($this->elements['popup']['css'], 'css', 30);
        $this->deleteElementWithJS('popup');
        $this->waitForElementAppears($this->elements['cartBox']['css'], 'css', 30);
        $this->showElementWithJS('cartBox');
    }
}