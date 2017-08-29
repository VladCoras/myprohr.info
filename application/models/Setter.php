<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setter extends CI_Model {

	/**
	* Getter general model for CI 3.x.x+
	*
	* Return data from table $table
	* 
	* public function set_element(string, boolean, boolean, string array)
	*
	* $table - string | the table from which data is returned
	* $multiple - boolean | TRUE to return multiple rows
	* $join_lang - boolean | TRUE to join a table with it's table_lang
	* $properties - string array | Array with properties (constrictions, checks, ordering, etc.)
	* $properties_lang - string array | Array with language properties (constrictions, checks, ordering, etc.)
	* $data - string array | Array with table data
	* $data_lang - string array | Array with table data
	* 
	* @version 1.0.1rc
	* @author Coraș Vlad
	*/

	public function set($table, $join_lang, $properties, $properties_lang, $data, $data_lang = NULL)
	{
		// Select table
		$this->db->from($table);

		if (isset($properties['add']) && $properties['add'])
		{
			// Adding
			$this->db->insert($table, $data);
			$_temp =  $this->db->insert_id($table);

			if ($join_lang === TRUE)
			{
				if ($this->db->table_exists($table . "_lang")) 
				{
					// $table has table_lang
					$this->db->insert($table . "_lang", $data_lang);
				}
				else
				{
					die("Table '$table' does not have multilanguage support. Add");
				}
			}
			return $_temp;
		}
		else
		{
			// Updating
			// Cycle through every property and apply it
			foreach ($properties as $property => $value)
			{
				if ($property == "update") continue;
				$this->db->where($property, $value);
			}

			$this->db->update($table, $data);

			if ($join_lang === TRUE)
			{
				if ($this->db->table_exists($table . "_lang")) 
				{
					
					$this->db->where('id_' . $table, $properties_lang['id']);
					$this->db->update($table . "_lang", $data_lang);
				}
				else
				{
					die("Table '$table' does not have multilanguage support. Add");
				}
			}
		}
	}

	public function delete_element($table, $properties)
    {
        $this->db->from($table);

        // Cycle through every property and apply it
        foreach ($properties as $property => $value)
        {
            $this->db->where($property, $value);
        }
    }
}