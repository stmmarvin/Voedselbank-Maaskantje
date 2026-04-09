

<?php $__env->startSection('title', 'Leverancier bewerken'); ?>

<?php $__env->startSection('content'); ?>
    <section class="hero">
        <div>
            <h1>Leverancier Gegevens Bewerken</h1>
            <p>Leverancier Bewerken</p>
        </div>
    </section>

    <section class="panel" style="padding: 14px;">
        <?php if($errors->any()): ?>
            <div class="alert" style="margin-bottom: 16px; border-color: rgba(251, 191, 36, 0.28); background: rgba(251, 191, 36, 0.12); color: #fef3c7;">
                Voer geldige gegevens in
            </div>
        <?php endif; ?>

        <?php echo $__env->make('leveranciers._form', ['leverancier' => $leverancier], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Voedselbank-Maaskantje\example-app\resources\views/leveranciers/edit.blade.php ENDPATH**/ ?>