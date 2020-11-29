<?php

/**
 * Treasury.php
 *
 * @category Class
 * @package  YusufTheDragon\Treasury
 *
 * @author   Yusuf Ardi <yusufardi96@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */

namespace YusufTheDragon\Treasury;

/**
 * Class Treasury
 *
 * @category Class
 * @package  YusufTheDragon\Treasury
 *
 * @author   Yusuf Ardi <yusufardi96@gmail.com>
 * @license  https://opensource.org/licenses/GPL-3.0 GPL-3.0-only License
 */
class Treasury
{
    /**
     * Base URL for API Endpoint.
     *
     * @var string
     */
    public static $baseEndpoint = 'https://stagetrs.treasury.id/partner/v2';

    /**
     * Change the base URL endpoint to production.
     *
     * @param  bool  $flag
     *
     * @return self
     *
     * @throws \TypeError
     */
    public static function setProductionMode(bool $flag = true) : self
    {
        if ($flag) {
            self::$baseEndpoint = 'https://www.treasury.id/partner/v2';
        }

        return new self();
    }
}
