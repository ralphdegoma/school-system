<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary' => base_path('/vendor/bin/wkhtmltopdf/bin/wkhtmltopdf'),
        'timeout' => false,
        'options' => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary' => base_path('/vendor/bin/wkhtmltoimage'),
        'timeout' => false,
        'options' => array(),
    ),


);
