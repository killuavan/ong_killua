<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UserModel
 * 
 * Automatically generated via CLI.
 */
class UserModel extends Model {
    protected $table = 'users';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Count total records
     */
    public function count_all()
    {
        $result = $this->db->query("SELECT COUNT(*) as total FROM {$this->table}");
        return $result->row()->total;
    }
    
    /**
     * Get paginated results
     */
    public function get_paginated($limit, $offset)
    {
        $query = "SELECT * FROM {$this->table} LIMIT {$limit} OFFSET {$offset}";
        return $this->db->query($query)->result();
    }
}