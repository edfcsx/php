<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Edição de Usuarios</h1>
                <hr/>
                <form action="<?php echo e(route('users.update', ['id' => $user->id])); ?>" method="post" class="form-group">
                    <?php echo e(csrf_field()); ?>

                    <p>
                        <label>Nome do usuario:</label>
                        <input type="text" name="name" value="<?php echo e($user->name); ?>" class="form-control <?php if($errors->has('name')): ?> is-invalid <?php endif; ?>">
                        <?php if($errors->has('name')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('name')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </p>

                    <p>
                        <label>Email:</label>
                        <input type="email" name="email" value="<?php echo e($user->email); ?>" class="form-control <?php if($errors->has('email')): ?> is-invalid <?php endif; ?>">
                        <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </p>

                    <p>
                        <label>Senha:</label>
                        <input id="password" type="password" name="password" value="" class="form-control <?php if($errors->has('password')): ?> is-invalid <?php endif; ?>">
                        <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </p>

                    <p>
                        <label>Confirmacao de Senha:</label>
                        <input id="password" type="password" name="password_confirmation" value="" class="form-control <?php if($errors->has('password')): ?> is-invalid <?php endif; ?>">
                        <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </p>



                    <input type="submit" value="Atualizar Usuario" class="btn btn-info btn-sm">

                </form>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>