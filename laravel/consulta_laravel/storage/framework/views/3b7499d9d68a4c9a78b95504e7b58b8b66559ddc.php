<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>insercao de restaurantes</h1>
                <hr/>
                    <form action="<?php echo e(route('restaurant.store')); ?>" method="post" class="form-group">
                        <?php echo e(csrf_field()); ?>

                        <p>
                            <label>Nome do restaurante:</label>
                            <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control <?php if($errors->has('name')): ?> is-invalid <?php endif; ?>">
                            <?php if($errors->has('name')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </p>

                        <p>
                            <label>Endereco:</label>
                            <input type="text" name="address" value="<?php echo e(old('address')); ?>" class="form-control <?php if($errors->has('address')): ?> is-invalid <?php endif; ?>">
                            <?php if($errors->has('address')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('address')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </p>

                        <p>
                            <label>Fale um pouco sobre o restaurante:</label><br/>
                            <textarea name="description" cols="50" rows="10" class="form-control <?php if($errors->has('description')): ?> is-invalid <?php endif; ?>"><?php echo e(old('description')); ?></textarea>
                            <?php if($errors->has('description')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </p>
                        <input type="submit" value="Cadastrar Restaurante" class="btn btn-info">
                    </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>