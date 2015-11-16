<?php
\Nos\I18n::current_dictionary('novius_glossary::common');
return array(
    'controller_url' => 'admin/novius_glossary/crud',
    'model'          => 'Novius\Glossary\Model_Word',
    'layout'         => array(
        'large'   => true,
        'title'   => 'word_title',
        'content' => array(
            'content' => array(
                'view'   => 'nos::form/expander',
                'params' => array(
                    'title'    => __('Content'),
                    'nomargin' => true,
                    'options'  => array(
                        'allowExpand' => true,
                    ),
                    'content'  => array(
                        'view'   => 'nos::form/fields',
                        'params' => array(
                            'fields' => array(
                                'wysiwygs->description->wysiwyg_text'
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'fields'         => array(

        'word_title'                          => array(
            'label' => __('Title'),
            'form'  => array(
                'type' => 'text',
            ),
        ),
        'wysiwygs->description->wysiwyg_text' => array(
            'label'    => __('Description'),
            'renderer' => 'Nos\Renderer_Wysiwyg',
            'template' => '<tr><th>{label}</th><td>{field}</td></tr>',
            'form'     => array(
                'style' => 'width: 100%; height: 500px;',
            ),
        ),
    )
);
