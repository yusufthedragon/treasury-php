<?php

/**
 * Minting.php
 *
 * @category Class
 * @package  YusufTheDragon\Treasury
 *
 * @author   Yusuf Ardi <yusufardi96@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */

namespace YusufTheDragon\Treasury;

/**
 * Class Minting
 *
 * @category Class
 * @package  YusufTheDragon\Treasury
 *
 * @author   Yusuf Ardi <yusufardi96@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */
class Minting
{
    /**
     * Required parameters for Calculate.
     *
     * @var array
     */
    private static $calculateRequiredParams = [
        'minting_partner',
        'minting_fee',
        'minting_piece',
        'minting_shipping'
    ];

    /**
     * Required parameter types for Calculate.
     *
     * @var array
     */
    private static $calculateTypeParams = [
        'minting_partner' => 'string',
        'minting_fee' => 'string',
        'minting_piece' => 'string',
        'minting_shipping' => 'string'
    ];

    /**
     * Required parameter for Gold Minting.
     *
     * @var array
     */
    private static $goldMintingRequiredParams = [
        'minting_partner',
        'minting_fee',
        'minting_piece',
        'minting_shipping',
        'shipping_address',
        'payment_method',
        'payment_channel'
    ];

    /**
     * Required parameter types for Gold Minting.
     *
     * @var array
     */
    private static $goldMintingTypeParams = [
        'minting_partner' => 'string',
        'minting_fee' => 'string',
        'minting_piece' => 'string',
        'minting_shipping' => 'string',
        'shipping_address' => 'string',
        'payment_method' => 'string',
        'payment_channel' => 'string',
        'latitude' => 'string',
        'longitude' => 'string'
    ];

    /**
     * Get the partner data of gold minting.
     *
     * @param  string  $bearerToken
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function getMintingPartner(string $bearerToken) : object
    {
        $urlEndpoint = Treasury::$baseEndpoint . '/minting';

        return APIClient::sendRequest('GET', $urlEndpoint, [], $bearerToken);
    }

    /**
     * Get the fee of gold minting.
     *
     * @param  string  $bearerToken
     * @param  string  $mintingPartner
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function getMintingFee(string $bearerToken, string $mintingPartner) : object
    {
        $urlEndpoint = Treasury::$baseEndpoint . '/minting-fee';

        return APIClient::sendRequest('POST', $urlEndpoint, ['minting_partner' => $mintingPartner], $bearerToken);
    }

    /**
     * Get the list of gold minting piece.
     *
     * @param  string  $bearerToken
     * @param  string  $mintingPartner
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function getMintingPiece(string $bearerToken, string $mintingPartner) : object
    {
        $urlEndpoint = Treasury::$baseEndpoint . '/minting-piece';

        return APIClient::sendRequest('POST', $urlEndpoint, ['minting_partner' => $mintingPartner], $bearerToken);
    }

    /**
     * Get the shipping fee of gold minting.
     *
     * @param  string  $bearerToken
     * @param  string  $mintingPartner
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function getMintingShipping(string $bearerToken, string $mintingPartner) : object
    {
        $urlEndpoint = Treasury::$baseEndpoint . '/minting-shipping';

        return APIClient::sendRequest('POST', $urlEndpoint, ['minting_partner' => $mintingPartner], $bearerToken);
    }

    /**
     * Get the calculation of gold minting.
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

        $urlEndpoint = Treasury::$baseEndpoint . '/minting-calculate';

        return APIClient::sendRequest('POST', $urlEndpoint, $params, $bearerToken);
    }

    /**
     * Minting the owned gold.
     *
     * @param  string  $bearerToken
     * @param  array  $params
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function minting(string $bearerToken, array $params) : object
    {
        Validator::validateRequirement(self::$goldMintingRequiredParams, $params)->validateType(self::$goldMintingTypeParams, $params);

        $urlEndpoint = Treasury::$baseEndpoint . '/minting';

        return APIClient::sendRequest('POST', $urlEndpoint, $params, $bearerToken);
    }
}
