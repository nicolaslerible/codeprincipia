

<?php $__env->startSection('content'); ?>
<div class="container">

    <h1>Pagina de scores</h1>
    <div class="row">
        <div class="list col-l-2 col-xs-11">
            <ul class="list-nav">
                <?php $__currentLoopData = $levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="
                <?php echo e($level->id == 1 ? 'list-start' : ''); ?>

                <?php echo e($level->id == 8 ? 'list-end' : 'list-link'); ?>    
                    <?php echo e($currentLvl == $level->id ? 'list-active' : ''); ?>"
                    href="<?php echo e(route('levels.score' , $level->id)); ?>">
                    <li><?php echo e($level->nombre); ?></li>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

        <div class="col-l-9 col-xs-11">
            <table class="table-basic">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">usuario</th>
                        <th scope="col">puntuacion</th>
                        <th scope="col">acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($scores): ?>
                    <?php $__currentLoopData = $scores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $score): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($score->id); ?></th>
                        <td scope="row"><?php echo e($score->user->name); ?></td>
                        <td><?php echo e($score->points); ?></td>
                        <td>
                            <?php echo Form::model($score, ['method' => 'DELETE', 'action' => ['AdmScoreController@destroy', $score->id]]); ?>

                            <button type="submit" class="btn btn-red">Borrar</button>
                            <?php echo Form::close(); ?>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PrincipiaTFG\resources\views/admin/levels/score.blade.php ENDPATH**/ ?>