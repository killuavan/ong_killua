<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title>Create User</title>
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
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      overflow: hidden;
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
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      position: relative;
      z-index: 2;
      padding: 20px;
    }
    
    .card {
      width: 100%;
      max-width: 500px;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
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
      text-align: center;
      font-size: 1.8rem;
      font-weight: 600;
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
    
    .card-body {
      padding: 40px;
    }
    
    .form-label {
      font-weight: 500;
      color: #333;
      margin-bottom: 8px;
      font-size: 0.95rem;
    }
    
    .form-control {
      border-radius: 12px;
      border: 2px solid #e1e5e9;
      padding: 15px 20px;
      font-size: 1rem;
      transition: all 0.3s ease;
      background: rgba(255, 255, 255, 0.8);
      backdrop-filter: blur(10px);
    }
    
    .form-control:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
      background: rgba(255, 255, 255, 0.95);
      transform: translateY(-2px);
    }
    
    .form-control::placeholder {
      color: #999;
      font-weight: 300;
    }
    
    .btn {
      padding: 15px 30px;
      border-radius: 12px;
      font-size: 1rem;
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
    
    .btn-secondary {
      background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
      color: white;
      box-shadow: 0 4px 15px rgba(108, 117, 125, 0.4);
    }
    
    .btn-secondary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(108, 117, 125, 0.6);
    }
    
    .d-flex {
      gap: 15px;
    }
    
    .mb-3 {
      margin-bottom: 25px;
    }
    
    /* Mobile-specific styles */
    @media (max-width: 768px) {
      .container {
        padding: 10px;
        min-height: 100vh;
        align-items: flex-start;
        padding-top: 20px;
      }
      
      .card {
        max-width: 100%;
        margin: 0;
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      }
      
      .card-header {
        font-size: 1.3rem;
        padding: 20px;
      }
      
      .card-body {
        padding: 25px 20px;
      }
      
      .form-control {
        padding: 12px 16px;
        font-size: 0.9rem;
        border-radius: 10px;
      }
      
      .form-label {
        font-size: 0.9rem;
        margin-bottom: 6px;
      }
      
      .btn {
        padding: 12px 20px;
        font-size: 0.9rem;
        border-radius: 10px;
        width: 100%;
        margin-bottom: 10px;
      }
      
      .d-flex {
        flex-direction: column;
        gap: 10px;
      }
      
      .mb-3 {
        margin-bottom: 20px;
      }
    }

    @media (max-width: 576px) {
      .container {
        padding: 5px;
        padding-top: 15px;
      }
      
      .card {
        border-radius: 12px;
      }
      
      .card-header {
        font-size: 1.1rem;
        padding: 15px;
      }
      
      .card-body {
        padding: 20px 15px;
      }
      
      .form-control {
        padding: 10px 14px;
        font-size: 0.85rem;
        border-radius: 8px;
      }
      
      .form-label {
        font-size: 0.85rem;
        margin-bottom: 5px;
      }
      
      .btn {
        padding: 10px 16px;
        font-size: 0.85rem;
        border-radius: 8px;
      }
      
      .mb-3 {
        margin-bottom: 18px;
      }
    }

    /* Landscape mobile */
    @media (max-width: 768px) and (orientation: landscape) {
      .container {
        padding: 5px;
        align-items: center;
        padding-top: 10px;
      }
      
      .card {
        max-width: 90%;
      }
      
      .card-header {
        padding: 15px;
        font-size: 1.2rem;
      }
      
      .card-body {
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="card shadow-lg rounded-4 border-0">
      <div class="card-header text-center rounded-top-4">
        <h2 class="mb-0">Create New User</h2>
      </div>
      <div class="card-body">
        <form method="post" action="<?= site_url('user/create') ?>">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
          </div>

          <div class="d-flex justify-content-between">
            <a href="<?= site_url() ?>" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-violet">Create User</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
