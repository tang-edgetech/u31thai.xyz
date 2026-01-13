<?php
/**
 * 
 * Page template: Homepage / Front Page
 * 
 */

global $elementor_mode;
get_header();
?>
    <div class="main-content">
    <?php
    if( $elementor_mode == 'front-end' ) {
        $marquee = get_field('marquee', 'option');
        $marquee_switch = $marquee['switch'];
        $marquee_duration = $marquee['duration'];
        $marquee_content = $marquee['content'];
        if( $marquee_switch && !empty($marquee_content) ) {
            get_template_part( 'template-parts/shortcodes/element', 'marquee', array('duration'=> $marquee_duration, 'content'=> $marquee_content) );
        }
        ?>
        <?php
        $home_elements = get_field('home_elements', 'option');
        if( $home_elements !== null or !empty($home_elements) ) {
            foreach( $home_elements as $key => $boolean ) {
                if( $boolean === true ) {
                    get_template_part( 'template-parts/shortcodes/element', $key);
                }
            }
        }
    }
    else {
        echo '<div class="alert-wrapper p-4 my-4"><div class="alert alert-warning mb-0" role="alert">The layout is temporarily disabled within preview mode.</div></div>';
    }
    ?>
        <?php the_content();?>
    </div>
<?php
get_footer();