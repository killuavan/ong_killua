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
    
    public function view($page = null)
    {
        // Get pagination parameters
        $page = $page ?: $this->io->get('page') ?: 1;
        $page = (int)$page; // Ensure it's an integer
        $per_page = 5;
        
        // Get total count for pagination
        $total_users = $this->UserModel->count_all();
        
        // Calculate offset
        $offset = ($page - 1) * $per_page;
        
        // Get paginated users
        $users = $this->UserModel->get_paginated($per_page, $offset);
        
        $data = [
            'users' => $users,
            'total_users' => $total_users,
            'page' => $page
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