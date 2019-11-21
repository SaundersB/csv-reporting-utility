<?php

namespace CSVReportingUtility;

use Exception;

class CSVReportUtility
{

    /**
     * @param $path
     * @param  $rows
     * @param  $filename
     * @return string|null
     */
    public static function writeDataToCSV($path, $rows, $filename)
    {
        if (!isset($rows) || sizeof($rows) <= 0) {
            return null;
        }
        try {
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $firstElement = $rows[0];
            if (!is_array($firstElement)) {
                $firstElement = $firstElement->toArray();
            }
            $fullFileName = $path . $filename;
            $file = fopen($fullFileName, 'w');
            fputcsv($file, array_keys($firstElement));
            foreach ($rows as $row) {
                if (!is_array($row)) {
                    fputcsv($file, $row->toArray());
                } else {
                    fputcsv($file, $row);
                }
            }
            fclose($file);
            return $fullFileName;
        } catch (\Exception $exception) {
            return null;
        }
    }

    public static function deleteCSVReport($path){
        try {
            unlink($path);
        } catch (Exception $exception){
            return null;
        }
    }

}
