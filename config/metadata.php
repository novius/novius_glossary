<?php

return array(
    'name'       => 'Glossary',
    'namespace'  => 'Novius\Glossary',
    'version'    => '1.0',
    'provider'   => array(
        'name' => 'Martin Smeeckaert',
    ),
    'extends'    => array(),
    'requires'   => array('noviusos_controller_front_enhancer'),
    'permission' => array(),
    'launchers'  => array(
        'Novius\Glossary::Word' => array(
            'name'   => 'Glossary',
            'action' => array(
                'action' => 'nosTabs',
                'tab'    => array(
                    'url' => 'admin/novius_glossary/appdesk',
                ),
            ),
        ),
    ),
    'enhancers'  => array(),
    'icons'      => array(
        16 => 'static/apps/novius_glossary/img/icon/16.png',
        32 => 'static/apps/novius_glossary/img/icon/32.png',
        64 => 'static/apps/novius_glossary/img/icon/64.png',
    ),
);
