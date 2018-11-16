<?php

namespace src\Page;


class ProductSheetPage extends CustomPage
{
    protected $path = '{baseUrl}/gb';
    protected $elements = [
        'addProductButton' => ['css' => 'button#productFormAdd'],
    ];

    /**
     * @param $quantity
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function setQuantityProduct($quantity)
    {
        for ($x = 1; $x < $quantity; $x ++) {
            $this->iWait(5);
            $this->waitForElementAppears($this->elements['addProductButton']['css'], 'css', 30);
            $this->clickElementWithJS('addProductButton');
        }
    }


}