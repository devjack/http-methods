<?php
/**
 * Http\Methods class
 *
 * PHP version 5.3
 *
 * @category Http
 * @package  http-methods
 * @author   Jack Skinner <sydnerdrage@gmail.com>
 * @license  MIT http://opensource.org/licenses/MIT
 * @link     https://github.com/sydnerdrage/http-methods
 *
 */

namespace Http\Methods;

use Http\Methods\AbstractMethod;

/**
 * AbstractMethod class
 *
 * Wraps git system calls
 *
 * @category Http
 * @package  http-methods
 * @author   Jack Skinner <sydnerdrage@gmail.com>
 * @license  MIT http://opensource.org/licenses/MIT
 * @link     https://github.com/sydnerdrage/http-methods
 */

class Put extends AbstractMethod
{
    /**
     * PUT class constructor
     */

    public function __construct($requestBody = "")
    {
        $this->data = json_decode($requestBody, true);
        $this->global = "_PUT";
    }

    /**
     * @return array Returns the data as an array
     */

    public function asArray()
    {
        return (array) $this->data;
    }
}
