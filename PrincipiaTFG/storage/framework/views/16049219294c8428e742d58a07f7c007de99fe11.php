

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-l-5">
            <h1>Bienvenido, <?php echo e($info->name); ?></h1>
            <p>
                Gracias por registrarte, ahora podras guardar tus datos en la base de datos y tus puntuaciones aparecerán en los rankings
            </p>
        </div>
        <div class="col-l-5">
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
                    <?php if($scores): ?>
                    <?php $__currentLoopData = $scores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $score): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($score->id); ?></th>
                        <td><?php echo e($score->user->name); ?></td>
                        <td><a href="<?php echo e(route('ranking', $score->codLvl)); ?>"><?php echo e($score->level->nombre); ?></a></td>
                        <td><?php echo e($score->points); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PrincipiaTFG\resources\views/user/home/index.blade.php ENDPATH**/ ?>