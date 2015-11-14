<?php

/*
 * Qiwi driver for Omnipay PHP payment library
 *
 * @link      https://github.com/hiqdev/omnipay-qiwi
 * @package   omnipay-qiwi
 * @license   MIT
 * @copyright Copyright (c) 2015, HiQDev (http://hiqdev.com/)
 */

namespace Omnipay\Qiwi\Message;

use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * Qiwi Complete Purchase Response.
 */
class CompletePurchaseResponse extends AbstractResponse
{
    public function __construct(RequestInterface $request, $data)
    {
        $this->request = $request;
        $this->data    = $data;

        if (!$this->validateConfirmation()) {
            throw new InvalidResponseException('Invalid confirmation');
        }
    }

    public function isSuccessful()
    {
        return true;
    }

    /**
     * The transaction identifier generated by the merchant website.
     */
    public function getTransactionId()
    {
        return $this->data['???'];
    }

    /**
     * The transaction identifier generated by the payment gateway.
     */
    public function getTransactionReference()
    {
        return $this->data['???'];
    }

    public function getAmount()
    {
        return $this->data['amount'];
    }

    public function validateConfirmation($data)
    {
        /// TO BE DONE
        return false;
    }
}