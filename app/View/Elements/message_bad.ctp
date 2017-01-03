<?php if ($message): ?>
    <div class="alert alert-danger">
        <button class="close" data-close="alert"></button>
        <?php echo $message; ?>
    </div>
<?php endif; ?>