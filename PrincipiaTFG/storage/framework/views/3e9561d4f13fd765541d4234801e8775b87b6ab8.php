<!--

<?php $__env->startSection('content'); ?>
<div class="container">

    <h1 class="text-center">Lista de Niveles del administrador</h1>

    <?php if(Session::has('feedbackUsu')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('feedbackUsu')); ?>

    </div>
    <?php endif; ?>

    <table class="table-basic">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">usuario</th>
                <th scope="col">Nivel</th>
                <th scope="col">puntuacion</th>
            </tr>
        </thead>
        <tbody>
            <?php if($puntuaciones): ?>
            <?php $__currentLoopData = $puntuaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puntuacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($puntuacion->id); ?></th>
                <td><?php echo e($puntuacion->user->name); ?></td>
                <td><a href="<?php echo e(route('levels.score', $puntuacion->codLvl)); ?>"><?php echo e($puntuacion->level->nombre); ?></a></td>
                <td><?php echo e($puntuacion->points); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>-->
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PrincipiaTFG\resources\views/admin/levels/index.blade.php ENDPATH**/ ?>