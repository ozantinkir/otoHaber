<?php

/**
 * Sample Model File for Sunhill Framework
 *
 * (c) Sunhill Technology <www.sunhillint.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Namespace for model
 * Use App/Models directory
 */
namespace App\Models;

/**
 * Inherit from the main model
 * Change class name (use page's name always)
 * Don't change parent model path and name
 */
class Giris extends \Core\Model
{

    public function show() {
        // There's nothing here, because this 404 page does not need db
    }
    
    /**
     * Optional method for this controller
     * If this page is called by the controller with 'detail' parameter, this method will work
     */
    public function detail($params = null) {

        $kullanici = $GLOBALS['sunApp']->secureVar($params['kullaniciadi'], 'string'); // get posted parameter
        $sifre = $GLOBALS['sunApp']->secureVar($params['sifre'], 'string'); // get posted parameter
        $sifre = sha1(md5($sifre));

        if (!empty($kullanici) && !empty($sifre)) { // if posted values not empty
            $data = [
                'kullaniciadi'      => $kullanici,
                'sifre'   => $sifre
                          ];
                        
            $select = ($this->pdo)->select('yonetici')
                                  ->where('kullaniciadi', $kullanici, 'sifre', $sifre,'&&')
                                  ->run();
                        }        
        if ($select["id"]>0) {
            $_SESSION["giris"] = $select["id"];
            header("Location:index.php");
        } else {
            echo "<script>
            alert('HATALI KULLANICI ADI/ŞİFRE!');
            window.location.href = 'index.php';
            </script>";
        }
    }

    /**
     * Other optional methods related with db called from the controller
     */

}

?>