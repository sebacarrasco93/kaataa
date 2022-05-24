<?php

namespace SebaCarrasco93\Kaataa\Console\Commands;

use SebaCarrasco93\Kaataa\Console\Helpers\CreateFromStub;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MakeClassCommand extends BaseCommand
{
    private $name;

    protected static $defaultName = 'make:class';

    protected function configure(): void
    {
        $this->setDescription('Makes a class file')
            ->setHelp('Makes class file')
            ->addArgument('name',
                $this->name ? InputArgument::REQUIRED : InputArgument::OPTIONAL,
                'Specify your new Kata class name',
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if ($name = $input->getArgument('name')) {
            return $this->createFile($output, $name);
        }

        return $this->invalid($output, 'Please set your Kata class name');
    }

    public function createFile(OutputInterface $output, $name)
    {
        $create = new CreateFromStub();
        
        $result = $create->stub('class')
            ->content()
            ->replace([
                '{{ class }}' => $name
            ])->inDirectory('Classes')
            ->output()
            ->fileName($name)
            ->create()
        ;

        if ($result) {
            $this->success($output, "Your class {$name} was created");

            return $this->successResult();
        }

        return $this->error($output);
    }
}
