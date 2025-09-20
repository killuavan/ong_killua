<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ONG Killua - User Management System</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      min-height: 100vh;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: #fff;
      position: relative;
      overflow-x: hidden;
    }
    
    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.05)"/><circle cx="10" cy="60" r="0.5" fill="rgba(255,255,255,0.05)"/><circle cx="90" cy="40" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
      opacity: 0.3;
      z-index: 1;
    }
    
    .container {
      position: relative;
      z-index: 2;
    }
    
    .card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      color: #333;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1), 0 0 0 1px rgba(255, 255, 255, 0.2);
      border: 1px solid rgba(255, 255, 255, 0.3);
      animation: slideUp 0.6s ease-out;
    }
    
    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .card-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
      padding: 25px;
      position: relative;
      overflow: hidden;
    }
    
    .card-header::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      animation: shimmer 3s infinite;
    }
    
    @keyframes shimmer {
      0% { left: -100%; }
      100% { left: 100%; }
    }
    
    .card-header h2 {
      font-size: 2rem;
      font-weight: 600;
      margin: 0;
    }
    
    .btn {
      padding: 10px 20px;
      border-radius: 10px;
      font-size: 0.9rem;
      font-weight: 500;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
      position: relative;
      overflow: hidden;
    }
    
    .btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.5s;
    }
    
    .btn:hover::before {
      left: 100%;
    }
    
    .btn-violet {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }
    
    .btn-violet:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
    }
    
    .btn-danger {
      background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
      color: white;
      box-shadow: 0 4px 15px rgba(255, 107, 107, 0.4);
    }
    
    .btn-danger:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(255, 107, 107, 0.6);
    }
    
    .table {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    .table thead {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: #fff;
    }
    
    .table thead th {
      border: none;
      padding: 20px 15px;
      font-weight: 600;
      font-size: 0.95rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    
    .table tbody td {
      border: none;
      padding: 20px 15px;
      vertical-align: middle;
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .table-hover tbody tr {
      transition: all 0.3s ease;
    }
    
    .table-hover tbody tr:hover {
      background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .d-flex {
      gap: 10px;
    }
    
    .mb-3 {
      margin-bottom: 20px;
    }
    
    /* Pagination Styles */
    .pagination {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 5px;
      margin: 20px 0;
    }

    .pagination a,
    .pagination span {
      display: inline-block;
      padding: 10px 15px;
      margin: 0 2px;
      border-radius: 10px;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
      border: 1px solid rgba(102, 126, 234, 0.3);
      background: rgba(255, 255, 255, 0.9);
      color: #667eea;
      min-width: 40px;
      text-align: center;
    }

    .pagination a:hover {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .pagination .current {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .pagination .disabled {
      opacity: 0.5;
      cursor: not-allowed;
      pointer-events: none;
    }

    .pagination .disabled:hover {
      transform: none;
      box-shadow: none;
    }

    @media (max-width: 768px) {
      .table thead th,
      .table tbody td {
        padding: 15px 10px;
        font-size: 0.9rem;
      }
      
      .btn {
        padding: 8px 15px;
        font-size: 0.85rem;
      }
      
      .card-header h2 {
        font-size: 1.5rem;
      }

      .pagination a,
      .pagination span {
        padding: 8px 12px;
        font-size: 0.9rem;
        min-width: 35px;
      }
    }
  </style>
</head>
<body>

  <div class="container py-5">
    <div class="card shadow-lg rounded-4 border-0">
      <div class="card-header text-center rounded-top-4">
        <h2 class="mb-0">🎉 Welcome to ONG Killua</h2>
        <p class="mb-0 mt-2" style="opacity: 0.9;">User Management System</p>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
          <a href="<?= site_url('user/create'); ?>" class="btn btn-violet">Create New User</a>
        </div>
        <?php
        // Pagination setup
        $total_rows = isset($total_users) ? $total_users : (is_array($users) && isset($users['total']) ? $users['total'] : count($users));
        $rows_per_page = 10;
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $url = 'user/view';

        // Initialize pagination
        $meta = $this->pagination->initialize($total_rows, $rows_per_page, $current_page, $url);
        
        // Handle different data structures
        $users_data = is_array($users) && isset($users['data']) ? $users['data'] : $users;
        ?>

        <table class="table table-hover table-bordered align-middle text-center mb-4">
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach (html_escape($users_data) as $user): ?>
              <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['username']; ?></td>
                <td><?= $user['email']; ?></td>
                <td>
                  <a href="<?= site_url('user/update/'.$user['id']); ?>" class="btn btn-sm btn-violet">Edit</a>
                  <a href="<?= site_url('user/delete/'.$user['id']); ?>" 
                     class="btn btn-sm btn-danger"
                     onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
          <?= $this->pagination->paginate(); ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
