<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

// ini adalah middleware

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // do nothing
} else {

    // pengecekan maintenance
    $hook['pre_system'][] = array(
        'class'    => 'maintenance_hook',
        'function' => 'offline_check',
        'filename' => 'maintenance_hook.php',
        'filepath' => 'hooks'
    );



    $segments = explode('/', trim($_SERVER['REQUEST_URI'], '/'));


    // localhost
    if (count($segments) > 1) {
        $controller = $segments[1];
        if (isset($segments[2])) {
            $method = $segments[2];
        } else {
            $method = null;
        }
    } else {
        $controller = null;
        $method = null;
    }

    $without_main_hooks_header = array(
        // 'auth',
        'digitalisasi'
    );
    $without_main_hooks_nav = array(
        // 'auth',
        'rekrutmen',
        'digitalisasi'
    );
    $without_trigger_controller = array(
        'auth',
        'rekrutmen',
        'rekrutmen_admin',
    );


    // var_dump($controller);
    // var_dump($without_main_hooks_header);
    // var_dump(in_array($controller, $without_main_hooks_header));

    if (!in_array($controller, $without_main_hooks_header)) {

        if (in_array($controller, $without_main_hooks_nav) and $method != 'admin') {

            $hook['post_controller_constructor'][] = array(
                'class'    => '',
                'function' => 'showHeader',
                'filename' => 'header.php',
                'filepath' => 'hooks',
                'params'   => array('judul')
            );
        } else {
            $hook['post_controller_constructor'][] = array(
                'class'    => '',
                'function' => 'showHeaderNav',
                'filename' => 'header.php',
                'filepath' => 'hooks',
                'params'   => array('judul')
            );
        }
        $hook['post_controller'][] = array(
            'class'    => '',
            'function' => 'showFooter',
            'filename' => 'footer.php',
            'filepath' => 'hooks',
            'params'   => ''
        );
        // Hook to count number of website visits
        // $hook['post_system'] = array(
        //     'class'    => 'Visitor_counter',
        //     'function' => 'countVisits',
        //     'filename' => 'Visitor_counter.php',
        //     'filepath' => 'hooks'
        // );
    }
    $newFileName = basename($controller, ".html");
    if (!in_array($newFileName, $without_trigger_controller)) {
        // die;
        $hook['post_controller_constructor'][] = array(
            'class'    => '',
            'function' => 'required',
            'filename' => 'trigger_controller.php',
            'filepath' => 'hooks',
            'params'   => array('judul')
        );
    }
}
