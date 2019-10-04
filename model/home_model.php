<?php

class Home_Model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	function login()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$admin = DAOFactory::getAdminDAO()->queryByUsername($username);
		
		if(!empty($admin))
		{
			foreach($admin as $each)
			{
				if($each->password == $password)
				{
					$each->status = 'Online';
					DAOFactory::getAdminDAO()->update($each);
					$admin = Controller::objToArray($each);
					Session::setSession('Admin',$admin);
				}else{	header('location: '.URL.''); }
			}
		}
	}

	function logout()
	{
		$admin = new Admin;
		$id = Session::getSession('Admin');
		$getID = $id['id'];
		$gotID = DAOFactory::getAdminDAO()->load($getID);
		$gotID->status = 'Offline';
		DAOFactory::getAdminDAO()->update($gotID);
		Session::destroy();
		header("location: ".URL);	
	}
	
}

?>