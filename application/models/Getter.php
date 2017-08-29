<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Getter extends CI_Model {

	/**
	* Getter general model for CI 3.x.x+
	*
	* Return data from table $table
	* 
	* public function get_element(string, boolean, boolean, string array)
	*
	* $table - string | the table from which data is returned
	* $multiple - boolean | TRUE to return multiple rows
	* $join_lang - boolean | TRUE to join a table with it's table_lang
	* $properties - string array | Array with properties (constrictions, checks, ordering, etc.)
	* 
	* @version 1.0.2rc
	* @author Coraș Vlad
	*
	*
	* TODO: Change how properties work
	* TODO: Separate get method in multiple private methods
	* TODO: Sanitize code
	*/


	public function get($table, $multiple, $join_lang, $properties)
	{
		// Select table
		$this->db->from($table);

		// Check if table has _lang variant else die
		if ($join_lang === TRUE)
		{
		    if ($this->db->table_exists($table . "_lang"))
            {
                $this->db->join($table . "_lang", $table . "_lang.id_" . $table . " = " . $table . ".id_" . $table);
            }
            else
            {
                die("Table '$table' does not have multilanguage support:<br>Trying to set '$table', but \$join_lang is set to $join_lang");
            }
		}

		// Cycle through every property and apply it
		foreach ($properties as $property => $value)
		{

			// If selecting language 
			if ($property == "id_language") 
			{
				$this->db->where("`$table" . '_lang' . "`." . $property, $value);
				continue;
			}

			// if various properties that require another function call exist
			if (isset($properties['various']))
			{
				if (isset($properties['various']['limit']))
				{
					$this->db->limit($properties['various']['limit'], isset($properties['various']['offset']) ? $properties['various']['offset'] : NULL);
				}

				// TODO: Add support for more specific ordering. eg: ORDER BY column1 DESC, column2 ASC
				// HINT: foreach order_by
				// order_by - column by which data will be ordered
				// order_type - ASC, DESC, RANDOM | defaults to ASC
				if (isset($properties['various']['order_by']))
				{
					$this->db->order_by($properties['various']['order_by'], isset($properties['various']['order_type']) ? $properties['various']['order_type'] : 'ASC');
				}

				// Next property
				continue;
			}
			else
			{
				// If property is about language

				// Prevent ambiguous error on non distinct columns
				if ($join_lang)
				{
					$this->db->where("`$table`." . $property, $value);
				}
				else
				{
					$this->db->where($property, $value);
				}
			}
		}

		// Get data
		$query = $this->db->get();

		// If multiple return array with data rows
		if ($multiple)
		{
			if ($query->num_rows() > 0)
	        {
	            foreach ($query->result_array() as $row)
	            {
	                $result[] = $row;
	            }
	            return $result;
	        }
		}
		else
		{
			if ($query->num_rows() == 1)
	        {
	            return $query->row_array();
	        }
		}
	}

	public function getEntriesCount($table)
	{
		$this->db->from($table);

		$query = $this->db->get();
		return $query->num_rows();
	}
}