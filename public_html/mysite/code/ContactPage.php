<?php
class ContactPage extends Page {

	private static $db = array(
	);

	private static $has_one = array(
	);

}
class ContactPage_Controller extends Page_Controller {

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
		'ContactForm'
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

	public function ContactForm() {
		$fields = FieldList::create(array(
			TextField::create('FirstName', 'First Name')->setAttribute('Placeholder', 'First Name'),
			TextField::create('LastName', 'Last Name')->setAttribute('Placeholder', 'Last Name'),
			TextField::create('Email', 'Email')->setAttribute('Placeholder', 'Email'),
			DropdownField::create('HearAboutUs', 'Where did you hear about us?', array(
				'Google' => 'Google',
				'Radio' => 'Radio',
				'Magazine' => 'Magazine'
			))->setEmptyString('Select an option'),
			TextareaField::create('Message')
		));

		$actions = FieldList::create(array(
			FormAction::create('submitMyForm', 'Submit')->setUseButtonTag(true)
		));

		$validator = RequiredFields::create(array(
			'FirstName', 'LastName', 'Email'
		));

		return Form::create($this, 'ContactForm', $fields, $actions, $validator);
	}

	public function submitMyForm($data, $form) {
		echo "You submitted me!!";exit;
	}

}