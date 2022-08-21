<?php

/**
 * Sample View File for Sunhill Framework
 *
 * (c) Sunhill Technology <www.sunhillint.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

include_once (__DIR__ . '/header.php'); // include template file (optional)

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="text-danger text-center mb-5">Yönetici Girişi</h3>
        </div>
        <form method="post" action="giris/detail" >
            <div class="row">
                <div class="col-sm-5 col-md-4" style="margin-bottom:15px;">
                <input type="text" name="user" class="form-control" placeholder="Username">
                </div>
                <div class="col-sm-7 col-md-6" style="margin-bottom:15px;">
                <input type="password" name="pass" class="form-control" placeholder="Pass">
                </div>
                <div class="col-sm-12 col-md-2 text-end" style="margin-bottom:15px;">
                    <button  type="submit" class="btn btn-success"><i class="bi bi-send-fill me-2"></i> Giriş</button>
                </div>
            </div>
        </form>
        <div class="col-12">
            <hr class="hr mt-4">
        </div>



<?php

include_once (__DIR__ . '/footer.php'); // include template file (optional)

?>