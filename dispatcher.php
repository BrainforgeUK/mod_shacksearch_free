<?php
// Added Brainforge.UK
/**
 * @package     Joomla.Platform
 * @subpackage  Event
 *
 * @copyright   (C) 2005 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

use Joomla\CMS\Factory;

defined('JPATH_PLATFORM') or die;

if (class_exists('JEventDispatcher'))
{
	//return;
}

/**
 * Class to handle dispatching of events.
 *
 * This is the Observable part of the Observer design pattern
 * for the event architecture.
 *
 * @see         JPlugin
 * @since       3.0.0
 * @deprecated  4.0  The CMS' Event classes will be replaced with the `joomla/event` package
 */
class JEventDispatcher
{
	/**
	 * Stores the singleton instance of the dispatcher.
	 *
	 * @var    JEventDispatcher
	 * @since  3.0.0
	 */
	protected static $instance = null;

	/**
	 * Returns the global Event Dispatcher object, only creating it
	 * if it doesn't already exist.
	 *
	 * @return  JEventDispatcher  The EventDispatcher object.
	 *
	 * @since   3.0.0
	 */
	public static function getInstance()
	{
		if (self::$instance === null)
		{
			self::$instance = new static;
		}

		return self::$instance;
	}

	/**
	 * Triggers an event by dispatching arguments to all observers that handle
	 * the event and returning their return values.
	 *
	 * @param   string  $event  The event to trigger.
	 * @param   array   $args   An array of arguments.
	 *
	 * @return  array  An array of results from each function call.
	 *
	 * @since   3.0.0
	 */
	public function trigger($event, $args = array())
	{
		return Factory::getApplication()->triggerEvent($event, $args);

	}
}
