<?php
class HomePage extends Page {

	private static $db = array(
	);

	private static $has_one = array(
	);

	private static $has_many = array(
		'HomeSlideshowItems' => 'HomeSlideshowItem'
	);

	private static $many_many_extraFields = array(
		'Pages' => array(
			'SortOrder' => 'Int'
		)
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->addFieldsToTab('Root.Slideshow', array(
			GridField::create('HomeSlideshowItems', 'Slideshow Items', $this->HomeSlideshowItems(), GridFieldConfig_RelationEditor::create()->addComponent(GridFieldOrderableRows::create('Sort')))
		));

		return $fields;
	}

}

class HomePage_Controller extends Page_Controller {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();

		// Note: you should use SS template require tags inside your templates 
		// instead of putting Requirements calls here.  However these are 
		// included so that our older themes still work
		Requirements::themedCSS('reset');
		Requirements::themedCSS('layout'); 
		Requirements::themedCSS('typography'); 
		Requirements::themedCSS('form'); 
	}

}

class HomeSlideshowItem extends DataObject {

	private static $db = array(
		'Title' => 'Varchar(100)',
		'Sort' => 'Int'
	);

	private static $has_one = array(
		'Image' => 'Image',
		'HomePage' => 'HomePage'
	);

	private static $default_sort = 'Sort';

}