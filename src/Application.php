<?php

namespace App;

use App\IO\InputParser;
use App\Command\CommandInterface;

class Application {
    private array $commands = [];

    public function register(CommandInterface $command): void {
        $this->commands[$command->getName()] = $command;
    }

    public function run(array $argv): void {
        $parser = new InputParser($argv);

        if (empty($parser->command)) {
            echo "Available commands:\n";
            foreach ($this->commands as $command) {
                echo "- {$command->getName()}: {$command->getDescription()}\n";
            }
            return;
        }

        $cmd = $parser->command;
        if (!isset($this->commands[$cmd])) {
            echo "Command '$cmd' not found.\n";
            return;
        }

        if (in_array('help', $parser->arguments)) {
            echo $this->commands[$cmd]->getDescription() . "\n";
            return;
        }

        $this->commands[$cmd]->execute($parser->arguments, $parser->options);
    }
}
