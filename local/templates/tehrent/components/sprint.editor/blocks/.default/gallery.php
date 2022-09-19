<?php
/**
 * @var array $block
 * @var CMain $APPLICATION
 * @var CBitrixComponentTemplate $this
 */

$images = Sprint\Editor\Blocks\Gallery::getImages(
    $block, [
        'width'  => 100,
        'height' => 100,
        'exact'  => 1,
    ],
    [
        'width'  => 500,
        'height' => 500,
        'exact'  => 1,
    ]
);
?>
<?php
if (!empty($images)):
    $this->registerCss('/local/js/ui/fancybox/fancybox.css');
    $this->registerJs('/local/js/ui/fancybox/fancybox.umd.js');
?>
<figure role="group" class="photos-list">
    <div class="row photos-list__row">
        <?php foreach ($images as $image): ?>
        <div class="col-xl-4 col-6 photos-list__col">
            <figure class="photos-list__item">
                <a href="<?= $image['ORIGIN_SRC']; ?>"
                   data-fancybox="gallery-page-list"
                   <?php if ($image['DESCRIPTION']): ?>data-caption="<?= $image['DESCRIPTION']; ?>"<?php endif; ?>
                   class="photos-list__link">
                    <img src="<?= $image['SRC']; ?>"
                         class="photos-list__img blur-up lazyload"
                         data-src="<?= $image['DETAIL_SRC']; ?>"
                         alt="<?= $image['DESCRIPTION']; ?>"
                         width="500"
                         height="500"></a>
                <?php if ($image['DESCRIPTION']): ?>
                <figcaption class="photos-list__figcaption">
                    <?= $image['DESCRIPTION']; ?>
                </figcaption>
                <?php endif; ?>
            </figure>
        </div>
        <?php endforeach; ?>
    </div>
</figure>
<?php endif; ?>
