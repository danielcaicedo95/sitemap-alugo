<!-- application/config/cron.php -->


<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config['cron'] = [
    'jobs' => [
        'send_indexation_request' => [
            'controller' => 'SendIndexationRequest',
            'function' => 'index',
            'schedule' => '*/3 * * * *', // Cada 3 días
        ],
    ],
];

