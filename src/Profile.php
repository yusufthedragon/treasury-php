<?php

/**
 * Profile.php
 *
 * @category Class
 * @package  YusufTheDragon\Treasury
 *
 * @author   Yusuf Ardi <yusufardi96@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */

namespace YusufTheDragon\Treasury;

/**
 * Class Profile
 *
 * @category Class
 * @package  YusufTheDragon\Treasury
 *
 * @author   Yusuf Ardi <yusufardi96@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */
class Profile
{
    /**
     * Required parameters for Update Password.
     *
     * @var array
     */
    private static $updatePasswordRequiredParams = [
        'email',
        'password',
        'password_confirmation'
    ];

    /**
     * Required parameter types for Update Password.
     *
     * @var array
     */
    private static $updatePasswordTypeParams = [
        'email' => 'string',
        'password' => 'string',
        'password_confirmation' => 'string',
        'pin' => 'string'
    ];

    /**
     * Get current user's profile.
     *
     * @param  string  $bearerToken
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function getProfile(string $bearerToken) : object
    {
        $urlEndpoint = Treasury::$baseEndpoint . '/profile';

        return APIClient::sendRequest('GET', $urlEndpoint, [], $bearerToken);
    }

    /**
     * Get url for updating current user's profile.
     *
     * @param  string  $bearerToken
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function updateProfile(string $bearerToken) : object
    {
        $urlEndpoint = Treasury::$baseEndpoint . '/update-profile';

        return APIClient::sendRequest('GET', $urlEndpoint, [], $bearerToken);
    }

    /**
     * Update the current user's password.
     *
     * @param  string  $bearerToken
     * @param  array  $params
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function updatePassword(string $bearerToken, array $params) : object
    {
        Validator::validateRequirement(self::$updatePasswordRequiredParams, $params)->validateType(self::$updatePasswordTypeParams, $params);

        $urlEndpoint = Treasury::$baseEndpoint . '/update-password';

        return APIClient::sendRequest('POST', $urlEndpoint, $params, $bearerToken);
    }
}
