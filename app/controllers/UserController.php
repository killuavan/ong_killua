<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UserController
 * 
 * Automatically generated via CLI.
 */
class UserController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->view();
    }
    
    public function view()
    {
        // Get pagination parameters
        $page = $this->io->get('page') ?: 1;
        $per_page = 10;
        
        // Get total count for pagination
        $total_users = $this->UserModel->count_all();
        
        // Calculate offset
        $offset = ($page - 1) * $per_page;
        
        // Get paginated users
        $users = $this->UserModel->get_paginated($per_page, $offset);
        
        $data = [
            'users' => $users,
            'total_users' => $total_users
        ];
        
        $this->call->view('user/view', $data);
    }
    public function create()
    {
        if($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $email = $this->io->post('email');

            $data = [
                'username' => $username,
                'email' => $email
            ];

            $this->UserModel->insert($data);
            redirect('/');
            
        }else {
            $this->call->view('user/create');
        }
    }
    public function update($id)
    {

    $data['user'] = $this->UserModel->find($id);

    if ($this->io->method() == 'post') {    
        $data = [
            'username' => $this->io->post('username'),
            'email'    => $this->io->post('email')
        ];

        $this->UserModel->update($id, $data);

        redirect('/');
    } else {
        $this->call->view('user/update', $data);
    }
    }
    public function delete($id)
    {
        $this->UserModel->delete($id);
        redirect('/');
    }
}