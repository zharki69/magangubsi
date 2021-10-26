<?php
defined('BASEPATH') or exit('No direct script access allowed');

// https://mailtrap.io/
$config = array(
    'protocol' => 'smtp',
    'smtp_host' => 'smtp.mailtrap.io',
    'smtp_port' => 2525,
    'smtp_user' => '6d28b3d87ac286',
    'smtp_pass' => '63dee6fdbaefc7',
    'crlf' => "\r\n",
    'newline' => "\r\n",
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);

// apps.len-telko
// $config = array(
//     'protocol' => 'smtps',
//     'smtp_host' => 'zmail.idcloudonline.com',
//     'smtp_port' => 465,
//     'smtp_user' => 'no-reply@len-telko.co.id',
//     'smtp_pass' => '6JpJizR2ebwp5Qk',
//     'crlf' => "\r\n",
//     'newline' => "\r\n",
//     'mailtype' => 'html',
//     'charset' => 'iso-8859-1',
//     'wordwrap' => TRUE
// );
