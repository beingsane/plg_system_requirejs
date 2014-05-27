<?php
/**
 * Joomla! System plugin - RequireJS
 *
 * @author Yireo (info@yireo.com)
 * @copyright Copyright 2013
 * @license GNU Public License
 * @link http://www.yireo.com
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

// Import the parent class
jimport( 'joomla.plugin.plugin' );

/*
 * Plugin-class
 */
class plgSystemRequireJs extends JPlugin
{
    /**
     * Constructor
     *
     * @access public
     * @param object $subject
     * @param array $config
     */
    public function __construct(& $subject, $config)
    {
        parent::__construct($subject, $config);
        $this->loadLanguage();
    }

    /**
     * Event onAfterInitialise
     *
     * @access public
     * @param null
     * @return null
     */
    public function onAfterRender()
    {
        // Load variables
        $application = JFactory::getApplication();
        $document = JFactory::getDocument();
        $user = JFactory::getUser();

        // Modify the body
        $body = JResponse::getBody();

        $requireJsTag = '<script data-main="media/plg_requirejs/js/main" src="media/plg_requirejs/js/require.min.js"></script>';
        $body = str_replace('<title>', $requireJsTag.'<title>', $body);

        JResponse::setBody($body);
    }
}
