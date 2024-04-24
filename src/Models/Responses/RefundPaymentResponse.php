<?php

namespace En1gma4\FastpayBundle\Models\Responses;

class RefundPaymentResponse extends BaseResponse
{
    /**
     * Get the recipient's name.
     * @return string|null
     */
    public function getRecipientName(): ?string
    {
        return $this->getdata()['summary']['recipient']['name'] ?? null;
    }

    /**
     * Get the recipient's mobile number.
     * @return string|null
     */
    public function getRecipientMobileNumber(): ?string
    {
        return $this->getdata()['summary']['recipient']['mobile_number'] ?? null;
    }

    /**
     * Get the recipient's avatar URL.
     * @return string|null
     */
    public function getRecipientAvatar(): ?string
    {
        return $this->getdata()['summary']['recipient']['avatar'] ?? null;
    }

    /**
     * Get the invoice ID.
     * @return string|null
     */
    public function getInvoiceId(): ?string
    {
        return $this->getdata()['summary']['invoice_id'] ?? null;
    }

}