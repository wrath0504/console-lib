<?php

namespace App\Command;

interface CommandInterface {
    public function getName(): string;
    public function getDescription(): string;
    public function execute(array $arguments, array $options): void;
}
