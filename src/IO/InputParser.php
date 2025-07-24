<?php

namespace App\IO;

class InputParser {
    public string $command = '';
    public array $arguments = [];
    public array $options = [];

    public function __construct(array $argv) {
        array_shift($argv);

        if (count($argv) === 0) return;

        $this->command = array_shift($argv);
        foreach ($argv as $arg) {
            if (preg_match('/^{(.+)}$/', $arg, $matches)) {
                $this->arguments = array_merge($this->arguments, explode(',', $matches[1]));
            } elseif (preg_match('/^\[(\w+)=\{(.+)}\]$/', $arg, $matches)) {
                $this->options[$matches[1]] = explode(',', $matches[2]);
            } elseif (preg_match('/^\[(\w+)=(.+)\]$/', $arg, $matches)) {
                $this->options[$matches[1]] = $matches[2];
            }
        }
    }
}
