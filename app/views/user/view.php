<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --primary-start:#5b7cfa; --primary-end:#7a5cf5; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--primary-start), var(--primary-end));
            margin: 0;
            padding: 20px;
            color: #fff;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.5);
        }

        table {
            width: 100%;
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.5);
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
            color: #333;
        }

        th, td {
            padding: 15px 20px;
            text-align: center;
        }

        th {
            background: linear-gradient(135deg, var(--primary-start), var(--primary-end));
            color: white;
            font-size: 18px;
            border: 0 !important;
        }
        /* Visible borders */
        .table { border: 1px solid #cfd8ff; }
        .table thead th { border-bottom: 1px solid #cfd8ff !important; }
        .table tbody td { border-top: 1px solid #e6ebff; }
        .table td + td, .table th + th { border-left: 1px solid #e6ebff; }
        thead th:first-child { border-top-left-radius: 10px; }
        thead th:last-child { border-top-right-radius: 10px; }

        tr {
            transition: background 0.15s ease;
        }

        tr:nth-child(even) {
            background: #f9fbff;
        }

        tr:nth-child(odd) {
            background: #ffffff;
        }

        tr:hover {
            background: #f0f4ff;
            box-shadow: none;
            transform: none;
        }

		/* Pagination basic styles (no external CSS required) */
		.pagination {
			list-style: none;
			padding-left: 0;
			display: inline-flex;
			gap: 8px;
		}
		.page-item { list-style: none; }
		.page-link {
			background: #fff;
			color: #333;
			padding: 8px 12px;
			border-radius: 6px;
			border: 1px solid rgba(0,0,0,0.1);
			text-decoration: none;
			box-shadow: 0 2px 4px rgba(0,0,0,0.1);
			transition: 0.2s;
		}
		.page-link:hover {
			background: linear-gradient(135deg, var(--primary-start), var(--primary-end));
			color: #fff;
			transform: translateY(-1px);
		}
		.page-item.active .page-link {
			background: linear-gradient(135deg, var(--primary-start), var(--primary-end));
			color: #fff;
			border-color: transparent;
		}

        a {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: bold;
            transition: 0.3s;
        }

        a[href*="update"] {
            background: #28a745;
            color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        }

        a[href*="update"]:hover {
            background: #218838;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
        }

        a[href*="delete"] {
            background: #e53935;
            color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        }

        a[href*="delete"]:hover {
            background: #d32f2f;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
        }

        /* Search bar styles */
        .search-container {
            width: 100%;
            margin: 0 0 15px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
        }

        .search-box:focus-within {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.4);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
        }

        .search-box input {
            background: #fff;
            border: 1px solid #e1e5e9;
            color: #333;
            font-size: 16px;
            padding: 8px 12px;
            width: 320px;
            border-radius: 8px;
        }

        .search-box input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .btn-violet { background: linear-gradient(135deg, var(--primary-start), var(--primary-end)); color: #fff; border: none; }
        .btn-violet:hover { filter: brightness(1.05); }

        /* Highlight mark */
        mark {
            background: #fff3b0;
            color: #222;
            padding: 0 2px;
            border-radius: 3px;
        }

        @media (max-width: 768px) {
            .search-container {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-box input {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <h1>Welcome to View Page</h1>

    <div class="container py-3">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="flex-grow-1">
                <form method="GET" action="<?= site_url('user'); ?>" class="search-box">
                    <input type="text" name="search" id="searchInput" class="form-control" placeholder="Search users by username or email..." 
                           value="<?= htmlspecialchars($search_term ?? ''); ?>" 
                           onkeyup="handleSearch(event)">
                    <button type="submit" class="btn btn-violet">Search</button>
                    <?php if (!empty($search_term)): ?>
                        <a href="<?= site_url('user'); ?>" class="btn btn-danger">Clear</a>
                    <?php endif; ?>
                </form>
            </div>
            <div class="ms-3">
                <a href="<?= site_url('user/create'); ?>" class="btn btn-violet">+ Create New User</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 bg-white" style="min-width:760px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th style="width:160px;">Action</th>
                    </tr>
                </thead>
                <tbody>

        <?php if (empty($users)): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4" style="color:#666;">
                                    <?php if (!empty($search_term)): ?>
                                        No users found matching "<?= htmlspecialchars($search_term); ?>". 
                                        <a href="<?= site_url('user'); ?>" class="link-primary">View all users</a>
                                    <?php else: ?>
                                        No users found.
                                    <?php endif; ?>
                                </td>
                            </tr>
        <?php else: ?>
        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user['id']; ?></td>
                <td><?php
                    $term = $search_term ?? '';
                    $username = htmlspecialchars($user['username']);
                    if ($term !== '') {
                        $username = preg_replace('/(' . preg_quote($term, '/') . ')/i', '<mark>$1<\/mark>', $username);
                    }
                    echo $username;
                ?></td>
                <td><?php
                    $email = htmlspecialchars($user['email']);
                    if ($term !== '') {
                        $email = preg_replace('/(' . preg_quote($term, '/') . ')/i', '<mark>$1<\/mark>', $email);
                    }
                    echo $email;
                ?></td>
                <td>
                    <a href="<?= site_url('user/update/'.$user['id']); ?>" class="btn btn-sm btn-success">Edit</a>
                    <a href="<?= site_url('user/delete/'.$user['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if (!empty($pagination)): ?>
                <div class="mt-3 text-center">
                    <?= $pagination; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        // Auto-submit form when user stops typing (with delay)
        let searchTimeout;
        
        function handleSearch(event) {
            clearTimeout(searchTimeout);
            if (event.key === 'Enter') {
                event.target.form.submit();
                return;
            }
            searchTimeout = setTimeout(() => {
                event.target.form.submit();
            }, 1000);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 