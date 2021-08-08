<?php

namespace App\Controller;

use App\Controller\AppController;

class LoggerController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }

    function __construct()
    {
    }

    function ReadLog()
    {
        $todays_folder = '../systemlog/tmp/' . date('Y_m_d');
        $file_name = $todays_folder . '/Execution_Log_File' . '.txt';

        //Read it
        $dataopen = fopen($file_name, 'r');
        $data = fread($dataopen, filesize($file_name));

        return $data;
    }

    function ExeLog($sa, $log, $id = false)
    {
        $todays_folder = '../systemlog/tmp/' . date('Y_m_d');
        $file_name = $todays_folder . '/Execution_Log_File' . '.txt';

        if (is_dir($todays_folder)) {
            $this->PrepareLog($file_name, $log, $id);
        } else {
            mkdir($todays_folder);
            $this->PrepareLog($file_name, $log, $id);
        }

        //Check if the file exists and has been created
        if (file_exists($file_name)) {
            $fileexists = true;
        } else {
            $fileexists = false;
        }

        return $fileexists;
    }

    function PrepareLog($file_name, $log, $level)
    {
        switch ($level) {
            case 1:
                //Log Start & Date
                //file_put_contents($file_name, '[LOG START]' . "\n", FILE_APPEND);
                //Entry
                file_put_contents($file_name, $log . "\n", FILE_APPEND);
                break;
            case 2:
                //Entry
                file_put_contents($file_name, $log . "\n", FILE_APPEND);
                break;
            case 3:
                //Entry
                file_put_contents($file_name, $log . "\n", FILE_APPEND);
                //End Log
                //file_put_contents($file_name, '[LOG STOP]' . "\n", FILE_APPEND);
                break;
            default:
                break;
        }
    }
}
