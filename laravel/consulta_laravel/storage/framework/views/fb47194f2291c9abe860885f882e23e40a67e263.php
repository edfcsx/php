<?php $__env->startSection('content'); ?>
    <h1>index fotos</h1>
    <hr/>
    <form action="<?php echo e(route('restaurant.photo.save', ['id' => $restaurant_id])); ?>" enctype="multipart/form-data" method="post">
        <?php echo e(csrf_field()); ?>

        <label>Carregar Fotos</label><br/>
        <input type="file" name="photos[]" multiple>
        <br/>
        <input type="submit" class="btn" value="enviar">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>