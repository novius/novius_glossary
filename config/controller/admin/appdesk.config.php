<?php
\Nos\I18n::current_dictionary('novius_glossary::common');
return array(
    'model'       => 'Novius\Glossary\Model_Word',
    'search_text' => 'word_title',
    'i18n'        => array(
        'item'        => __('word'),
        'items'       => __('words'),
        'showNbItems' => __('Showing {{x}} words out of {{y}}'),
        'showOneItem' => __('Showing 1 word'),
        'showNoItem'  => __('No word'),
        // Note to translator: This is the action that clears the 'Search' field
        'showAll'     => __('Show all words'),
        'Pick'        => __('Pick'),
    ),
);
