<?php

/**
 * History.php
 *
 * @category Class
 * @package  YusufTheDragon\Treasury
 *
 * @author   Yusuf Ardi <yusufardi96@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */

namespace YusufTheDragon\Treasury;

/**
 * Class History
 *
 * @category Class
 * @package  YusufTheDragon\Treasury
 *
 * @author   Yusuf Ardi <yusufardi96@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */
class History
{
    /**
     * Get transaction history based on its type.
     *
     * @param  string  $bearerToken
     * @param  string  $type
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function getTransactionHistory(string $bearerToken, string $type) : object
    {
        $urlEndpoint = Treasury::$baseEndpoint . '/history';

        return APIClient::sendRequest('POST', $urlEndpoint, ['type' => $type], $bearerToken);
    }

    /**
     * Get the detail of a transaction history.
     *
     * @param  string  $bearerToken
     * @param  string  $type
     * @param  string  $invoiceNo
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function getTransactionDetail(string $bearerToken, string $type, string $invoiceNo) : object
    {
        $urlEndpoint = Treasury::$baseEndpoint . '/detail-history';

        return APIClient::sendRequest('POST', $urlEndpoint, ['type' => $type, 'invoice_no' => $invoiceNo], $bearerToken);
    }
}
