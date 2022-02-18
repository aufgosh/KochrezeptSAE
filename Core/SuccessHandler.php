<?php

namespace Core;

class SuccessHandler {

    public static function generateMessage($message) {
        return '<div class="return-handler success">
        <div class="inner-main center col-md-10 col-lg-8" style="margin: auto;margin-top: 30px;">
        <h6 style="text-align: center; color: rgb(230, 230, 250)">' . $message . '</h6>
        </div>
          </div>';
    }
}