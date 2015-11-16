<?php

namespace Novius\Glossary;

class Model_Word extends \Nos\Orm\Model
{
    protected static $_primary_key = array('word_id');
    protected static $_table_name = 'novius_glossary_word';

    protected static $_properties = array(
        'word_id',
        'word_title',
        'word_publication_start',
        'word_publication_end',
        'word_created_at',
        'word_updated_at',
    );

    protected static $_title_property = 'word_title';

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'mysql_timestamp' => true,
            'property'        => 'word_created_at'
        ),
        'Orm\Observer_UpdatedAt' => array(
            'mysql_timestamp' => true,
            'property'        => 'word_updated_at'
        )
    );

    protected static $_behaviours = array(
        'Nos\Orm_Behaviour_Publishable' => array(
            'publication_state_property' => 'word_publication_status',
            'publication_start_property' => 'word_publication_start',
            'publication_end_property'   => 'word_publication_end',
        ),
    );

    protected static $_belongs_to = array();
    protected static $_has_one = array();
    protected static $_has_many = array();
    protected static $_many_many = array();
    protected static $_twinnable_belongs_to = array();
    protected static $_twinnable_has_one = array();
    protected static $_twinnable_has_many = array();
    protected static $_twinnable_many_many = array();
    protected static $_attachment = array();

}
