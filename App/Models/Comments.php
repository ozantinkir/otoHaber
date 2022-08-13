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
class Comments extends \Core\Model
{

    /**
     * Main method of the model
     * Don't change the method's name
     * If this page is called by the controller without method parameter, this will work first
     */
    public function show() {
        $result = ($this->pdo)->select('yorumlar')
                              ->where('aktif', '1', '=')
                              ->orderBy('tarih', 'desc')
                              ->run(); // select all records from the table
        return $result; // return the result
    }
    
    /**
     * Optional method for this controller
     * If this page is called by the controller with 'send' parameter, this method will work
     */
    public function send($params = null) {
        $name = $GLOBALS['sunApp']->secureVar($params['adsoyad'], 'string'); // get posted parameter
        $comment = $GLOBALS['sunApp']->secureVar($params['yorumlar'], 'string'); // get posted parameter
        if (!empty($name) && !empty($comment)) { // if posted values not empty
            $data = [
                'adsoyad'      => $name,
                'yorum'   => $comment,
                'tarih'  => date("Y-m-d H:i:s"),
                'aktif'    => 1
            ]; // values array for insert to the table
            $insert = ($this->pdo)->insert('yorumlar', $data)
                                  ->run(); // insert the values to the table
            if ($insert === true && ($this->pdo)->rowCount() > 0) { // if record inserted (successful)
                return true;
            } else { // if record not inserted
                return false;
            }
        } else { // if posted values empty
            return false;
        }
    }

    /**
     * Other optional methods related with db called from the controller
     */

}

?>