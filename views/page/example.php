<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($title); ?></title>
    <style>
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .search-box { margin: 20px 0; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { padding: 10px; border: 1px solid #ddd; }
        .table th { background: #f5f5f5; }
        .pagination { margin: 20px 0; }
        .pagination a { padding: 5px 10px; margin: 0 5px; }
        .pagination a.active { background: #007bff; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($title); ?></h1>

        <!-- Search Form -->
        <div class="search-box">
            <form method="GET">
                <input type="text" name="search" 
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                    placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </div>

        <!-- Data Table -->
        <?php if (!empty($items)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['id']); ?></td>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td><?php echo htmlspecialchars($item['description']); ?></td>
                            <td><?php echo htmlspecialchars($item['created_at']); ?></td>
                            <td>
                                <a href="/edit/<?php echo $item['id']; ?>">Edit</a>
                                <a href="/delete/<?php echo $item['id']; ?>" 
                                   onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <?php if (isset($totalPages) && $totalPages > 1): ?>
                <div class="pagination">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=<?php echo $i; ?><?php echo isset($_GET['search']) ? '&search=' . htmlspecialchars($_GET['search']) : ''; ?>" 
                           class="<?php echo ($currentPage == $i) ? 'active' : ''; ?>">
                            <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <p>No items found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
