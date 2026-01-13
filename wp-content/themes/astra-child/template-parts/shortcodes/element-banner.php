<?php
$banners = get_field('introduction_banner', 'option');
if( !empty($banners) ) {
    $show_navigation = isset($banners['show_navigation']) ? $banners['show_navigation'] : false;
    $show_pagination = isset($banners['show_pagination']) ? $banners['show_pagination'] : false;
?>
<section class="<?= "banner-".randomUniqueID();?> pt-0 pb-2" id="<?='banner-'.randomUniqueID();?>">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 px-3">
                <div class="swiper banner-swiper" id="banner-swiper-<?php echo randomUniqueID();?>">
                    <div class="swiper-wrapper">

                    <?php
                    foreach( $banners as $banner ) {
                    ?>
                        <div class="swiper-slide">
                            <div class="swiper-slide-inner">
                                <div class="swiper-img" data-image="<?= json_encode($banner);?>">
                                    <?php 
                                    if( !empty($banner['banner_url']) ) { echo '<a href="" class="swiper-link">'; }
                                    if( empty($banner['banner_image']) ) {
                                        $banner_image_url = ASSETS_URL . '/banner/u31th.webp';
                                        $banner_image_alt = 'U31Thai Official';
                                    }
                                    else {
                                        $banner_image_url = $banner['banner_image']['url'];
                                        $banner_image_alt = $banner['banner_image']['alt'];
                                    }
                                    echo '<img src="'.$banner_image_url.'" class="w-100 h-100" alt="'.$banner_image_alt.'"/>';
                                    if( !empty($banner['banner_url']) ) { echo '</a>'; }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    </div>
                    <?php
                    if( $show_navigation ) {
                    ?>
                    <div class="swiper-navigation">
                        <button type="button" class="btn-nav nav-prev"><span class="d-none">Prev</span><i class="fa fa-chevron-left"></i></button>
                        <button type="button" class="btn-nav nav-next"><span class="d-none">Next</span><i class="fa fa-chevron-right"></i></button>
                    </div>
                    <?php
                    }
                    if( $show_pagination ) {
                    ?>
                    <div class="swiper-pagination"></div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>