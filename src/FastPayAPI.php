<?php

namespace En1gma4\FastpayBundle;

use En1gma4\FastpayBundle\Constants\DEPLOYMODE;
use En1gma4\FastpayBundle\Models\Initiate\InitiatePayment;
use En1gma4\FastpayBundle\Models\Responses\InitiatePaymentResponse;
use En1gma4\FastpayBundle\Models\Responses\RefundPaymentResponse;
use En1gma4\FastpayBundle\Models\Responses\ValidatePaymentResponse;

class FastPayAPI
{
    private $storeId;
    private $storePassword;
    private $endpoint;

    /**
     * @param string $storeId Get it from fastpay company
     * @param string $storePassword Get it from fastpay company
     * @param string $endpoint STAGING|PROD, you can use DEPLOYMODE::PROD or DEPLOYMODE::STAGING
     */
    public function __construct(string $storeId, string $storePassword, string $endpoint)
    {
        $this->storeId = $storeId;
        $this->storePassword = $storePassword;
        $this->endpoint = $endpoint;
    }

    /**
     * @param InitiatePayment $InitiatePayment InitiatePayment Object
     * @return InitiatePaymentResponse Holds response details
     */
    public function ExecuteInitiate(InitiatePayment $InitiatePayment): InitiatePaymentResponse
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "$this->endpoint/api/v1/public/pgw/payment/initiation" ,
            CURLOPT_RETURNTRANSFER => true, 
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                'store_id' => $this->storeId,
                'store_password' => $this->storePassword,
                'order_id' => $InitiatePayment->getOrderId(),
                'bill_amount' => $InitiatePayment->getBillAmount(),
                'currency' => $InitiatePayment->getCurrency(),
                'cart' => $InitiatePayment->getCart(),
            ]),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $responseData = json_decode($response, true);
        $code = $responseData['code'] ?? 0;
        $messages = $responseData['messages'] ?? [];
        $data = $responseData['data'] ?? [];

        return new InitiatePaymentResponse($code, $messages, $data);
    }

    /**
     * Validate Payment
     * @param string $orderid The orderid to retrieve its data
     * @return ValidatePaymentResponse Holds response details
     */
    public function ExecuteVPayment(string $orderid): ValidatePaymentResponse
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "$this->endpoint/api/v1/public/pgw/payment/validate" ,
            CURLOPT_RETURNTRANSFER => true, 
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                'store_id' => $this->storeId,
                'store_password' => $this->storePassword,
                'order_id' => $orderid
            ]),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $responseData = json_decode($response, true);
        $code = $responseData['code'] ?? 0;
        $messages = $responseData['messages'] ?? [];
        $data = $responseData['data'] ?? [];

        return new ValidatePaymentResponse($code, $messages, $data);
    }


    /**
     * Refund
     * @param string $orderid The orderid to refund the money to
     * @param int $amount amount to refund, should be lower than the money you received
     * @param string $refund_secret_key refund secret key, can be found in merchant panel
     * @param string $msisdn Recipient's FastPay mobile number. e.g +964xxxxxxxxxx
     * @return RefundPaymentResponse
     */
    public function ExecuteRPayment(string $orderid, int $amount, string $refund_secret_key, string $msisdn): RefundPaymentResponse
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "$this->endpoint/api/v1/public/pgw/payment/refund" ,
            CURLOPT_RETURNTRANSFER => true, 
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                'store_id' => $this->storeId,
                'store_password' => $this->storePassword,
                'order_id' => $orderid,
                'amount' => $amount,
                "refund_secret_key"=>$refund_secret_key,
                "msisdn"=>$msisdn
            ]),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $responseData = json_decode($response, true);
        $code = $responseData['code'] ?? 0;
        $messages = $responseData['messages'] ?? [];
        $data = $responseData['data'] ?? [];

        return new RefundPaymentResponse($code, $messages, $data);
    }
    /**
     * Validate Refund
     * @param string $orderid The orderid to retrieve its data
     * @return ValidatePaymentResponse Holds response details
     */
    public function ExecuteVRefund(string $orderid): ValidatePaymentResponse
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "$this->endpoint/api/v1/public/pgw/payment/refund/validation" ,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                'store_id' => $this->storeId,
                'store_password' => $this->storePassword,
                'order_id' => $orderid
            ]),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $responseData = json_decode($response, true);
        $code = $responseData['code'] ?? 0;
        $messages = $responseData['messages'] ?? [];
        $data = $responseData['data'] ?? [];

        return new ValidatePaymentResponse($code, $messages, $data);
    }

}