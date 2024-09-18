<?php
$config['enable_hooks'] = TRUE;

$hook['post_controller_constructor'][] = [
    'class'    => 'Cors',
    'function' => 'handle',
    'filename' => 'Cors.php',
    'filepath' => 'hooks'
];