<?php
class ResponsivePopup extends ObjectModel
{
    public $id;

    public $id_configuration;

    public $id_shop;

    public $id_lang;

    public $content;


    public static $definition = array(
        'table' => 'responsive_popup',
        'primary' => 'id_configuration',
        'fields' => array(
            'id_shop' => array('type' => self::TYPE_NOTHING),
            'id_lang' => array('type' => self::TYPE_NOTHING),
            'content' => array('type' => self::TYPE_HTML),
        ),
    );
}