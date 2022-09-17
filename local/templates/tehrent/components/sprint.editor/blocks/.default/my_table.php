<?php
/**
 * @var array $block
 * @var CMain $APPLICATION
 */
?>
<?php if ($block['rows']): ?>
<div class="table-responsive">
    <table class="table table-bordered caption-top align-middle">
        <?php if ($block['table_caption']): ?>
        <caption class="h2"><?= $block['table_caption']; ?></caption>
        <?php endif; ?>
        <thead>
        <?php foreach ($block['rows'] as $key_row => $cols): ?>
            <?php if ($key_row === 0): ?>
            <tr>
                <?php
                foreach ($cols as $col_key =>$col):
                    $col = Sprint\Editor\Blocks\Table::prepareColumn($col);
                ?>
                <th scope="row"
                    <?php if ($col['style']): ?> style="<?= $col['style']; ?>"<?php endif; ?>
                    <?php if ($col['colspan']): ?> colspan="<?= $col['colspan']; ?>"<?php endif; ?>
                    <?php if ($col['rowspan']): ?> rowspan="<?= $col['rowspan']; ?>"<?php endif; ?>
                >
                    <?= str_replace('; ', '<br>', $col['text']); ?>
                </th>
                <?php endforeach; ?>
            </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </thead>
        <tbody>
        <?php foreach ($block['rows'] as $key_row => $cols): ?>
            <?php if ($key_row !== 0): ?>
                <tr>
                    <?php
                    foreach ($cols as $col_key =>$col):
                        $col = Sprint\Editor\Blocks\Table::prepareColumn($col);
                        ?>
                        <td <?php if ($col['style']): ?> style="<?= $col['style']; ?>"<?php endif; ?>
                            <?php if ($col['colspan']): ?> colspan="<?= $col['colspan']; ?>"<?php endif; ?>
                            <?php if ($col['rowspan']): ?> rowspan="<?= $col['rowspan']; ?>"<?php endif; ?>
                        >
                            <?= str_replace('; ', '<br>', $col['text']); ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>