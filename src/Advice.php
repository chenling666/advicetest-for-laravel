<?php

namespace Chenl\advice;

use Illuminate\Session\SessionManager;
use Illuminate\Config\Repository;

class Advice
{
    /**
     * @var SessionManager
     */
    protected $session;

    /**
     * @var Repository
     */
    protected $config;

    /**
     * Advice constructor.
     * @param SessionManager $session
     * @param Repository $config
     */
    public function __construct(SessionManager $session, Repository $config)
    {
        $this->session = $session;
        $this->config = $config;
    }

    public function test_rtn($msg = '')
    {
        $config_arr = $this->config->get('advice.options');
        return $msg . '<strong>from your custom develop package!</strong>';
    }

}
