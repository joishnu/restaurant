<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');  
/**
 * List out all controller names and related methods
 *
 * @package Controller_list
 * @author Prateek Gupta <prateek.gupta54@gmail.com>
 **/

class Controller_list {

    private $ci;
    private $controllers = [];
    private $first_run = false;
    private $instances = [];
    private $methods = [];
    public function __construct() {
        $this->ci = & get_instance();
    }

    public function list_all_controllers($path = null) {
        $this->first_run = true;
        $path = is_null($path) ? APPPATH.'modules/*/controllers/*' : $path;
        foreach( glob($path) as $controller ) {
            if(is_dir($controller)) {
                // self::list_all_controllers($path.'/*');
            } else {
                $class_name  = basename($controller, EXT);
                if(!class_exists($class_name)) {
                    require($controller);
                }
                // echo $class_name;
                // if(class_exists($class_name))
                //     $this->instances[] = new ReflectionClass($class_name);
                $this->controllers[] = strtolower($class_name);
            }
        }
        return $this->controllers;
    }

    public function list_method(ReflectionClass $instance) {
        //show($instance->getMethods());
        return $instance->getMethods();
    }

    public function list_all_methods() {
        // $start_time = microtime(true);
        if(!$this->first_run) {
            self::list_all_controllers();
        }
        $this->methods = [];
        foreach ($this->controllers as $key => $controller) {
            $this->methods[$controller] = get_class_methods($controller);
            
            $key = array_search('__construct', $this->methods[$controller]);
            if($key !== false) {
                unset($this->methods[$controller][$key]);
            }

            $key = array_search('__get', $this->methods[$controller]);
            if($key !== false) {
                unset($this->methods[$controller][$key]);
            }
            //$this->methods[$controller] = self::list_method($this->instances[$key]);
        }
        // $end_time = microtime(true);
        // var_dump($end_time-$start_time);
        //show($this->methods);
        return $this->methods;
    }

    public function list_modules_from_db() {
        $this->ci->db->select('module_name, module_id');
        return $this->ci->db->get_where('modules', array('module_status' => 1))->result_array();
    }

    public function list_methods_from_db($module_id = 0) {
        $where = array('method_status' => 1, 'module_id' => $module_id);
        $this->ci->db->select('method_name, method_id');
        $this->ci->db->where($where);
        $this->ci->db->group_by('method_name','module_id');
        return $this->ci->db->get('module_methods')->result_array();
    }

    public function list_from_db() {
        $this->ci->db->select('method_name, module_name, method_id, modules.module_id');
        $this->ci->db->join('module_methods', 'module_methods.module_id = modules.module_id');
        return $this->ci->db->get_where('modules', array('module_status' => 1))->result_array();
    }

    protected function insert_modules($modules = []) {
        foreach ($modules as $module => $methods) {
            $sql = "INSERT INTO `modules` (`module_name`, `module_status`) VALUES(?, 1) ON DUPLICATE KEY UPDATE `module_name` = `module_name`, `module_id` = LAST_INSERT_ID(`module_id`) ";
            $this->ci->db->query($sql, array($module));
            $module_id = $this->ci->db->insert_id();
            $sql = 'INSERT INTO `module_methods` (`method_name`, `module_id`, `method_status`) VALUES ';
            $params = [];
            $sql_array = [];
            foreach ($methods as $key => $method) {
                if($method != "get_instance"){
                    $sql_array[] = " (?, ?, 1)";
                    array_push($params, $method, $module_id);
                }
            }
            $sql.= implode(',', $sql_array);
            $sql.= " ON DUPLICATE KEY UPDATE `method_name` = VALUES(`method_name`)";
            $this->ci->db->query($sql, $params);
        }
    }

    public function refresh_modules() {
        self::list_all_methods();
        self::insert_modules($this->methods);
    }
}