<?php

return [
    'config_dir'  => 'novum.cbs',
    'namespace'   => 'NovumCbs',
    'protocol'    => isset($_SERVER['IS_DEVEL']) ? 'http' : 'https',
    'live_domain' => 'cbs.demo.novum.nu',
    'dev_domain'  => 'cbs.demo.novum.nuidev.nl',
    'test_domain' => 'cbs.test.demo.novum.nu',
];
