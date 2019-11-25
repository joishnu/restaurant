<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');  
/**
 * Authentication Lib to check authentication of user
 *
 * @package Auth_lib
 * @author 
 **/

class Auth_lib {
	private $ci;
	public function __construct() {
        $this->ci = & get_instance();
    }

    public function is($type='admin', $permissions = [], $rest = false) {
        if (!$rest && !$this->ci->session->id) {
            return false;
        }
        $should_have = true;
        $should_not_have = false;
        if(!!!$permissions)
            $permissions = $this->ci->session->permissions;
        //show($this->ci->session->userdata);
        switch($type) {
            case 'superadmin':
                $required_permissions = self::retrieve_permissions('superadmin');
            break;
            case 'admin':
                $required_permissions = self::retrieve_permissions('admin');
            break;
            case 'logged_in':
                return $this->ci->session->id;
                //return $this->ci->session->id && $this->ci->session->admin;
            break;
            case 'default':
                return false;
            break;
        }
        

        if ($required_permissions['should_have']) {
            $should_have = in_array_all($required_permissions['should_have'], $permissions['_permissions']);
        }

        if ($required_permissions['should_not_have']) {
            $should_not_have = in_array_all($required_permissions['should_not_have'], $permissions['_permissions']);
        }

        return $should_have && !$should_not_have;
    }

    public function is_allowed() {
        
    }

    public function retrieve_permissions($for = 'superadmin') {
        switch ($for) {
            case 'superadmin':
                return array('should_have' => ['superadmin'], 'should_not_have' => []);
            case 'admin':
                return array('should_have' => ['admin'], 'should_not_have' => []);
        }
        return [];
    }

    public function get_role_info($role_id = 0) {
        $this->ci->db->select('modules.module_name, module_methods.method_name, permissions.permission_slug');
        $this->ci->db->join('assigned_perms','assigned_perms.role_id = users.id');
        $this->ci->db->join('permissions','permissions.permission_id = assigned_perms.permission_id');
        $this->ci->db->join('permission_methods','permission_methods.permission_id =permissions.permission_id');
        $this->ci->db->join('module_methods','module_methods.method_id = permission_methods.method_id');
        $this->ci->db->join('modules','modules.module_id = module_methods.module_id');
        $result = $this->ci->db->get_where('users', array('users.id' => $role_id))->result_array();
        // echo "<pre>";
        // echo $this->ci->db->last_query();
        // die();
        $permissions = array();
        foreach ($result as $key => $module) {
            $permissions[$module['module_name']][] = $module['method_name'];
            $permissions['_permissions'][] = $module['permission_slug'];
        }
        if(isset($permissions['_permissions'])) {
            $permissions['_permissions'] = array_unique($permissions['_permissions']);
        }
        return $permissions;
    }

    public function is_user($user_id, $type = '') {
        $data = $this->ci->db->select('role_id')->get_where('user_roles', ['user_id' => $user_id])->row_array();
        if(!$data) {
            return false;
        }

        $role_info = self::get_role_info($data['role_id']);
        return self::is($type, $role_info, true);

    }

    public function who_is($user_id = 0, $rest = false) {
        if($rest) {
            if(self::is_user($user_id, 'superadmin')) {
                return 'superadmin';
            }
            if(self::is_user($user_id, 'admin')) {
                return 'admin';
            }
        } else {
            if(self::is('superadmin')) {
                return 'superadmin';
            }
            if(self::is('admin')) {
                return 'admin';
            }
        }
        return false;
    }

    public function is_online($user_id = 0) {
        $user_id = $user_id ? $user_id : $this->session->user_id;
        return !!$this->ci->db->where(array(
            'user_id' => $user_id,
            'status' => 1
        ))->count_all_results('user_online');
    }

    public function online_toggle($user_id = 0) {
        if(self::is_online($user_id)) {
            return self::mark_offline($user_id);
        } else {
            return self::mark_online($user_id);
        }
    }

    public function mark_online($user_id = 0) {
        $user_id = $user_id ? $user_id : $this->session->user_id;
        $data = array(
            'user_id' => $user_id,
            'status' => 1
        );
        $insert_string = $this->ci->db->insert_string('user_online', $data)." ON DUPLICATE KEY UPDATE 
            `status`= VALUES(`status`), `last_login` = NOW()";
        $this->ci->db->query($insert_string);
        return !!$this->ci->db->affected_rows();
    }

    public function mark_offline($user_id = 0) {
        $user_id = $user_id ? $user_id : $this->session->user_id;
        $this->ci->db->where(array(
            'user_id' => $user_id,
            'status' => 1
        ));
        $this->ci->db->delete('user_online');
        return !!$this->ci->db->affected_rows();
    }
}