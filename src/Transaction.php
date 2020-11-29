<?php

/**
 * Transaction.php
 *
 * @category Class
 * @package  YusufTheDragon\Treasury
 *
 * @author   Yusuf Ardi <yusufardi96@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */

namespace YusufTheDragon\Treasury;

/**
 * Class Transaction
 *
 * @category Class
 * @package  YusufTheDragon\Treasury
 *
 * @author   Yusuf Ardi <yusufardi96@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */
class Transaction
{
    /**
     * Required parameters for Get Gold Price.
     *
     * @var array
     */
    private static $getGoldPriceRequiredParams = [
        'start_date',
        'end_date'
    ];

    /**
     * Required parameter types for Get Gold Price.
     *
     * @var array
     */
    private static $getGoldPriceTypeParams = [
        'start_date' => 'string',
        'end_date' => 'string',
        'type' => 'string'
    ];

    /**
     * Required parameters for Calculate.
     *
     * @var array
     */
    private static $calculateRequiredParams = [
        'amount_type',
        'amount',
        'transaction_type',
        'payment_type'
    ];

    /**
     * Required parameter types for Calculate.
     *
     * @var array
     */
    private static $calculateTypeParams = [
        'amount_type' => 'string',
        'amount' => 'integer|double',
        'transaction_type' => 'string',
        'payment_type' => 'string',
        'payment_method' => 'string'
    ];

    /**
     * Required parameters for Buy.
     *
     * @var array
     */
    private static $buyRequiredParams = [
        'unit',
        'total',
        'payment_method',
        'payment_channel'
    ];

    /**
     * Required parameter types for Buy.
     *
     * @var array
     */
    private static $buyTypeParams = [
        'invoice_number' => 'string',
        'unit' => 'integer|double',
        'total' => 'integer|double',
        'payment_method' => 'string',
        'payment_channel' => 'string',
        'latitude' => 'string',
        'longitude' => 'string'
    ];

    /**
     * Required parameters for Sell.
     *
     * @var array
     */
    private static $sellRequiredParams = [
        'total',
        'unit',
        'latitude'
    ];

    /**
     * Required parameter types for Sell.
     *
     * @var array
     */
    private static $sellTypeParams = [
        'total' => 'integer|double',
        'unit' => 'integer|double',
        'latitude' => 'string',
        'longitude' => 'string'
    ];

    /**
     * Get gold price based on period and type transaction.
     *
     * @param  string  $bearerToken
     * @param  array  $params
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function getGoldPrice(string $bearerToken, array $params) : object
    {
        Validator::validateRequirement(self::$getGoldPriceRequiredParams, $params)->validateType(self::$getGoldPriceTypeParams, $params);

        $urlEndpoint = Treasury::$baseEndpoint . '/gold-price';

        return APIClient::sendRequest('POST', $urlEndpoint, $params, $bearerToken);
    }

    /**
     * Calculate the amount of gold can be bought.
     *
     * @param  string  $bearerToken
     * @param  array  $params
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function calculate(string $bearerToken, array $params) : object
    {
        Validator::validateRequirement(self::$calculateRequiredParams, $params)->validateType(self::$calculateTypeParams, $params);

        $urlEndpoint = Treasury::$baseEndpoint . '/calculate';

        return APIClient::sendRequest('POST', $urlEndpoint, $params, $bearerToken);
    }

    /**
     * Get list of available payment methods.
     *
     * @param  string  $bearerToken
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function getPaymentMethod(string $bearerToken) : object
    {
        $urlEndpoint = Treasury::$baseEndpoint . '/payment-method';

        return APIClient::sendRequest('GET', $urlEndpoint, [], $bearerToken);
    }

    /**
     * Buy gold.
     *
     * @param  string  $bearerToken
     * @param  array  $params
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function buy(string $bearerToken, array $params) : object
    {
        Validator::validateRequirement(self::$buyRequiredParams, $params)->validateType(self::$buyTypeParams, $params);

        $urlEndpoint = Treasury::$baseEndpoint . '/buy';

        return APIClient::sendRequest('POST', $urlEndpoint, $params, $bearerToken);
    }

    /**
     * Sell the owned gold.
     *
     * @param  string  $bearerToken
     * @param  array  $params
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function sell(string $bearerToken, array $params) : object
    {
        Validator::validateRequirement(self::$sellRequiredParams, $params)->validateType(self::$sellTypeParams, $params);

        $urlEndpoint = Treasury::$baseEndpoint . '/sell';

        return APIClient::sendRequest('POST', $urlEndpoint, $params, $bearerToken);
    }

    /**
     * Use voucher for buy gold.
     *
     * @param  string  $bearerToken
     * @param  string  $code
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function useVoucher(string $bearerToken, string $code) : object
    {
        $urlEndpoint = Treasury::$baseEndpoint . '/voucher';

        return APIClient::sendRequest('POST', $urlEndpoint, ['code' => $code], $bearerToken);
    }

    /**
     * Notify Treasury about new payment.
     *
     * @param  string  $bearerToken
     * @param  string  $invoiceNumber
     * @param  string  $paymentNote
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function notify(string $bearerToken, string $invoiceNumber, string $paymentNote) : object
    {
        $urlEndpoint = Treasury::$baseEndpoint . '/payment-notify';

        return APIClient::sendRequest('POST', $urlEndpoint, ['invoice_number' => $invoiceNumber, 'payment_note' => $paymentNote], $bearerToken);
    }

    /**
     * Get list of available banks.
     *
     * @return object
     */
    public static function getBankList() : object
    {
        $urlEndpoint = Treasury::$baseEndpoint . '/bank-list';

        return APIClient::sendRequest('GET', $urlEndpoint);
    }
}
