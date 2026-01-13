<?php
$top_brand = get_field('top_brand', 'option');
$ppp = $top_brand['items_per_view'];
$brands = $top_brand['brand'];
if( count($brands) >= $ppp ) {
?>
<section class="" id="">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 px-3">
                <div class="top-brand">
                <?php 
                for( $i=0;$i<$ppp;$i++ ) {
                    $brand_title = $brands[$i]['brand_title'];
                    $brand_desc = $brands[$i]['brand_description'];
                    $brand_thumbnail = $brands[$i]['brand_logo'];
                    $brand_thumbnail_tag = '';
                    if( !empty($brand_thumbnail) ) {
                        $brand_thumbnail_tag = '<img src="'.$brand_thumbnail['url'].'" alt="'.$brand_thumbnail['alt'].'"/>';
                    }
                    $brand_link = $brands[$i]['brand_link'];
                    echo '<div class="top-brand-item '.$i.' p-2">
                        <div class="top-brand-inner d-flex align-items-center justify-content-start">
                            <div class="col col-header pt-3">
                                <div class="col-image">'.$brand_thumbnail_tag.'</div>
                                <div class="col-title">'.$brand_title.'</div>
                            </div>
                            <div class="col col-desc pt-3">
                                <p class="mb-0">'.$brand_desc.'</p>
                            </div>
                            <div class="col col-cta pt-3">
                                <a href="'.$brand_link['url'].'" class="btn btn-visit" target="'.$brand_link['target'].'" rel="nofollow noreferrer noopener"><span>VISIT</span></strong></a>
                            </div>
                        </div>
                    </div>';
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}