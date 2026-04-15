

<?php $__env->startSection('title', 'Leveranciersoverzicht'); ?>

<?php $__env->startSection('content'); ?>
    <section class="hero">
        <div>
            <h1>Leverancier Overzicht</h1>
            <p>Bekijk alle leveranciers.</p>
        </div>

        <a class="button button-primary" href="<?php echo e(route('leveranciers.create')); ?>">Leverancier toevoegen</a>
    </section>

    <section class="panel" style="padding: 10px; margin-bottom: 14px;">
        <form method="GET" action="<?php echo e(route('leveranciers.index')); ?>">
            <input
                type="search"
                name="zoek"
                value="<?php echo e($zoek); ?>"
                placeholder="Zoeken..."
                aria-label="Zoeken in leveranciers"
                style="width: 100%; max-width: 320px; padding: 6px 10px; border-radius: 6px; border: 1px solid #bdbdbd; background: #ffffff; color: #222;"
            >
        </form>
    </section>

    <section class="panel">
        <table class="table">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Contact</th>
                    <th>Locatie</th>
                    <th>Status</th>
                    <th>Eerstvolgende levering</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $leveranciers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leverancier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $levering = $leverancier->eerstvolgende_levering;
                        $isBezig = $levering && $levering->isAfter(now());
                        $isVoltooid = $levering && !$isBezig;
                    ?>
                    <tr>
                        <td>
                            <strong><?php echo e($leverancier->bedrijfsnaam); ?></strong>
                        </td>
                        <td>
                            <?php echo e($leverancier->contact_naam); ?><br>
                            <span class="muted"><?php echo e($leverancier->contact_email); ?></span>
                        </td>
                        <td><?php echo e($leverancier->adres); ?></td>
                        <td>
                            <?php if($isBezig): ?>
                                <span class="badge" style="background: #fff3cd; color: #856404;">Bezig</span>
                            <?php elseif($isVoltooid): ?>
                                <span class="badge" style="background: #cce5ff; color: #004085;">Voltooid</span>
                            <?php else: ?>
                                <span class="badge" style="background: #d4edda; color: #155724;">Inactief</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($levering): ?>
                                <?php echo e($levering->format('d-m-Y')); ?>

                            <?php else: ?>
                                <span class="muted">—</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="actions">
                                <a class="button button-secondary" href="<?php echo e(route('leveranciers.edit', $leverancier)); ?>">Bewerken</a>
                                <form method="POST" action="<?php echo e(route('leveranciers.destroy', $leverancier)); ?>" onsubmit="return confirm('Weet je zeker dat je deze leverancier wilt verwijderen?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="button button-danger" type="submit">Verwijder</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6">
                            <div class="empty">
                                Nog geen leveranciers gevonden.
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="mobile-list">
            <?php $__empty_1 = true; $__currentLoopData = $leveranciers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leverancier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $levering = $leverancier->eerstvolgende_levering;
                    $isBezig = $levering && $levering->isAfter(now());
                    $isVoltooid = $levering && !$isBezig;
                ?>
                <div class="mobile-item">
                    <div class="mobile-title"><?php echo e($leverancier->bedrijfsnaam); ?></div>
                    <div class="muted"><?php echo e($leverancier->contact_naam); ?> | <?php echo e($leverancier->adres); ?></div>
                    <div style="margin-top: 8px;">
                        <?php if($isBezig): ?>
                            <div><strong>Status:</strong> <span class="badge" style="background: #fff3cd; color: #856404;">Bezig</span></div>
                            <div style="margin-top: 4px;"><strong>Levering:</strong> <?php echo e($levering->format('d-m-Y')); ?></div>
                        <?php elseif($isVoltooid): ?>
                            <div><strong>Status:</strong> <span class="badge" style="background: #cce5ff; color: #004085;">Voltooid</span></div>
                            <div style="margin-top: 4px;"><strong>Levering:</strong> <?php echo e($levering->format('d-m-Y')); ?></div>
                        <?php else: ?>
                            <div><strong>Status:</strong> <span class="badge" style="background: #d4edda; color: #155724;">Inactief</span></div>
                        <?php endif; ?>
                    </div>
                    <div class="actions" style="margin-top: 12px;">
                        <a class="button button-secondary" href="<?php echo e(route('leveranciers.edit', $leverancier)); ?>">Bewerken</a>
                        <form method="POST" action="<?php echo e(route('leveranciers.destroy', $leverancier)); ?>" onsubmit="return confirm('Weet je zeker dat je deze leverancier wilt verwijderen?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="button button-danger" type="submit">Verwijder</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="empty">Nog geen leveranciers gevonden.</div>
            <?php endif; ?>
        </div>
    </section>

    <style>
        .mobile-list { display: none; }
        .mobile-item {
            padding: 12px 0;
            border-bottom: 1px solid #d0d0d0;
        }

        .mobile-item:last-child { border-bottom: 0; }
        .mobile-title { font-weight: 700; margin-bottom: 6px; }
        
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        @media (max-width: 992px) {
            .table { display: none; }
            .mobile-list { display: grid; gap: 12px; }
        }

        @media (min-width: 993px) {
            .mobile-list { display: none; }
            .table { display: table !important; }
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Voedselbank-Maaskantje\example-app\resources\views/leveranciers/index.blade.php ENDPATH**/ ?>