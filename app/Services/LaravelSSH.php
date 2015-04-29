<?php namespace App\Services;

use phpseclib\Net\SSH2 as Base;
use App\Contracts\SSH as ISSH;

class LaravelSSH extends Base implements ISSH
{
    public function __construct()
    {
    	parent::__construct('');
    }

    // Please call this method before doing anything [stupid]
    public function setup($host, $port = 22)
    {
    	$this->host = $host;
    	$this->port = $port;
    }
}
