<div class="pagination">
    <?php if($paginator->lastPage() > 1): ?>
    <ul class="pagination-nav">
        <a class="pagination-link" href="<?php echo e($paginator->url(1)); ?>">
            <li class="pagination-first <?php echo e(($paginator->currentPage() == 1) ? ' disabled' : ''); ?>">
                << 
            </li>
        </a>

        <?php for($i = 1; $i <= $paginator->lastPage(); $i++): ?>
            <?php if( $paginator->currentPage()-2 < $i && $i < $paginator->currentPage()+2 ): ?>
                <a class="pagination-link" href="<?php echo e($paginator->url($i)); ?>">
                    <li class="pagination-item <?php echo e(($paginator->currentPage() == $i) ? 'pag-active active' : ''); ?>">
                        <?php echo e($i); ?>

                    </li>
                </a>
                <?php endif; ?>
                <?php endfor; ?>

                <a class="pagination-link" href="<?php echo e($paginator->url($paginator->lastPage())); ?>">
                    <li
                        class="pagination-last <?php echo e(($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : ''); ?>">
                        >>
                    </li>
                </a>
    </ul>
    <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\PrincipiaTFG\resources\views/layouts/pagination.blade.php ENDPATH**/ ?>