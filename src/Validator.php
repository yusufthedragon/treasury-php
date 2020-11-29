<?php

/**
 * Validator.php
 *
 * @category Class
 * @package  YusufTheDragon\Treasury
 *
 * @author   Yusuf Ardi <yusufardi96@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */

namespace YusufTheDragon\Treasury;

/**
 * Class Validator
 *
 * @category Class
 * @package  YusufTheDragon\Treasury
 *
 * @author   Yusuf Ardi <yusufardi96@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */
class Validator
{
    /**
     * List of invalid response codes.
     *
     * @var array
     */
    private static $invalidResponseCode = [
        400 => 'Parameters Not Valid',
        401 => 'Token Not Valid',
        403 => 'Authorization Not Valid',
        404 => 'Endpoint Not Valid',
        429 => 'Request Limit',
        500 => 'Contact Treasury PIC',
        502 => 'Contact Treasury PIC',
        503 => 'Contact Treasury PIC'
    ];

    /**
     * Check if required parameters is exists in the request parameters.
     *
     * @param  array  $requiredParams
     * @param  array  $params
     *
     * @return self
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     * @throws \BadFunctionCallException
     */
    public static function validateRequirement(array $requiredParams, array $params) : self
    {
        $arrIntersect = array_intersect(array_keys($params), $requiredParams);
        $missingParams = array_diff($requiredParams, $arrIntersect);

        if (count($missingParams)) {
            $implodedParams = implode(', ', $missingParams);

            throw new \BadFunctionCallException("Parameter ${implodedParams} is required.");
        }

        return new self();
    }

    /**
     * Check if the request parameters have the correct data type.
     *
     * @param  array  $typeParams
     * @param  array  $params
     *
     * @return void
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     * @throws \BadFunctionCallException
     * @throws \InvalidArgumentException
     */
    public static function validateType(array $typeParams, array $params) : void
    {
        foreach ($params as $key => $value) {
            $typeParam = explode('|', $typeParams[$key]);

            if (!in_array(gettype($value), $typeParam)) {
                throw new \InvalidArgumentException('Parameter ' . $key . ' must be ' . implode(' or ', $typeParam) . '.');
            }
        }
    }

    /**
     * Check if response code from API is valid.
     *
     * @param  int  $responseCode
     *
     * @return void
     *
     * @throws \ErrorException
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function validateResponseCode(int $responseCode) : void
    {
        if ($responseCode !== 200) {
            if (isset(self::$invalidResponseCode[$responseCode])) {
                throw new \ErrorException("Treasury API Response Code: ${responseCode}. " . self::$invalidResponseCode[$responseCode] . ".");
            }

            throw new \ErrorException("Invalid Treasury API Response Code: ${responseCode}");
        }
    }
}
