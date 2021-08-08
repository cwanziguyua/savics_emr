<?php

namespace App\Controller;

use App\Controller\AppController;

class RequestsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        //Create instance for the logger which will write to the database file
        $this->log = new LoggerController();
    }
    public function requests()
    {
        //Get the fields from header
        $getdata = $_GET;

        if (empty($getdata)) {
            // This is a browser request
            //This reads and returns the records from the database file
            $data = $this->fetchrecords();

            $this->set('data', $data);
        } else {
            $data = $this->fetchrecords();

            print_r($data);
            die();
        }
    }

    function fetchrecords()
    {
        //Read from the data file
        $data = $this->log->ReadLog();
        $line = explode("\n", $data);

        return $line;
    }
}
