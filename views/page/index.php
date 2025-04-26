

<div class="container mt-4">
    <h1><?php echo htmlspecialchars($title ?? 'Default Title'); ?></h1>
    
    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <div class="content">
        <?php if (!empty($content)): ?>
            <?php echo htmlspecialchars($content); ?>
        <?php else: ?>
            <p>No content available</p>
        <?php endif; ?>
    </div>
</div>
