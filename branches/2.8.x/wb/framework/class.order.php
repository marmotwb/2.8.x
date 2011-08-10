<?php
/**
 * @category        WebsiteBaker
 * @package         WebsiteBaker_core
 * @author          Werner v.d.Decken
 * @copyright       WebsiteBaker.org e.V.
 * @link            http://websitebaker2.org
 * @license         http://www.gnu.org/licenses/gpl.html
 * @version         $Id$
 * @filesource		$HeadURL$
 * Ordering class
 * This class will be used to change the order of an item in a table
 * which contains a special order field (type must be integer)
 */
/*******************************************************************************
 * abstract factory for application
 */
// Must include code to stop this file being access directly
	if(defined('WB_PATH') == false) { die("Cannot access this file directly"); }
	define('ORDERING_CLASS_LOADED', true);
// Load the other required class files if they are not already loaded
	require_once(WB_PATH."/framework/class.database.php");

class order {

	const MOVE_UP   = 0;
	const MOVE_DOWN = 1;

	private $_Table      = '';
	private $_FieldOrder = '';
	private $_FieldId    = '';
	private $_FieldGroup = '';
	private $_DB         = null;

	/**
	 * Constructor
	 * @param string $Table
	 * @param string $FieldOrder
	 * @param string $FieldId
	 * @param string $FieldGroup
	 * use $GLOBALS['database']
	 */
	public function __construct($Table, $FieldOrder, $FieldId, $FieldGroup) {
		$this->_DB         = $GLOBALS['database'];
		$this->_Table      = $Table;
		$this->_FieldOrder = $FieldOrder;
		$this->_FieldId    = $FieldId;
		$this->_FieldGroup = $FieldGroup;
	}
	/**
	 *
	 * @param string|int $id
	 * @param int $direction
	 * @return bool
	 */
	public function move($id, $direction = self::MOVE_UP)
	{
		$retval = false;
		$sql  = 'SELECT `'.$this->_FieldOrder.'` `order`, `'.$this->_FieldGroup.'` `group` ';
		$sql .= 'FROM `'.$this->_Table.'` WHERE `'.$this->_FieldId.'`=\''.$id.'\'';
		if(($res1 = $this->_DB->query($sql))) {
			if(($rec1 = $res1->fetchRow())) {
				$sql  = 'SELECT `'.$this->_FieldId.'` `id`, `'.$this->_FieldOrder.'` `order` ';
				$sql .= 'FROM `'.$this->_Table.'` ';
				$sql .= 'WHERE `'.$this->_FieldGroup.'`=\''.$rec1['group'].'\' ';
				if($direction == self::MOVE_UP) {
					$sql .=     'AND `'.$this->_FieldOrder.'`>\''.$rec1['order'].'\' ';
					$sql .= 'ORDER BY `'.$this->_FieldOrder.'` ASC';
				}else {
					$sql .=     'AND `'.$this->_FieldOrder.'`<\''.$rec1['order'].'\' ';
					$sql .= 'ORDER BY `'.$this->_FieldOrder.'` DESC';
				}
				if(($res2 = $this->_DB->query($sql))) {
					if(($rec2 = $res2->fetchRow())) {
						$sql  = 'UPDATE `'.$this->_Table.'` ';
						$sql .= 'SET `'.$this->_FieldOrder.'`=\''.$rec1['order'].'\' ';
						$sql .= 'WHERE `'.$this->_FieldId.'`=\''.$rec2['id'].'\'';
						if($this->_DB->query($sql)) {
							$sql  = 'UPDATE `'.$this->_Table.'` ';
							$sql .= 'SET `'.$this->_FieldOrder.'`=\''.$rec2['order'].'\' ';
							$sql .= 'WHERE `'.$this->_FieldId.'`=\''.$id.'\'';
							$retval = $this->_DB->query($sql);
						}
					}
				}
			}
		}
		return $retval;
	}

	/**
	 * Move a row up
	 * @param string|int $id
	 * @return bool
	 */
	public function move_up($id) {
		// Get current order
		return $this->move($id, self::MOVE_UP);
	}

	/**
	 * Move a row down
	 * @param string|int $id
	 * @return bool
	 */
	public function move_down($id) {
		// Get current order
		return $this->move($id, self::MOVE_DOWN);
	}
	
	/**
	 * Get next free number for order
	 * @param string|int $group
	 * @return integer
	 */
	public function get_new($group) {
		// Get last order
		$sql  = 'SELECT MAX(`'.$this->_FieldOrder.'`) FROM `'.$this->_Table.'` ';
		$sql .= 'WHERE `'.$this->_FieldGroup.'`=\''.$group.'\' ';
		$max = intval($this->_DB->get_one($sql)) + 1;
		return $max;
	}
	
	/**
	 * Renumbering a group from 1 to n (should be called if a row in the middle has been deleted)
	 * @param string|int $group
	 * @return bool
	 */
	public function clean($group) {
		// Loop through all records and give new order
		$sql  = 'SET @c := 0; ';
		$sql .= 'UPDATE `'.$this->_Table.'` SET `'.$this->_FieldOrder.'`=( SELECT @c := @c + 1 ) ';
		$sql .= 'WHERE `'.$this->_FieldGroup.'`=\''.$group.'\' ';
		$sql .= 'ORDER BY `'.$this->_FieldOrder.'` ASC;';
		return $this->_DB->query($sql);
	}
	
} // end of class
