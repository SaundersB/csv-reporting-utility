<?php


use BrandonSaunders\CSV;
use PHPUnit\Framework\TestCase;

class CSVReportUtilityTest extends TestCase
{
    public function testCreatesFile(): void
    {
        $sampleData = [
            [
                "first_col" => "test",
                "second_col" => null,
                "third_col" => "test",
            ],
            [
                "first_col" => "test",
                "second_col" => null,
                "third_col" => "test",
            ],
            [
                "first_col" => "test",
                "second_col" => null,
                "third_col" => "test",
            ],
        ];

        $testFile = CSV\CSVReportUtility::writeDataToCSV(__DIR__ . '/', $sampleData, 'test_file.csv');
        $this->assertFileExists($testFile);
        unlink($testFile);
    }
}
