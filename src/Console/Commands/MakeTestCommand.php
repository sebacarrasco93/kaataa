<?php

namespace SebaCarrasco93\Kaataa\Console\Commands;

use SebaCarrasco93\Kaataa\Console\Helpers\CreateFromStub;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeTestCommand extends BaseCommand
{
    private $name;

    protected static $defaultName = 'make:test';

    protected function configure(): void
    {
        $this->setDescription('Makes a test file')
            ->setHelp('Makes test file')
            ->addArgument('name',
                $this->name ? InputArgument::REQUIRED : InputArgument::OPTIONAL,
                'Specify your new Kata test name',
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if ($name = $input->getArgument('name')) {
            return $this->createFile($output, $name);
        }

        return $this->invalid($output, 'Please set your Kata test name');
    }

    public function createFile(OutputInterface $output, $name)
    {
        $create = new CreateFromStub();
        
        $result = $create->stub('test')
            ->content()
            ->replace([
                '{{ namespace }}' => 'Tests',
                '{{ class }}' => $name . 'Test',
            ])->inDirectory('Tests')
            ->output()
            ->fileName($name . 'Test')
            ->create()
        ;

        if ($result) {
            $this->success($output, "Your test {$name} was created");

            return $this->successResult();
        }

        return $this->error($output);
    }
}
