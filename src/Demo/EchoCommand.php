<?php

namespace App\Demo;

use App\Command\AbstractCommand;

class EchoCommand extends AbstractCommand {
    public function __construct() {
        parent::__construct('command_name', 'Выводит аргументы и параметры в читаемом виде');
    }

    public function execute(array $arguments, array $options): void {
        echo "Called command: {$this->getName()}\n\n";

        echo "Arguments:\n";
        foreach ($arguments as $arg) {
            echo "  - $arg\n";
        }

        echo "\nOptions:\n";
        foreach ($options as $key => $value) {
            echo "  - $key\n";
            if (is_array($value)) {
                foreach ($value as $v) {
                    echo "    - $v\n";
                }
            } else {
                echo "    - $value\n";
            }
        }
    }
}
