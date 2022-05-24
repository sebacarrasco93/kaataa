<?php

namespace SebaCarrasco93\Kaataa\Console\Helpers;

class CreateFromStub
{
    public $stub;
    public $content;
    public $destination;
    public $replace = [];
    public $output;
    public $fileName;

    public function __construct()
    {
        $this->destination();
    }

    public function stub(string $stubFile)
    {
        $this->stub = __DIR__ . "/../Stubs/{$stubFile}.stub";

        return $this;
    }

    public function content()
    {
        $this->content = file($this->stub);

        return $this;
    }

    public function destination(string $destination = null)
    {
        $this->destination = $destination ?: __DIR__ . '/../../';

        return $this;
    }

    public function replace(array $replace = null)
    {
        $this->replace = $replace ? : [
            '{{ class }}' => 'ClassName', // <- TODO Hardcoded
            // '{{ namespace }}' => 'Tests',
            // '{{ rootNamespace }}' => 'SebaCarrasco93\Kaataa',
        ];

        return $this;
    }

    public function output()
    {
        $newLines = [];

        foreach ($this->content as $line) {
            foreach ($this->replace as $found => $replace) {
                $newLines[] = str_replace($found, $replace, $line);
            }
        }

        $this->output = $newLines;

        return $this;
    }

    public function inDirectory($name = 'Classes')
    {
        $this->directory = $this->destination . $name;
        @mkdir($this->directory);

        return $this;
    }

    public function fileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function create()
    {
        $fileContent = $this->output;

        return file_put_contents($this->directory . '/' . $this->fileName . '.php', $fileContent);
    }
}
