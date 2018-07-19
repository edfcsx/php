<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Edição de restaurantes</h1>
                <hr/>
                <form action="<?php echo e(route('menu.update', ['id' => $menu->id])); ?>" method="post" class="form-group">
                    <?php echo e(csrf_field()); ?>


                    <p>
                        <label>Nome do Item:</label>
                        <input type="text" name="name" value="<?php echo e($menu->name); ?>" class="form-control <?php if($errors->has('name')): ?> is-invalid <?php endif; ?>">
                        <?php if($errors->has('name')): ?>
                            <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                        <?php endif; ?>
                    </p>

                    <p>
                        <label>Preço:</label>
                        <input type="text" name="price" value="<?php echo e($menu->price); ?>" class="form-control <?php if($errors->has('price')): ?> is-invalid <?php endif; ?>">
                        <?php if($errors->has('price')): ?>
                            <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('price')); ?></strong>
                                </span>
                        <?php endif; ?>
                    </p>

                    <p>
                        <label>Selecione um restaurante para alterar o item:</label>
                        <select name="restaurant_id" class="form-control">
                            <?php $__currentLoopData = $restaurant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($r->id); ?>"
                                <?php if($menu->restaurant->id == $r->id): ?>
                                    selected
                                <?php endif; ?>
                                    ><?php echo e($r->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('restaurant_id')): ?>
                            <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('restaurant_id')); ?></strong>
                                </span>
                        <?php endif; ?>
                    </p>

                    <input type="submit" value="Alterar Menu" class="btn btn-info">
                </form>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>