<?php

namespace App\Logging;

use Monolog\Formatter\LineFormatter;

class ActionLogsFormatter
{
    public function __invoke($logger)
    {
        foreach($logger->getHandlers() as $handlers){
            $handlers->setFormatter(
                new LineFormatter('[%datetime%]: %message% %context%'));
        }
    }  
}

