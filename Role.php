<?php

class Role {
	
	private $roleId;
	private $roleName;
	private $permissions;
	
	public function __construct() {
		$this->permissions = array();
	}
	
	public function getRoleName($userId) {
		return $this->roleName;
	}
	
	public function getRolePermissions() {
		return $this->permissions;
	}
	
	
}

?>