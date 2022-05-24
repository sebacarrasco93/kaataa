<?php

namespace SebaCarrasco93\Kaataa\Console\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateKataCommand extends BaseCommand
{
    private $name;

    protected static $defaultName = 'create:kata';

    protected function configure(): void
    {
        $this->setDescription('Create class and test files')
            ->setHelp('Create a class and a test file')
            ->addArgument('name',
                $this->name ? InputArgument::REQUIRED : InputArgument::OPTIONAL,
                'Specify your new kata name',
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if ($name = $input->getArgument('name')) {
            return $this->createFiles($output, $name);
        }

        return $this->invalid($output, 'Please set your kata name');
    }

    public function createFiles(OutputInterface $output, $name)
    {
        $result_one = $this->createClassFile($name, $output);
        $result_two = $this->createTestFile($name, $output);

        if ($result_one && $result_two) {
            $this->success($output);

            return $this->successResult();
        }

        return $this->error($output);
    }

    private function callAnotherCommand(string $command, array $arguments, OutputInterface $output)
    {
        $command = $this->getApplication()->find($command);

        $greetInput = new ArrayInput($arguments);
        
        $returnCode = $command->run($greetInput, $output);

        return true;
    }

    public function createClassFile($name, OutputInterface $output): bool
    {
        return $this->callAnotherCommand('make:class', [
            'name' => $name
        ], $output);
    }

    public function createTestFile($name, OutputInterface $output): bool
    {
        return $this->callAnotherCommand('make:test', [
            'name' => $name
        ], $output);
    }
}
