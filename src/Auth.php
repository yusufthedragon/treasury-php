<?php

/**
 * Auth.php
 *
 * @category Class
 * @package  YusufTheDragon\Treasury
 *
 * @author   Yusuf Ardi <yusufardi96@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */

namespace YusufTheDragon\Treasury;

/**
 * Class Auth
 *
 * @category Class
 * @package  YusufTheDragon\Treasury
 *
 * @author   Yusuf Ardi <yusufardi96@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */
class Auth
{
    /**
     * Required parameters for Login Client.
     *
     * @var array
     */
    private static $loginClientRequiredParams = [
        'client_id',
        'client_secret',
        'grant_type'
    ];

    /**
     * Required parameter types for Login Client.
     *
     * @var array
     */
    private static $loginClientTypeParams = [
        'client_id' => 'string',
        'client_secret' => 'string',
        'grant_type' => 'string'
    ];

    /**
     * Required parameters for Register.
     *
     * @var array
     */
    private static $registerRequiredParams = [
        'name',
        'email',
        'password',
        'password_confirmation',
        'gender',
        'birthday',
        'referral_code',
        'phone',
        'security_question',
        'security_question_answer'
    ];

    /**
     * Required parameter types for Register.
     *
     * @var array
     */
    private static $registerTypeParams = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'password_confirmation' => 'string',
        'gender' => 'string',
        'birthday' => 'string',
        'referral_code' => 'string',
        'phone' => 'string',
        'security_question' => 'string',
        'security_question_answer' => 'string',
        'selfie_scan' => 'string',
        'id_card_scan' => 'string',
        'owner_name' => 'string',
        'account_number' => 'string',
        'bank_code' => 'string',
        'branch' => 'string',
        'customer_concern' => 'boolean',
        'app_notification' => 'boolean',
        'email_notification' => 'boolean'
    ];

    /**
     * Required parameters for Login.
     *
     * @var array
     */
    private static $loginRequiredParams = [
        'client_id',
        'client_secret',
        'grant_type',
        'email',
        'password'
    ];

    /**
     * Required parameter types for Login.
     *
     * @var array
     */
    private static $loginTypeParams = [
        'client_id' => 'string',
        'client_secret' => 'string',
        'grant_type' => 'string',
        'email' => 'string',
        'password' => 'string'
    ];

    /**
     * Log into Treasury using client credential.
     *
     * @param  array  $params
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function loginClient(array $params) : object
    {
        Validator::validateRequirement(self::$loginClientRequiredParams, $params)->validateType(self::$loginClientTypeParams, $params);

        $urlEndpoint = Treasury::$baseEndpoint . '/login';

        return APIClient::sendRequest('POST', $urlEndpoint, $params);
    }

    /**
     * Register new user to Treasury.
     *
     * @param  array  $params
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function register(array $params) : object
    {
        Validator::validateRequirement(self::$registerRequiredParams, $params)->validateType(self::$registerTypeParams, $params);

        $urlEndpoint = Treasury::$baseEndpoint . '/register';

        return APIClient::sendRequest('POST', $urlEndpoint, $params);
    }

    /**
     * Log into Treasury using password and obtain the bearer token.
     *
     * @param  array  $params
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function login(array $params) : object
    {
        Validator::validateRequirement(self::$loginRequiredParams, $params)->validateType(self::$loginTypeParams, $params);

        $urlEndpoint = Treasury::$baseEndpoint . '/login';

        return APIClient::sendRequest('POST', $urlEndpoint, $params);
    }

    /**
     * Send an e-mail contains link for reset password.
     *
     * @param  string  $email
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function forgotPassword(string $email) : object
    {
        $urlEndpoint = Treasury::$baseEndpoint . '/forgot-password';

        return APIClient::sendRequest('POST', $urlEndpoint, ['email' => $email]);
    }

    /**
     * Check if email is available or not.
     *
     * @param  string  $email
     *
     * @return object
     *
     * @throws \TypeError
     * @throws \ArgumentCountError
     */
    public static function checkEmailAvailability(string $email) : object
    {
        $urlEndpoint = Treasury::$baseEndpoint . '/check-email';

        return APIClient::sendRequest('POST', $urlEndpoint, ['email' => $email]);
    }

    /**
     * Get list of security questions.
     *
     * @return object
     */
    public static function getSecurityQuestion() : object
    {
        $urlEndpoint = Treasury::$baseEndpoint . '/security-endpoint';

        return APIClient::sendRequest('GET', $urlEndpoint);
    }
}
