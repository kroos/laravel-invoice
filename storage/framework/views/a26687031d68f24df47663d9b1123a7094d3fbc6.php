<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <?php if(count($errors) > 0 ): ?>
        <ul class="list-group">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="list-group-item list-group-item-danger">
                <?php echo $err; ?>

            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php endif; ?>
    </div>
</div>