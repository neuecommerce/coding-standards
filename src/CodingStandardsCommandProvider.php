<?php

declare(strict_types = 1);

namespace NeueCommerce\CodingStandards;

use Composer\Plugin\Capability\CommandProvider;
use NeueCommerce\CodingStandards\Commands\GenerateCommand;

final class CodingStandardsCommandProvider implements CommandProvider
{
    public function getCommands(): array
    {
        return [
            new GenerateCommand(),
        ];
    }
}
