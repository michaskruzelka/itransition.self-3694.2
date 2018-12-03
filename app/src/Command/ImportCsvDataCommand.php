<?php

declare(strict_types=1);

namespace App\Command;

use App\Utils\CsvImporter;
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

    /**
     * @var SymfonyStyle
     */
    private $io;

    /**
     * @var CsvImporter
     */
    private $csvImporter;

    /**
     * @param CsvImporter $csvImporter
     */
    public function __construct(CsvImporter $csvImporter)
    {
        parent::__construct();

        $this->csvImporter = $csvImporter;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Imports products from csv file in the database')
            ->setHelp($this->getCommandHelp())
            ->addArgument('path_to_csv', InputArgument::REQUIRED, 'The path to the csv file')
        ;
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        $this->io = new SymfonyStyle($input, $output);
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $pathToCsv = $input->getArgument('path_to_csv');

        $stats = $this->csvImporter->import($pathToCsv);

        $this->io->success(sprintf(
            'The products have been successfully imported: %d processed, %d successful, %d skipped',
            $stats['proccessed'],
            $stats['successful'],
            $stats['skipped']));
    }

    /**
     * @return string
     */
    private function getCommandHelp(): string
    {
        return <<<'HELP'
The <info>%command.name%</info> command imports products from csv file in the database:
  <info>php %command.full_name%</info> <comment>/path/to/file.csv</comment>
HELP;
    }
}
