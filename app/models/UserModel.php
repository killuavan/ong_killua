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
        $result = $this->db->raw("SELECT COUNT(*) as total FROM {$this->table}");
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }
    
    /**
     * Get paginated results
     */
    public function get_paginated($limit, $offset)
    {
        $result = $this->db->raw("SELECT * FROM {$this->table} LIMIT {$limit} OFFSET {$offset}");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}