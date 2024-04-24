<?php
namespace En1gma4\FastpayBundle\Models\Initiate;

use InvalidArgumentException;

class InitiatePayment
{

    /**
     * @var string The unique identifier for the order. Must be between 8-32 characters.
     */
    private $order_id;

    /**
     * @var int The amount to be billed for the order.
     */
    private $bill_amount;

    /**
     * @var string The currency in which the bill amount is specified. This should be "IQD" always.
     */
    private $currency;

    /**
     * @var string Details of the items in the cart.
     */
    private $cart;


    /**
     * Gets the order ID.
     *
     * @return string The order ID.
     */
    public function getOrderId(): string
    {
        return $this->order_id;
    }

    /**
     * Sets the order ID.
     *
     * @param string $order_id The order ID to set.
     * @throws InvalidArgumentException If the order ID length is invalid.
     */
    public function setOrderId(string $order_id): void
    {
        if (strlen($order_id) >= 8 && strlen($order_id) <= 32) {
            $this->order_id = $order_id;
        } else {
            throw new InvalidArgumentException('Order ID must be between 8 and 32 characters.');
        }
    }

    /**
     * Gets the bill amount.
     *
     * @return int The bill amount.
     */
    public function getBillAmount(): int
    {
        return $this->bill_amount;
    }

    /**
     * Sets the bill amount.
     *
     * @param int $bill_amount The bill amount to set.
     */
    public function setBillAmount(int $bill_amount): void
    {
        $this->bill_amount = $bill_amount;
    }

    /**
     * Gets the currency.
     *
     * @return string The currency.
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Sets the currency.
     *
     * @param string $currency The currency to set.
     * @throws InvalidArgumentException If the currency is invalid.
     */
    public function setCurrency(string $currency): void
    {
        if ($currency === 'IQD') {
            $this->currency = $currency;
        } else {
            throw new InvalidArgumentException('Currency must be "IQD".');
        }
    }

    /**
     * Gets the cart details.
     *
     * @return string The cart details.
     */
    public function getCart(): string
    {
        return $this->cart;
    }

    /**
     * Sets the cart details.
     *
     * @param string $cart The cart details to set.
     */
    public function setCart(string $cart): void
    {
        $this->cart = $cart;
    }


}