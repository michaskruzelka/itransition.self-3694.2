<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class ImportCsvDataCommand
 *
 * @author Michael Marchanka <m.marchenko@itransition.com>
 */
class ImportCsvDataCommand extends Command
{
    /**
     * @var string
     */
    protected static $defaultName = 'app:import-csv';


}
