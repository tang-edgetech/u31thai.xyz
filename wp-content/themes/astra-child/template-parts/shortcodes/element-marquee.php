
<div class="marquee scrolling-container p-0 d-flex align-items-center mx-auto pnpm4-page-content-inner">
    <div class="mx-3">
        <img src="<?= ASSETS_URL;?>/bell.png" width="18px" class="bell">
    </div>
    <div class="col" style="overflow:hidden;">
        <span class="h-100" width="90%" style="animation-duration:<?= (!empty($args['duration'])) ? $args['duration'].'s'   : '20s'; ?>;"><?php echo $args['content'];?></span>
    </div>
</div>