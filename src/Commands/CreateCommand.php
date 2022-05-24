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
        $this->setDescription('Create a project')
            ->setHelp('Create a Class and a Test file')
            ->addArgument('name',
                $this->name ? InputArgument::REQUIRED : InputArgument::OPTIONAL,
                'Specify their name'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if ($name = $input->getArgument('name')) {
            return $this->intentarCrearProyecto($output, $name);
        }

        return $this->mostrarInvalidoProyectoSinname($output);
    }

    public function intentarCrearProyecto(OutputInterface $output, $name)
    {
        $output->writeln("✅ Se creó el proyecto {$name}!");

        return $this->success();
    }

    public function mostrarError(OutputInterface $output, $mensaje = null)
    {
        $output->writeln('❌ Se produjo un error...');

        if ($mensaje) {
            $output->writeln($mensaje);
        }

        return $this->failure();
    }

    public function mostrarInvalidoProyectoSinname(OutputInterface $output)
    {
        $output->writeln('❌ Please provide the name');

        return $this->invalid();
    }
}
