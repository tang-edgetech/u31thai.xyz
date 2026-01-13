<?php
$games = get_field('games', 'option');
$game_file = $games['game_json'];
$gameProviders = json_decode(file_get_contents($games['game_json']['url']), true);
?>
<section class="pt-0 pb-3" id="">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 px-4">
                <div class="row px-2 py-3 mx-0 userprofile-container w-100 mt-3 provider-list" style="gap:1%;">
                <?php
                if( $gameProviders ) {
                    $i = 0;
                    $total_count = count($gameProviders);
                    $middle = floor($total_count / 2);
                    foreach( $gameProviders as $key => $items ) {
                        $slug = $key;
                        $title = $items['title'];
                        $icon = $items['icon'];
                        $index = intval($i)+1;
                        $class_active = ($i==0) ? ' active' : '';
                        $class_active .= ' '.$slug;
                        $check_active = 'check-active';
                        if ($i < $middle) {
                            $class_active .= ' row-first';
                        }
                        else {
                            $class_active .= ' row-second mt-2';
                            $check_active .= ' d-none';
                        }
                        echo '<div class="col btn-style btn-section-bg text-0-6 text-center px-0 text-capitalize'.$class_active.'" style="min-width: 19%; max-width: 19%;" data-target="'.$slug.'">
                        <div class="mb-2 '.$check_active.'">
                            <img src="'.$icon.'" alt="provider">
                        </div>
                        '.$title.'
                    </div>';

                        $i++;
                    }
                }
                ?>
                </div>

                <div class="w-100 position-relative">
                    <div id="game_tab" class="row px-2 mx-0 w-100">
                    <?php $default_provider = 'slot';
                    if( $gameProviders[$default_provider] ) {
                        foreach( $gameProviders[$default_provider]['games'] as $key => $game ) {
                            $title = $game['title'];
                            $thumbnail = $game['thumbnail'];
                            echo '<div class="col-2 mt-2 px-2">
                            <a href="javascript:void(0)">
                                <img src="'.$thumbnail.'" alt="'.$title.'" class="w-100 rounded">
                            </a>
                        </div>';
                        }
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>