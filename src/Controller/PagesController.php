<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        //Create instance for the logger which will write to the database file
        $this->log = new LoggerController();
    }
    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(...$path)
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        if ($this->request->is('post')) {
            //Get the data
            $data = $this->request->data();

            //Organize the data into a JSON object
            $myJSON = json_encode($data);

            //Send the request to the API instance for processing
            $data_posted = $this->processform($myJSON);

            //Check if the request is from API or form
            if ($data['is_api'] == '1') {
                //This is an API request, just return the data and die
                print_r($data_posted);
                die();
            } else {
                $data_posted = json_decode($data_posted, true);
                if ($data_posted['success'] == '1') {
                    $this->Flash->success(__('Record saved'));
                } else {
                    $this->Flash->error(__('Unable to save record'));
                }
            }
        }

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function processform($data)
    {
        //Write Request to file:
        $file_written = $this->log->ExeLog($data, var_export($data, true), 1);

        if ($file_written) {
            //Create a response object
            $response = json_encode(array('success' => '1', 'statuscode' => '200', 'message' => 'Request successful'));
        } else {
            $response = json_encode(array('success' => '0', 'statuscode' => '500', 'message' => 'Request failed'));
        }

        return $response;
    }
}
