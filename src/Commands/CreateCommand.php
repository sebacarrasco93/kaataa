<?php

namespace SebaCarrasco93\Kaataa\Commands;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateCommand extends BaseCommand
{
    private $name;

    protected static $defaultName = 'create';

    protected function configure(): void
    {
        $this->setDescription('Create class and test files')
            ->setHelp('Create a class and a test file')
            ->addArgument('name',
                $this->name ? InputArgument::REQUIRED : InputArgument::OPTIONAL,
                'Specify the name for class and test file'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if ($name = $input->getArgument('name')) {
            return $this->createProject($output, $name);
        }

        return $this->showInvalid($output);
    }

    public function createProject(OutputInterface $output, $name)
    {
        $this->showSuccess($output, "Your file {$name} was created successfully");

        return $this->success();
    }
}
