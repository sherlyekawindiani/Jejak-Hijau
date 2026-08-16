<?php $pager->setSurroundCount(2); ?>

<nav aria-label="Page navigation" style="margin-top: 20px; display: flex; justify-content: center;">
    <ul class="pagination" style="display: flex; list-style: none; padding: 0; gap: 5px; align-items: center;">
        <!-- Tombol Previous -->
        <?php if ($pager->hasPrevious()) : ?>
            <li>
                <a href="<?= $pager->getPrevious() ?>" style="padding: 6px 12px; border: 1px solid #ddd; border-radius: 4px; text-decoration: none; color: #333; background: #fff;">&laquo;</a>
            </li>
        <?php else: ?>
            <li style="opacity: 0.3; pointer-events: none;">
                <span style="padding: 6px 12px; border: 1px solid #ddd; border-radius: 4px; background: #f5f5f5;">&laquo;</span>
            </li>
        <?php endif ?>

        <!-- Daftar Angka Halaman -->
        <?php foreach ($pager->links() as $link) : ?>
            <li>
                <a href="<?= $link['uri'] ?>" style="padding: 6px 12px; border: 1px solid <?= $link['active'] ? '#0f5132' : '#ddd' ?>; border-radius: 4px; text-decoration: none; color: <?= $link['active'] ? '#fff' : '#333' ?>; background: <?= $link['active'] ? '#0f5132' : '#fff' ?>;">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <!-- Tombol Next -->
        <?php if ($pager->hasNext()) : ?>
            <li>
                <a href="<?= $pager->getNext() ?>" style="padding: 6px 12px; border: 1px solid #ddd; border-radius: 4px; text-decoration: none; color: #333; background: #fff;">&raquo;</a>
            </li>
        <?php else: ?>
            <li style="opacity: 0.3; pointer-events: none;">
                <span style="padding: 6px 12px; border: 1px solid #ddd; border-radius: 4px; background: #f5f5f5;">&raquo;</span>
            </li>
        <?php endif ?>
    </ul>
</nav>