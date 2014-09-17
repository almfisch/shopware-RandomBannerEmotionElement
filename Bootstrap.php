<?php

class Shopware_Plugins_Backend_RandomBannerEmotionElement_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
	public function getInfo()
    {
    	return array(
    		'version' => '1.0.0',
			'autor' => 'Die Chiemseeler',
			'copyright' => 'Copyright © 2013, Die Chiemseeler',
			'label' => 'Random Banner Emotion-Element',
			'source' => 'Local',
			'description' => 'Random Banner Emotion-Element',
			'license' => 'free',
			'support' => 'http://www.die-chiemseeler.de',
			'link' => 'http://www.die-chiemseeler.de'
    	);
    }

	/**
	 * Get the name for the plugin manager list
	 * @return string
	 */
	public function getLabel()
	{
		return "Random Banner Emotion-Element";
	}

	/**
	 * Standard plugin install method to register all required components.
	 * @return bool
	 */
	public function install()
	{
		$this->subscribeEvent(
			'Enlight_Controller_Action_PostDispatch_Backend_Emotion',
			'onPostDispatchBackendEmotion'
		);

		//$this->registerEmotionElement();

		return true;
	}

	/**
	 * Inserts the new emotion element into the database
	 * @return void
	 */
	public function registerEmotionElement()
	{

		// Insert component
		$this->Application()->Db()->query("
			INSERT INTO `s_library_component` (`name`, `x_type`, `convert_function`, `description`, `template`, `cls`, `pluginID`)
			VALUES ('Random Banner', 'emotion-components-randombanner', 'getRandomBanner', '', 'component_randombanner', 'randombanner-element', 771);
		");

		// Get the last entry to get the component Id
		$componentId = $this->Application()->Db()->lastInsertId();

		// Insert hidden field which should be used for saving the configuration
        $this->Application()->Db()->query("
            INSERT INTO `s_library_component_field` (`componentID`, `name`, `x_type`, `value_type`, `field_label`, `support_text`, `help_title`, `help_text`, `store`, `display_field`, `value_field`, `default_value`, `allow_blank`)
            VALUES (?, 'random_banner', 'hidden', 'json', '', '', '', '', '', '', '', '', 0);
        ", array($componentId));
	}

	/**
	 * Standard plugin uninstall method to unregister all required components.
	 * @return bool
	 */
	public function uninstall()
	{

		// ...remove the database entries here

		return true;
	}

	/**
     * @param Enlight_Event_EventArgs $args
     */
    public function onPostDispatchBackendEmotion(Enlight_Event_EventArgs $args)
    {
        $args->getSubject()->View()->addTemplateDir(
            $this->Path() . 'Views/'
        );

        // if the controller action name equals "index" we have to extend the backend article application
        if ($args->getRequest()->getActionName() === 'index')
        {
            $args->getSubject()->View()->extendsTemplate(
                'backend/emotion/randombanner_emotion_element/app.js'
            );
        }
    }
}