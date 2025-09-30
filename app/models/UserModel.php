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
     * Search users with pagination
     * 
     * @param string $search_term
     * @param int $per_page
     * @param int $page
     * @return array
     */
    public function search($search_term = '', $per_page = 10, $page = 1)
    {
        $offset = ($page - 1) * $per_page;
        
        if (!empty($search_term)) {
            // Get total count for pagination - create a fresh query
            $total = $this->db->table($this->table)
                             ->like('username', '%' . $search_term . '%')
                             ->or_like('email', '%' . $search_term . '%')
                             ->count();
            
            // Get paginated results - create another fresh query
            $results = $this->db->table($this->table)
                               ->like('username', '%' . $search_term . '%')
                               ->or_like('email', '%' . $search_term . '%')
                               ->pagination($per_page, $page)
                               ->get_all();
        } else {
            // No search term, get all users with pagination
            $total = $this->db->table($this->table)->count();
            $results = $this->db->table($this->table)->pagination($per_page, $page)->get_all();
        }
        
        return [
            'data' => $results,
            'total' => (int)$total,
            'per_page' => (int)$per_page,
            'current_page' => (int)$page,
            'last_page' => ceil((int)$total / (int)$per_page)
        ];
    }
}