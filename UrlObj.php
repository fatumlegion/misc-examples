<?php
class UrlObj
{
	private $key;
	private $data;

	public function __construct($key = '', $data = '')
	{
		set_key($key);
		set_data($data);
	}

	//Can easily use the magic __get and __set methods instead if code base requires it,
	//just a matter of personal preference here

	public function set_key($key)
	{
		$this->key = $key;
	}

	public function set_data($data)
	{
		$this->data = $data;
	}

	public function get_key()
	{
		return $this->key;
	}

	public function get_data()
	{
		return $this->data;
	}
}
?>