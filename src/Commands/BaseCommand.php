<?php

namespace SebaCarrasco93\Kaataa\Commands;

use Symfony\Component\Console\Command\Command;

class BaseCommand extends Command
{
    public function success()
    {
        return Command::SUCCESS;
    }

    public function failure()
    {
        return Command::FAILURE;
    }

    public function invalid()
    {
        return Command::INVALID;
    }
}
