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
        
        $create->stub('class')
            ->content()
            ->replace([
                '{{ class }}' => $name . 'Test'
            ])->inDirectory('Classes')
            ->output()
            ->fileName($name . 'Test')
            ->create()
        ;

        $result_one = $this->createClassFile($name);

        if ($result_one) {
            $this->success($output, "Your test {$name} was created");

            return $this->successResult();
        }

        return $this->error($output);
    }

    private $location = __DIR__ . '/../../Classes/';

    public function createClassFile($name): bool
    {
        @mkdir($this->location);
        $fileContent = $this->processTemplateFromFile('class');

        return file_put_contents($this->location . $name, $fileContent);
    }

    public function replace()
    {
        return [
            '{{ class }}' => 'ClassName', // <- TODO Hardcoded

            // '{{ namespace }}' => 'Tests',
            // '{{ rootNamespace }}' => 'SebaCarrasco93\Kaataa',
        ];
    }

    public function processTemplateFromFile($file)
    {
        $lines = file($this->getStub($file));

        $newLines = [];

        foreach ($lines as $line) {
            foreach ($this->replace() as $found => $replace) {
                $newLines[] = str_replace($found, $replace, $line);
            }
        }

        return $newLines;
    }
}
