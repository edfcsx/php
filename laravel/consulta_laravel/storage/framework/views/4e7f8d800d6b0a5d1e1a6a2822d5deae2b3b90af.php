<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="float-left">Restaurantes</h1>
                <a class="float-right btn btn-outline-success" style="margin-top: 5px;" href="<?php echo e(route('restaurant.new')); ?>">Adicionar restaurantes</a>
                <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Criado em</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $restaurant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($r->id); ?></td>
                        <td><?php echo e($r->name); ?></td>
                        <td><?php echo e($r->created_at); ?></td>
                        <td>
                            <a href="<?php echo e(route('restaurant.edit', ['id' => $r->id])); ?>" class="btn btn-outline-primary">Editar</a>
                            <a href="<?php echo e(route('restaurant.photo', ['id' => $r->id])); ?>" class="btn btn-outline-warning">Foto</a>
                            <a href="<?php echo e(route('restaurant.remove', ['id' => $r->id])); ?>" class="btn btn-outline-danger">Remover</a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>