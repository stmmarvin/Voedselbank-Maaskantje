<?php
    $isEditing = $leverancier->exists;
?>

<form class="stack" method="POST" action="<?php echo e($isEditing ? route('leveranciers.update', $leverancier) : route('leveranciers.store')); ?>">
    <?php echo csrf_field(); ?>

    <?php if($isEditing): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>

    <div class="form-grid">
        <div class="field">
            <label for="bedrijfsnaam">Bedrijfsnaam:</label>
            <input id="bedrijfsnaam" name="bedrijfsnaam" type="text" value="<?php echo e(old('bedrijfsnaam', $leverancier->bedrijfsnaam)); ?>" required>
            <?php $__errorArgs = ['bedrijfsnaam'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="field">
            <label for="contact_naam">Contactpersoon:</label>
            <input id="contact_naam" name="contact_naam" type="text" value="<?php echo e(old('contact_naam', $leverancier->contact_naam)); ?>" required>
            <?php $__errorArgs = ['contact_naam'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="field">
            <label for="telefoon">Telefoon:</label>
            <input id="telefoon" name="telefoon" type="text" value="<?php echo e(old('telefoon', $leverancier->telefoon)); ?>">
            <?php $__errorArgs = ['telefoon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="field">
            <label for="contact_email">Email:</label>
            <input id="contact_email" name="contact_email" type="email" value="<?php echo e(old('contact_email', $leverancier->contact_email)); ?>" required>
            <?php $__errorArgs = ['contact_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="field">
            <label for="adres">Adres:</label>
            <textarea id="adres" name="adres" required><?php echo e(old('adres', $leverancier->adres)); ?></textarea>
            <?php $__errorArgs = ['adres'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="field">
            <label for="eerstvolgende_levering">Eerstvolgende levering:</label>
            <input id="eerstvolgende_levering" name="eerstvolgende_levering" type="datetime-local" value="<?php echo e(old('eerstvolgende_levering', $leverancier->eerstvolgende_levering?->format('Y-m-d\TH:i'))); ?>">
            <?php $__errorArgs = ['eerstvolgende_levering'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="error"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>

    <div class="form-actions">
        <button class="button button-primary" type="submit">Bevestigen</button>
        <a class="button button-secondary" href="<?php echo e(route('leveranciers.index')); ?>">Annuleren</a>
    </div>
</form>
<?php /**PATH C:\Voedselbank-Maaskantje\example-app\resources\views/leveranciers/_form.blade.php ENDPATH**/ ?>