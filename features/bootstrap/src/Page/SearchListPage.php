<?php

namespace src\Page;


class SearchListPage extends CustomPage
{
    protected $path = '{baseUrl}/gb/search?kw={wordSearch}';
    protected $elements = [
        'productItem' => ['css' => 'img[class="product-list-image lazy-loaded"]'],
    ];


    /**
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function selectProduct()
    {
        $this->waitForElementAppears($this->elements['productItem']['css'], 'css', 30);
        $this->clickElementWithJS('productItem');
    }
}