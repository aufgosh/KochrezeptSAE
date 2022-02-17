<?php

namespace Core;

class ErrorHandler
{
    public static function generateMessage($message)
    {
        #if ($bool == true) {
        return '<div class="return-handler error">
                  <div class="inner-main center col-md-10 col-lg-8" style="margin: auto;margin-top: 30px;">
                  <h6>' . $message . '</h6>
                  </div>
                    </div>';
        #} else {
        #   return '<div class="return-handler success">
        #        <div class="inner-main center col-md-10 col-lg-8" style="margin: auto;margin-top: 30px;">
        #        <h6>' . $message . '</h6>
        #        </div>
        #          </div>';
        #}
    }


}