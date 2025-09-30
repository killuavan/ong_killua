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

    public function index($page = 1)
    {
        $this->call->library('pagination');

        $per_page = 10;
        
        // Get page from query parameter or URL segment
        if (isset($_GET['page'])) {
            $page = is_numeric($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        } else {
            $page = is_numeric($page) ? max(1, (int)$page) : 1;
        }
        
        // Get search term from GET parameter
        $search_term = isset($_GET['search']) ? trim($_GET['search']) : '';

        // Use search method to get results
        try {
            $search_results = $this->properties['UserModel']->search($search_term, $per_page, $page);
        } catch (Exception $e) {
            // Fallback to basic pagination if search fails
            $search_results = $this->properties['UserModel']->paginate($per_page, $page);
        }
        
        $total = (int)$search_results['total'];
        $data['users'] = $search_results['data'];
        $data['search_term'] = $search_term;
        $data['total'] = $total;
        $data['page'] = $page;

        // Create custom pagination HTML
        $data['pagination'] = $this->createCustomPagination($total, $per_page, $page, $search_term);
        $data['page_info'] = 'Page (' . $page . ' of ' . ceil($total / $per_page) . ')';

        $this->call->view('user/view', $data);    
    }

    /**
     * Create custom pagination HTML with search parameter support
     */
    private function createCustomPagination($total, $per_page, $current_page, $search_term = '')
    {
        $total_pages = ceil($total / $per_page);
        
        if ($total_pages <= 1) {
            return '';
        }

        $base_url = site_url('user');
        $search_param = !empty($search_term) ? '?search=' . urlencode($search_term) . '&page=' : '?page=';
        
        $html = '<nav><ul class="pagination">';
        
        // Previous button
        if ($current_page > 1) {
            $prev_page = $current_page - 1;
            $html .= '<li class="page-item"><a class="page-link" href="' . $base_url . $search_param . $prev_page . '">Previous</a></li>';
        }
        
        // Page numbers
        $start = max(1, $current_page - 2);
        $end = min($total_pages, $current_page + 2);
        
        for ($i = $start; $i <= $end; $i++) {
            $active = ($i == $current_page) ? ' active' : '';
            $html .= '<li class="page-item' . $active . '"><a class="page-link" href="' . $base_url . $search_param . $i . '">' . $i . '</a></li>';
        }
        
        // Next button
        if ($current_page < $total_pages) {
            $next_page = $current_page + 1;
            $html .= '<li class="page-item"><a class="page-link" href="' . $base_url . $search_param . $next_page . '">Next</a></li>';
        }
        
        $html .= '</ul></nav>';
        
        return $html;
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

            $this->properties['UserModel']->insert($data);
            redirect('user');
            
        }else {
            $this->call->view('user/create');
        }
    }
    public function update($id)
    {

    $data['user'] = $this->properties['UserModel']->find($id);

    if ($this->io->method() == 'post') {    
        $data = [
            'username' => $this->io->post('username'),
            'email'    => $this->io->post('email')
        ];

        $this->properties['UserModel']->update($id, $data);

        redirect('user');
    } else {
        $this->call->view('user/update', $data);
    }
    }
    public function delete($id)
    {
        $this->properties['UserModel']->delete($id);
        redirect('user');
    }
}