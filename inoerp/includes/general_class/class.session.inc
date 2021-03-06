<?php

class session {

 private $login_flag = false;
 public $user_id;
 public $username;
 public $user_roles;
 public $orginal_page;
 public $login_status;

 function __construct() {
  //disblaed for wamp local host
//	session_name('inoerporjrjdsd_27hu');
//	session_set_cookie_params(0, '/', '.' . str_replace('www.', 'inoideas.org', $_SERVER['HTTP_HOST']));
  session_start();

  if (isset($_SESSION['orginal_page'])) {
   $this->orginal_page = $_SESSION['orginal_page'];
  }
  if (!isset($_SESSION['recent_visit'])) {
   $_SESSION['recent_visit'] = [];
  } else if (!is_array($_SESSION['recent_visit'])) {
   $_SESSION['recent_visit'] = [];
  }
  $this->check_login();
 }

 private function check_login() {
  if (isset($_SESSION['user_id'])) {
   $this->login_flag = true;
   $this->user_id = $_SESSION['user_id'];
   $this->username = $_SESSION['username'];
  } else {
   $this->login_flag = false;
   $_SESSION['user_roles'] = ['ANONYMOUS'];
//	 $this->assign_role_access();
   unset($this->user_id);
   unset($this->username);
  }
 }

 public function login_status() {
  return $this->login_flag;
 }

 public function login($user) {
  if ($user) {
   //generate a new session id for the user
   $_SESSION['user_roles'] = null;
   $_SESSION['role_access'] = null;
   $_SESSION['allowed_path_ids'] = null;
   //session_regenerate_id(true);
   $_SESSION['user_id'] = $this->user_id = $user->user_id;
   $_SESSION['username'] = $this->username = $user->username;
   $_SESSION['login_status'] = $this->login_status = true;
   $this->login_flag = true;
   if (!empty($_SESSION['orginal_page'])) {
    $this->orginal_page = $_SESSION['orginal_page'];
   }
   $this->assign_role();
   $this->_assign_user_groups();
//	 if (!empty($this->user_roles)) {
//		$this->assign_role_access();
//	 }
  }
 }

 public function assign_role() {
  $ur = new user_role();
  $ur->user_id = $this->user_id;
  $ur_i = $ur->findBy_userId();
  $user_roles = [];
  $_SESSION['is_admin'] = false;
  foreach ($ur_i as $user_role) {
   array_push($user_roles, $user_role->role_code);
   $_SESSION['is_admin'] = ($user_role->role_code == 'ADMIN') ? true : $_SESSION['is_admin'];
  }
  $this->user_roles = $_SESSION['user_roles'] = $user_roles;
 }

 private function _assign_user_groups() {
  $user_group_access_all = user_group_access::find_by_user_id($_SESSION['user_id']);
  if (empty($user_group_access_all)) {
   $_SESSION['user_org_access'] = null;
   return;
  }
  $user_org_access_a = [];
  foreach ($user_group_access_all as $user_group_access) {
   $org_id = $user_group_access->org_id;
   $user_org_access_a[$org_id] = $user_group_access->access_level;
  }
  $_SESSION['user_org_access'] = $user_org_access_a;
 }

 public function logout() {
//  unset($_SESSION['user_id']);
  unset($_SESSION);
  unset($this->user_id);
  unset($this->username);
  $this->login_flag = false;
 }

 public function redirect_login() {
  if (!$this->login_flag) {
   $_SESSION['orginal_page'] = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
   $this->orginal_page = $_SESSION['orginal_page'];
   redirect_to(HOME_URL . "extensions/user/user_login.php");
  }
 }

}

$session = new session();
?>