<?php

namespace Core;

class ErrorHandler {

    private $message;
    private $error;
    private $success;
    private $type;

    public function displayMessage($message, $bool) {
        if($bool == true) {
            echo '<div class="return-handler error">
                  <div class="inner-main center col-md-10 col-lg-8" style="margin-top: 30px;">
                  <h6>'.$message.'</h6>
                  </div>
                    </div>';
        } else {
            echo '<div class="return-handler success">
                  <div class="inner-main center col-md-10 col-lg-8" style="margin-top: 30px;">
                  <h6>'.$message.'</h6>
                  </div>
                    </div>';
        }
    }


}
