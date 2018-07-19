<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="float-left">Menu</h1>
                <a class="float-right btn btn-outline-success" style="margin-top: 5px;" href="<?php echo e(route('menu.create')); ?>">Adicionar Menu</a>
                <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Restaurante</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($r->id); ?></td>
                                <td><?php echo e($r->name); ?></td>
                                <td><a href="<?php echo e(route('restaurant.edit', ['id' => $r->restaurant->id])); ?>"><?php echo e($r->restaurant->name); ?></a></td>
                                <td>R$:     <?php echo e($r->price); ?></td>
                                <td>
                                    <a href="<?php echo e(route('menu.edit', ['id' => $r->id])); ?>" class="btn btn-outline-primary">Editar</a>
                                    <a href="<?php echo e(route('menu.remove', ['id' => $r->id])); ?>" class="btn btn-outline-danger">Remover</a>
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