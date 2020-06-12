

<?php $__env->startSection('content'); ?>
<div class="container">

    <h1>Ranking Global</h1>
    <div class="row">
        <div class="list col-l-3 col-xs-12">
            <ul class="list-nav">
                <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="
                <?php echo e($level->id == 1 ? 'list-start' : ''); ?>

                <?php echo e($level->id == 8 ? 'list-end' : 'list-link'); ?>    
                    <?php echo e($currentLvl == $level->id ? 'list-active' : ''); ?>"
                    href="<?php echo e(route('ranking', $level->id)); ?>">
                    <li><?php echo e($level->nombre); ?></li>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

        <div class="col-l-8">
            <table class="table-basic">
                <thead>
                    <tr>
                        <th scope="col">usuario</th>
                        <th scope="col">puntuacion</th>
                        <th scope="col">fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($scores): ?>
                    <?php $__currentLoopData = $scores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $score): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td scope="row"><?php echo e($score->user->name); ?></td>
                        <td><?php echo e($score->points); ?></td>
                        <td><?php echo e($score->updated_at); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PrincipiaTFG\resources\views/user/game/ranking.blade.php ENDPATH**/ ?>