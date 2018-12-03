<?php

declare(strict_types=1);

namespace App\Utils;

use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class CsvImporter
 *
 * @author Michael Marchanka <m.marchenko@itransition.com>
 */
class CsvImporter
{
    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param string $pathToFile
     *
     * @return array
     */
    public function import(string $pathToFile): array
    {

        // fetching data from a csv - https://codereviewvideos.com/course/how-to-import-a-csv-in-symfony/video/importing-csv-data-the-easy-way
        // bulk insert - https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/reference/batch-processing.html


        $stats = [];

        return $stats;
    }
}
