<?php

namespace En1gma4\FastpayBundle\Models\Responses;

class ValidateRefundResponse extends BaseResponse
{
    /**
     * Get the order ID.
     * @return string|null
     */
    public function getOrderId(): ?string
    {
        return $this->getdata()['order_id'] ?? null;
    }

    /**
     * Check if the refund status is true.
     * @return bool|null
     */
    public function isRefundStatusTrue(): ?bool
    {
        return $this->getdata()['refund_status'] ?? null;
    }

    /**
     * Get the timestamp when the status was checked.
     * @return string|null
     */
    public function getStatusCheckedAt(): ?string
    {
        return $this->getdata()['status_checked_at'] ?? null;
    }

}