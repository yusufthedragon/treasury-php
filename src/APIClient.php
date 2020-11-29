<?php

/**
 * APIClient.php
 *
 * @category Class
 * @package  YusufTheDragon\Treasury
 *
 * @author   Yusuf Ardi <yusufardi96@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */

namespace YusufTheDragon\Treasury;

/**
 * Class APIClient
 *
 * @category Class
 * @package  YusufTheDragon\Treasury
 *
 * @author   Yusuf Ardi <yusufardi96@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */
class APIClient
{
    /**
     * Send HTTP Request to Treasury API.
     *
     * @param  string  $httpMethod
     * @param  string  $apiEndpoint
     * @param  array  $requestBody
     * @param  array  $bearerToken
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function sendRequest(string $httpMethod, string $apiEndpoint, array $requestBody = [], string $bearerToken = '') : object
    {
        $requestHeaders = [];

        if ($bearerToken !== '') {
            $requestHeaders[] = 'Authorization: Bearer ' . $bearerToken;
        }

        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $apiEndpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $httpMethod,
            CURLOPT_POSTFIELDS => $requestBody,
            CURLOPT_HTTPHEADER => $requestHeaders
        ]);

        $httpRequest = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        Validator::validateResponseCode($httpCode);

        return json_decode($httpRequest);
    }
}
