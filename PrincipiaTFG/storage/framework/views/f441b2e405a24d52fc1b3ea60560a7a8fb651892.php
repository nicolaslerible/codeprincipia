

<?php $__env->startSection('content'); ?>
<div class="container">

    <h1 class="text-center">Administración de usuarios</h1>

    <div class="card">
        <div class="card-header">
            <form class="form-inline col-l-12">

                <label for="tipo" class="col-form-label">Filtro:</label>

                <select name="tipo" class="form-control col-l-2 mr-2">
                    <option>Parámetro</option>
                    <option value="id">Clave</option>
                    <option value="name">Nombre</option>
                    <option value="email">Email</option>
                </select>

                <input name="buscarpor" class="form-control col-l-2 mr-2" type="search" placeholder="Valor"
                    aria-label="Search">

                <button class="btn btn-dark mr-2" type="submit">Buscar</button>
                <?php if(Session::has('feedbackUsu')): ?>
                <div class="alert col-l-4" role="alert">
                    <?php echo e(session('feedbackUsu')); ?>

                </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
    <br>



    <table class="table-basic">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Role</th>
                <th scope="col">Nombre</th>
                <th scope="col" class="xs-hide">Email</th>
                <th scope="col"><a class="btn btn-dark" href="<?php echo e(route('users.create')); ?>"><b>Crear Usuario</b></a></th>
            </tr>
        </thead>
        <tbody>
            <?php if($usuarios): ?>
            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($usuario->id); ?></th>
                <td><?php echo e($usuario->role->nombre); ?></td>
                <td><?php echo e($usuario->name); ?></td>
                <td class="xs-hide"><?php echo e($usuario->email); ?></td>
                <td>

                    <?php echo Form::model($usuario, ['method' => 'DELETE', 'action' => ['AdmUsersListController@destroy',
                    $usuario->id]]); ?>

                    <a class="btn btn-yellow" href="<?php echo e(route('users.edit', $usuario->id)); ?>">Editar</a>
                    <button type="submit" class="btn btn-red">Borrar</button>
                    <?php echo Form::close(); ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </tbody>
    </table>

    <?php echo e($usuarios->links('layouts.pagination')); ?>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PrincipiaTFG\resources\views/admin/users/index.blade.php ENDPATH**/ ?>