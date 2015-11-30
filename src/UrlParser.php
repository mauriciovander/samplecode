<?php namespace SampleCode;

/**
 * This class is responsible for parsing a URL
 * based on parse_url function
 * http://php.net/manual/es/function.parse-url.php
 *
 * @author: Mauricio van der Maesen de Sombreff <mauriciovander@gmail.com>
 * @date: 11/30/15
 */

class UrlParser
{
    private $parsed_url;

    /**
     * UrlParser constructor.
     * @param string $url
     */
    public function __construct($url)
    {
        $this->parsed_url = parse_url($url);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->unparseUrl();
    }

    /**
     * @return string | bool scheme
     */
    public function getScheme()
    {
        return  $this->getComponent('scheme');
    }

    /**
     * @return string | bool host
     */
    public function getHost()
    {
        return $this->getComponent('host');
    }

    /**
     * @return string | int port
     */
    public function getPort()
    {
        return $this->getComponent('port');
    }

    /**
     * @return string | bool user
     */
    public function getUser()
    {
        return $this->getComponent('user');
    }

    /**
     * @return string | bool pass
     */
    public function getPass()
    {
        return $this->getComponent('pass');
    }

    /**
     * @return string | bool path
     */
    public function getPath()
    {
        return $this->getComponent('path');
    }

    /**
     * @return string | bool query
     */
    public function getQuery()
    {
        return $this->getComponent('query');
    }

    /**
     * @return string | bool fragment
     */
    public function getFragment()
    {
        return $this->getComponent('fragment');
    }

    /**
     * Create URL String from parsed components
     * @return string
     */
    private function unparseUrl()
    {
        $scheme   = isset($this->parsed_url['scheme']) ? $this->parsed_url['scheme'] . '://' : '';
        $user     = isset($this->parsed_url['user']) ? $this->parsed_url['user'] : '';
        $pass     = isset($this->parsed_url['pass']) ? ':' . $this->parsed_url['pass']  : '';
        $pass     = ($user || $pass) ? "$pass@" : '';
        $host     = isset($this->parsed_url['host']) ? $this->parsed_url['host'] : '';
        $port     = isset($this->parsed_url['port']) ? ':' . $this->parsed_url['port'] : '';
        $path     = isset($this->parsed_url['path']) ? $this->parsed_url['path'] : '';
        $query    = isset($this->parsed_url['query']) ? '?' . $this->parsed_url['query'] : '';
        $fragment = isset($this->parsed_url['fragment']) ? '#' . $this->parsed_url['fragment'] : '';
        return $scheme . $user . $pass . $host . $port . $path . $query . $fragment;
    }

    /**
     * Check if a particular component is set and returns its value
     * @param $key
     * @return mixed
     */
    private function getComponent($key)
    {
        if (!is_array($this->parsed_url)) {
            return false;
        }
        if (!array_key_exists($key, $this->parsed_url)) {
            return false;
        }
        return $this->parsed_url[$key];
    }
}

//An added bonus could be if the class would normalize the path of the URL on instantiation, so if the input URL has a path with '.' or '..' in it, those would be removed.
