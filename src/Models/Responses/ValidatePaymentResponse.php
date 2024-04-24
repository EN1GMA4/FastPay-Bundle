<?php

namespace En1gma4\FastpayBundle\Models\Responses;

class ValidatePaymentResponse extends BaseResponse
{
    /**
     * Get the gateway transaction ID.
     * @return string|null
     */
    public function getGwTransactionId(): ?string
    {
        return $this->getdata()['gw_transaction_id'] ?? null;
    }

    /**
     * Get the merchant's order ID.
     * @return string|null
     */
    public function getMerchantOrderId(): ?string
    {
        return $this->getdata()['merchant_order_id'] ?? null;
    }

    /**
     * Get the amount received.
     * @return string|null
     */
    public function getReceivedAmount(): ?string
    {
        return $this->getdata()['received_amount'] ?? null;
    }

    /**
     * Get the currency of the transaction.
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->getdata()['currency'] ?? null;
    }

    /**
     * Get the name of the customer.
     * @return string|null
     */
    public function getCustomerName(): ?string
    {
        return $this->getdata()['customer_name'] ?? null;
    }

    /**
     * Get the mobile number of the customer.
     * @return string|null
     */
    public function getCustomerMobileNumber(): ?string
    {
        return $this->getdata()['customer_mobile_number'] ?? null;
    }

    /**
     * Get the timestamp of the transaction.
     * @return string|null
     */
    public function getAt(): ?string
    {
        return $this->getdata()['at'] ?? null;
    }

    /**
     * Get the transaction ID.
     * @return string|null
     */
    public function getTransactionId(): ?string
    {
        return $this->getdata()['transaction_id'] ?? null;
    }

    /**
     * Get the order ID.
     * @return string|null
     */
    public function getOrderId(): ?string
    {
        return $this->getdata()['order_id'] ?? null;
    }

    /**
     * Get the customer's account number.
     * @return string|null
     */
    public function getCustomerAccountNo(): ?string
    {
        return $this->getdata()['customer_account_no'] ?? null;
    }

    /**
     * Get the status of the transaction.
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->getdata()['status'] ?? null;
    }

    /**
     * Get the timestamp of when the amount was received.
     * @return string|null
     */
    public function getReceivedAt(): ?string
    {
        return $this->getdata()['received_at'] ?? null;
    }


}