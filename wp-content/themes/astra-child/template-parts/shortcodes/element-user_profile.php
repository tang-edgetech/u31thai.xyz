<?php 
$userprofile = get_field('user_profile', 'option');
$site_language = get_site_language();
if( 'melayu' == $site_language ) {
    $a = 'Daftar';
    $b = 'Log Masuk';
    $c = 'Deposit';
    $d = 'Withdraw';
    $e = 'Segar Semula';
}
else if( 'mandarin' == $site_language ) {
    $a = '注册';
    $b = '登录';
    $c = '存款';
    $d = '提取';
    $e = '刷新';
}
else if( 'thailand' == $site_language ) {
    $a = 'เข้าร่วม';
    $b = 'เข้าสู่ระบบ';
    $c = 'เงินฝาก';
    $d = 'ถอน';
    $e = 'รีเฟรช';
}
else {
    $a = 'Register';
    $b = 'Log In';
    $c = 'Deposit';
    $d = 'Withdraw';
    $e = 'Refresh';
}
$register_label = (!empty($userprofile['register'])) ? $userprofile['register']['title'] : $a;
$register_link = (!empty($userprofile['register'])) ? $userprofile['register']['url'] : '#';
$login_label = (!empty($userprofile['login'])) ? $userprofile['login']['title'] : $b;
$login_link = (!empty($userprofile['login'])) ? $userprofile['login']['url'] : '#';
$deposit_label = (!empty($userprofile['deposit'])) ? $userprofile['deposit']['title'] : $c;
$deposit_link = (!empty($userprofile['deposit'])) ? $userprofile['deposit']['url'] : '#';
$withdraw_label = (!empty($userprofile['withdraw'])) ? $userprofile['withdraw']['title'] : $d;
$withdraw_link = (!empty($userprofile['withdraw'])) ? $userprofile['withdraw']['url'] : '#';
$refresh_label = (!empty($userprofile['refresh'])) ? $userprofile['refresh']['title'] : $e;
$refresh_link = (!empty($userprofile['refresh'])) ? $userprofile['refresh']['url'] : '#';
?>
<section class="section-login py-0" id="">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 px-4">
                <div class="d-flex flex-wrap p-3 userprofile-container w-100 mt-3" id="userProfileModule">
                    <div class="d-flex flex-wrap p-0 m-0 w-100 justify-content-between mb-3">
                        <a href="<?= $register_link;?>" target="_blank" rel="nofollow noreferrer noopener" class="btn-style text-uppercase btn-section-bg col-6 text-center" style="max-width: 48.5%;" type="button" alt="Register Button" href="#"><?= $register_label;?></a>
                        <a href="<?= $login_link;?>" target="_blank" rel="nofollow noreferrer noopener" class="btn-style text-uppercase btn-primary col-6 text-center" style="max-width: 48.5%;" type="button" alt="Login Button" href="#"><?= $login_label;?></a>
                    </div>
                    <div class="d-flex m-0 p-0 w-100">
                        <div class="col-7 px-0 pe-2">
                            <div class="text-0-75">
                            <?php
                            if( 'melayu' == get_site_currency() ) { echo ''; }
                            else if( 'mandarin' == get_site_currency() ) { echo ''; }
                            else if( 'thailand' == get_site_currency() ) { echo 'ยอดเงินคงเหลือหลัก'; }
                            else { echo 'Main Balance:'; } 
                            ?>
                            </div>
                            <div class="text-1-3 text-weight-700 text-primary"><?= strtoupper(get_site_currency());?>&nbsp; <span class="setWallet-homepage d-inline-block" style="width: max-content">0.00</span></div>
                            <div class="d-flex m-0 p-0 text-0-75">
                                <div class="col-6 px-0">
                                <?php
                                if( 'melayu' == get_site_currency() ) { echo 'Depo Minimum'; }
                                else if( 'mandarin' == get_site_currency() ) { echo '最低存款'; }
                                else if( 'thailand' == get_site_currency() ) { echo 'เงินฝากขั้นต่ำ'; }
                                else { echo 'Main Balance:'; }
                                ?>
                                </div>
                                <div class="col px-0">:&nbsp;231&nbsp;<?= strtoupper(get_site_currency());?></div>
                            </div>
                            <div class="d-flex m-0 p-0 text-0-75">
                                <div class="col-6 px-0">
                                <?php
                                if( 'melayu' == get_site_currency() ) { echo 'Pengeluaran Minimum'; }
                                else if( 'mandarin' == get_site_currency() ) { echo '最低提款'; }
                                else if( 'thailand' == get_site_currency() ) { echo 'ถอนขั้นต่ำ'; }
                                else { echo 'Main Balance:'; }
                                ?>
                                </div>
                                <div class="col px-0">:&nbsp;385&nbsp;<?= strtoupper(get_site_currency());?></div>
                            </div>
                        </div>
                        <div class="col-5 px-0 ">
                            <div class="row m-0 p-0 w-100">
                                <a href="<?= $deposit_link;?>" target="_blank" rel="nofollow noreferrer noopener" class="btn-style btn-primary w-100" type="button" alt="Deposit Button">
                                    <div class="d-flex align-items-center">
                                        <img class="col-3 px-0" src="<?= ASSETS_URL;?>/icon-deposit.png" alt="token" style="max-width: 11%">
                                        <span class="col px-0 ps-2 text-0-9 text-weight-600"><?= $deposit_label;?></span>
                                    </div>
                                </a>
                                <a href="<?= $withdraw_link;?>" target="_blank" rel="nofollow noreferrer noopener" class="btn-style btn-section-bg w-100 mt-2 " type="button" alt="withdraw Button">
                                    <div class="d-flex align-items-center">
                                        <img class="col-3 px-0 filter-black-to-white" src="<?= ASSETS_URL;?>/icon-withdrawal.png" alt="token" style="max-width: 11%">
                                        <span class="col px-0 ps-2 text-0-9 text-weight-600"><?= $withdraw_label;?></span>
                                        <div class="sequence-line">
                                            <span> </span>
                                            <span> </span>
                                            <span> </span>
                                            <span> </span>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="<?= $refresh_link;?>" target="_blank" rel="nofollow noreferrer noopener" class="btn-style btn-section-bg w-100 mt-2" type="button" alt="refresh Button">
                                    <div class="d-flex align-items-center">
                                        <img class="col-3 px-0 filter-black-to-white" src="<?= ASSETS_URL;?>/icon-refresh.png" alt="token" style="max-width: 11%">
                                        <span class="col px-0 ps-2 text-0-9 text-weight-600"><?= $refresh_label;?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>