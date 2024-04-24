<?php

namespace En1gma4\FastpayBundle\Models\Responses;

class InitiatePaymentResponse extends BaseResponse
{
    /**
     * Get redirect url for the payment
     * @return string|null
     */
    public function getRedirectUri(): ?string
    {
        return $this->getData()['redirect_uri'] ?? null;
    }

}