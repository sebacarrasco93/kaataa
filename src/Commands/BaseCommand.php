<?php

namespace SebaCarrasco93\Kaataa\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

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

    public function showSuccess(OutputInterface $output, $message = null)
    {
        if ($message) {
            $output->writeln("✅ {$message}");
        } else {
            $output->writeln('✅ Done');
        }

        return $this->failure();
    }

    public function showError(OutputInterface $output, $message = null)
    {
        if ($message) {
            $output->writeln("❌ {$message}");
        } else {
            $output->writeln("❌ An error was found");
        }

        return $this->failure();
    }

    public function showInvalid(OutputInterface $output, $message = null)
    {
        if ($message) {
            $output->writeln("❌ {$message}");
        } else {
            $output->writeln('❌ Please provide the name');
        }

        return $this->invalid();
    }
}
