<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    include ('index.html');
    exit;
} 

class FlashData {
    public function __construct() {
        session_start();
    }

    public function setFlashData($session_index, $session_value, $css_class) {
        if ($css_class) {
            $_SESSION[$session_index] = array('css_class' => $css_class, 'value' => $session_value);
        }
    }

    public function flashData($session_index) {
        if (isset($_SESSION[$session_index])) {
            $flashData = $_SESSION[$session_index];
            if (!empty($flashData['css_class'])) {
                $msg  = '<div class="alert '.$flashData['css_class'].' fade in alert-dismissable">';
                $msg .= '    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                $msg .=      $flashData['value'];
                $msg .= '</div>';              
            }
            unset($_SESSION[$session_index]);
        }
        else {
            $msg = '';
        }
        
        return $msg;
    }
}

$FlashData = new FlashData;
?>