<?php

namespace SebaCarrasco93\Kaataa\Console\Commands;

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
            return $this->createFiles($output, $name);
        }

        return $this->showInvalid($output);
    }

    public function createFiles(OutputInterface $output, $name)
    {
        $result_one = $this->createClassFile($name);
        $result_two = $this->createTestFile($name);

        if ($result_one && $result_two) {
            $this->showSuccess($output, "Your files {$name} was created successfully");
            return $this->success();
        }

        return $this->showError($output);
    }

    public function createClassFile($name): bool
    {
        $class_file = $this->getStub('class');

        return ! file_exists($class_file);
    }

    public function createTestFile($name): bool
    {
        $test_file = $this->getStub('test');

        return file_exists($test_file);
    }
}
