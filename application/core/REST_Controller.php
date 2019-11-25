<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * REST Controller to manage the RESTful APIs
 *
 * @author Prateek Gupta <prateek.gupta54@gmail.com>
 */
class REST_Controller extends MX_Controller
{
    /**
     * rest config from load->config
     * @var array
     */
    protected $rest_config = [];
    /**
     * Response Variable, Printed in the end
     * @var array|mixed
     */
    protected $response;
    /**
     * Request method
     * @var string|NULL
     */
    private $method;
    /**
     * Request content type
     * @var string|NULL
     */
    private $content_type;
    /**
     * Available allowed methods
     * @var array
     */
    private $allowed_methods = ['get', 'put', 'post', 'delete'];
    /**
     * Available Response Formats
     * @var array
     */
    private $formats = [
        'json' => 'application/json',
        'html' => 'text/html'
    ];
    /**
     * http header status code
     * @var integer
     */
    private $http_code = 200;

    public function __construct()
    {
        parent::__construct();
        $this->rest_config = $this->load->config('rest', true);
        $this->response = array('status' => true, 'user_data' => array(), 'error' => 0, 'message' => '');
        self::_set_basics();
        self::check_rest_keys();
        $this->form_validation->set_error_delimiters('', '');
    }

    protected function _set_basics()
    {
        $method = $this->input->method();
        $this->method = in_array($method, $this->allowed_methods) ? $method : 'get';
        $parse = 'parse_' . $this->method;
        self::$parse();
        $content_type = $this->input->server('CONTENT_TYPE');
        if ($content_type) {
            $content_type =
                (strpos($content_type, ';') !== false ? current(explode(';', $content_type)) : $content_type);
        }
        $formats = array_flip($this->formats);
        if (isset($formats[$content_type])) {
            $this->content_type = $formats[$content_type];
        }
        $this->set_http_code(200);
    }

    protected function set_http_code($http_code = 200)
    {
        $this->http_code = $http_code;
    }

    private function check_rest_keys()
    {
        try {
            if (!$this->rest_config['enabled_login']) {
                return true;
            }

            $username = $this->input->server('PHP_AUTH_USER');
            $password = $this->input->server('PHP_AUTH_PW');
            $hauth = $this->input->server('HTTP_AUTHORIZATION');
            if ($username == null && $hauth) {
                $hauth = trim(str_replace('Basic', '', $hauth));
                list($username, $password) = explode(':', base64_decode($hauth));
            }

            $credential = $this->rest_config['credential'];
            if ($credential['username'] !== $username || $credential['password'] !== $password) {
                throw new Exception("Unautorized Request", NORMAL_WARNING);
            }

            return true;
        } catch (Exception $up) {
            self::handle_exception($up);
        }
    }

    private function handle_exception(Exception $up)
    {
        if ($this->rest_config['handle_exception'] !== true) {
            throw $up;
        }
        $this->response['status'] = false;
        $this->response['error'] = $up->getCode();
        $this->response['message'] = $up->getMessage();
        $this->response();
    }

    protected function process_exception(Exception $up)
    {
        $this->set_http_code($up->getCode());
        $this->response['code'] = $up->getCode();
        $this->handle_exception($up);
    }


    protected function response($output = null, $type = 'json')
    {   
        if ($output == null) {
            $output = $this->response;
        }
        $this->http_code > 0 || $this->http_code = 200;
        self::set_response_type($type);

        $this->output->set_status_header($this->http_code)->set_output(is_array($output) ? json_encode($output) :
            $output)->_display();
        exit();
    }

    protected function set_response_type($type = 'json')
    {
        // if type doesn't exist, change it to json
        if (isset($this->formats[$type]) || $this->formats[$type] = 'json') {
            $this->output->set_content_type($this->formats[$type]);
        }
    }

    public function _remap($method = '', $arguments = [])
    {
        try {

            $controller_method = $method . '_' . $this->method;

            if (!method_exists($this, $controller_method)) {
                throw new Exception("Requested method is not allowed", NORMAL_WARNING);
            }

            call_user_func_array([$this, $controller_method], $arguments);
        } catch (Exception $up) {
            self::handle_exception($up);
        }
    }

    public function put($key = null, $xss_clean = false)
    {
        if ($key === null) {
            return $this->put_data;
        }

        return isset($this->put_data[$key]) ? self::_xss_clean($this->put_data[$key], $xss_clean) : NULL;
    }

    protected function _xss_clean($value, $xss_clean = false)
    {
        return $xss_clean === true ? $this->security->xss_clean($value) : $value;
    }

    public function delete($key = null, $xss_clean = false)
    {
        if ($key === null) {
            return $this->delete_data;
        }

        return isset($this->delete_data[$key]) ? self::_xss_clean($this->delete_data[$key], $xss_clean) : NULL;
    } // already available in CI input class

    public function get($key = null, $xss_clean = false)
    { // cloned function
        return $this->input->get($key, $xss_clean);
    } // already available in CI input class

    public function post($key = null, $xss_clean = false)
    { // cloned function
        return $this->input->post($key, $xss_clean);
    }

    public function get_method()
    {
        return $this->router->method . '_' . $this->method;
    }

    public function get_jwt($data = [], $key = null)
    {
        if ($key == null) {
            $key = JWT_SECRET;
        }

        $token = array(
            'iss' => base_url(),
            'nbf' => time(),
            'iat' => time(),
            //	'exp' => strtotime('+1 days')
        );

        $token = array_merge($token, $data);

        return \Firebase\JWT\JWT::encode($token, $key, 'HS256');
    }

    public function validate_jwt($jwt = null, $key = null, $get_as = 'object')
    {
        try {
            if ($key == null) {
                $key = JWT_SECRET;
            }
            $jwt = !is_null($this->input->server('HTTP_AUTHENTICATION')) ? $this->input->server('HTTP_AUTHENTICATION') : $jwt;
//            $jwt || $jwt = $this->input->server('HTTP_AUTHENTICATION');;
            if (is_bool($jwt) && ($jwt === true)) {
                return null;
            }
            $this->jwt = \Firebase\JWT\JWT::decode($jwt, $key, ['HS256']); // will throw exceptions
            return $this->jwt;
        } catch (Firebase\JWT\ExpiredException $e) {
            $this->set_http_code(401);
            self::handle_exception(new Exception("Token has expired", TOKEN_EXPIRED));
        } catch (Exception $e) {
            self::handle_exception($e);
        }
    }

    private function parse_put()
    {
        $this->put_data = json_decode($this->input->raw_input_stream, true);
    }

    private function parse_delete()
    {
        $this->delete_data = json_decode($this->input->raw_input_stream, true);
    }

    private function parse_get()
    {
    }

    private function parse_post()
    {
    }
}

/* End of file REST_Controller.php */
/* Location: ./application/core/REST_Controller.php */