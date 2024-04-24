<?php

namespace En1gma4\FastpayBundle\Models\Responses;

class BaseResponse
{

    private $code;
    private $messages;
    private $data;


    /**
     * Better to check if response code is 200 then get the redirect uri!
     * @param int $code Returns 200 | 422
     * @param array $messages
     * @param array $data null if it fails.
     */
    public function __construct(int $code, array $messages, array $data)
    {
        $this->code = $code;
        $this->messages = $messages;
        $this->data = $data;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function getData(): array
    {
        return $this->data;
    }
}