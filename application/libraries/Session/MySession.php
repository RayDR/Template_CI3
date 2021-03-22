<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MySession
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	

}

/* End of file MySession.php */
/* Location: ./application/libraries/Session/MySession.php */
