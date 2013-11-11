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


abstract class AbstractMethod implements \ArrayAccess
{

    /**
     * Data store for post data
     *
     * @var data
     */
    protected $data = null;

    /**
     * Name of the global
     *
     * @var global
     */
    protected $global = "METHOD";

    /**
     * Base constructor
     *
     * @param null $root Location of the .git directory
     * @param string $tagPrefix Prefix for git tag matching
     */
    abstract public function __construct($requestBody);



    /**
     * Export the data to a new globals array
     */
    public function globalize()
    {
        $name = $this->global;
        global $$name;
        $$name = $this;

    }

    /**
     * Does the key exist?
     */
    public function offsetExists($offset)
    {
        if (is_array($this->data)) {
            return in_array($offset, array_keys($this->data));
        }
    }

    /**
     * Retrieve data from offset
     */
    public function offsetGet($offset)
    {
        if (is_array($this->data)) {
            return $this->data[$offset];
        }
    }

    /**
     * Store a value with the given offset
     * @param mixed $offset Index or key
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        throw new \ErrorException("Http data is read only.", 0, E_USER_WARNING);
    }

    public function offsetUnset($offset)
    {
        throw new \ErrorException("Http data is read only.", 0, E_USER_WARNING);
    }
}
