<?php

namespace SebaCarrasco93\Kaataa\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BaseCommand extends Command
{
    public function successResult()
    {
        return Command::SUCCESS;
    }

    public function failureResult()
    {
        return Command::FAILURE;
    }

    public function invalidResult()
    {
        return Command::INVALID;
    }

    public function success(OutputInterface $output, $message = null)
    {
        if ($message) {
            $output->writeln("✅ Success: {$message}");
        } else {
            $output->writeln('✅ Done');
        }

        return $this->failureResult();
    }

    public function error(OutputInterface $output, $message = null)
    {
        if ($message) {
            $output->writeln("❌ Error: {$message}");
        } else {
            $output->writeln("❌ An error was found");
        }

        return $this->failureResult();
    }

    public function invalid(OutputInterface $output, $message = null)
    {
        if ($message) {
            $output->writeln("❌ Invalid result: {$message}");
        } else {
            $output->writeln('❌ An invalid result was found');
        }

        return $this->invalidResult();
    }

    protected function getStub($filename)
    {
        return __DIR__ . "/../Stubs/{$filename}.stub";
    }
}
