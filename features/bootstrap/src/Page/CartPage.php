<?php

namespace src\Page;


class CartPage extends CustomPage
{
    protected $path = '{baseUrl}/gb';

    private $amountDiscount;
    private $amount;
    private $quantity;

    protected $elements = [
        'cartBox' => ['css' => 'div#mainDivBolsa'],
        'AmountDiscountSpan' => ['css' => 'div#mainDivBolsa div[class="row-fluid sbi-price sbi-promo-price"]'],
        'AmountSpan' => ['css' => 'div#mainDivBolsa p[class="box_total_price"]'],
        'quantitySpan' => ['css' => 'span[class="conjunto_numItemsBolsa"]'],
        'removeDiv' => ['css' => 'div#mainDivBolsa div[class="itemRemove"]']
    ];


    /**
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function getDiscountAmount()
    {
        if (!$this->getElement('cartBox')->isVisible()) {
            $this->showElementWithJS('cartBox');
        }

        $this->waitForElementAppears($this->elements['AmountDiscountSpan']['css'], 'css', 30);
        return $this->getTextElementWithJS('AmountDiscountSpan');
    }

    /**
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function getTotalAmount()
    {
        if (!$this->getElement('cartBox')->isVisible()) {
            $this->showElementWithJS('cartBox');
        }

        $this->waitForElementAppears($this->elements['AmountSpan']['css'], 'css', 30);
        return $this->getTextElementWithJS('AmountSpan');
    }

    /**
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function getQuantity()
    {
        if (!$this->getElement('cartBox')->isVisible()) {
            $this->showElementWithJS('cartBox');
        }

        $this->waitForElementAppears($this->elements['quantitySpan']['css'], 'css', 5);
        return $this->getTextElementWithJS('quantitySpan');
    }

    /**
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     * @throws \Exception
     */
    public function checkAmounts()
    {
        $this->amountDiscount = $this->getDiscountAmount();
        $this->amount = $this->getTotalAmount();

        if (!$this->amountDiscount == $this->amount) {
            throw new \Exception('the amounts not equals discount: ' . $this->amountDiscount. ' total: '. $this->amount);
        }
    }

    /**
     * @return string
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     */
    public function removeProductCart()
    {
        if (!$this->getElement('cartBox')->isVisible()) {
            $this->showElementWithJS('cartBox');
        }

        $this->waitForElementAppears($this->elements['removeDiv']['css'], 'css', 30);
        return $this->clickElementWithJS('removeDiv');
    }

    /**
     * @param $estimateQuantity
     * @throws \Behat\Mink\Exception\DriverException
     * @throws \Behat\Mink\Exception\UnsupportedDriverActionException
     * @throws \Exception
     */
    public function checkQuantity($estimateQuantity)
    {
        $this->quantity = $this->getQuantity();

        if (!strstr($this->quantity, $estimateQuantity)) {
            throw new \Exception('the quantity not equal estimate quantity: '. $estimateQuantity. ' espect: '. $this->quantity);
        }
    }


}