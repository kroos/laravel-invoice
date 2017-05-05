<div class="row">
    <div class="col-sm-8 col-sm-offset-2">

        <?php if(Session::has('flash_message')): ?>
        <div class="alert alert-success">
            <?php echo e(Session::get('flash_message')); ?>

        </div>
        <?php endif; ?>
   </div>
</div>