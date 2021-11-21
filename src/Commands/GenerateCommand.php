<?php

declare(strict_types = 1);

namespace NeueCommerce\CodingStandards\Commands;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class GenerateCommand extends BaseCommand
{
    protected function configure()
    {
        $this->setName('neuecommerce:setup-coding-standards');

        $this->addOption('force');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $files = [
            'ecs.php' => __DIR__ . '/../../stubs/ecs.php.stub',
            'phpstan.neon' => __DIR__ . '/../../stubs/phpstan.neon.stub',
            'rector.php' => __DIR__ . '/../../stubs/rector.php.stub',
        ];

        $output->writeln(
            sprintf(
                'Neue Commerce Coding Standards has %s stub files (%s)',
                count($files),
                implode(', ', array_keys($files))
            )
        );

        $force = $input->getOption('force');

        foreach ($files as $finalFile => $stubFile) {
            $path = sprintf('%s/%s', getcwd(), $finalFile);

            if (file_exists($path)) {
                if (! $force) {
                    $output->writeln("File {$finalFile} already exists. Skipping...");

                    continue;
                }

                $output->writeln("File {$finalFile} already exists. Forcing write...");
            }

            copy($stubFile, $path);

            $output->writeln("File {$finalFile} generated");
        }

        return 0;
    }
}
