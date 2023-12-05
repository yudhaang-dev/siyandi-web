<?php 
return [
    'apps' => [
        'portal'    => [
            'route_prefix'  => 'portal',
            'route_name'    => 'portal.',
            'guard_name'    => 'portal'
        ],
        'panel'     => [
            'route_prefix'  => 'backoffice',
            'route_name'    => 'panel.',
            'guard_name'    => 'web'
        ]
    ]
];