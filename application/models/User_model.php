<?php
class User_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_user($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('user');
            return $query->result_array();
        }

        $query = $this->db->get_where('user', array('id' => $id));
        return $query->row_array();
    }
    
    public function get_user_login($email, $password)
    {
        $query = $this->db->get_where('user', array('email' => $email, 'password' => md5($password)));        
        //return $query->num_rows();
        return $query->row_array();
    }
    
    public function set_user($id = 0)
    {
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        if ($id == 0) {
            return $this->db->insert('user', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('user', $data);
        }
    }
    
    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }    
    public function loginapp($username, $password)
    {
        $this->db->select('id, email, password');
        $this->db->from('user');
        $this->db->where('email', $username);
        $this->db->where('password', md5($password));
        $this->db->limit(1);
        $q = $this->db->get();
        if ($q->num_rows() == 0) {
            return array('status' => 400, 'message' => 'Invalid User or Password');
        } else {
            $q = $q->row();
            $last_login = date('Y-m-d H:i:s');
            $token      = $this->getToken();
            $expired_at = date("Y-m-d H:i:s", strtotime('+8760 hours'));
            $token      = $this->getToken();
            $data = array(
            'last_login' => $last_login, // $this->db->escape($this->input->post('title'))
            'token' => $token,
        );
            $this->db->where('id',$q->id);
            $this->db->update('user', $data);
            return array('success' =>true ,'status' => 200,'message' => 'Login successfull','token' => $token,'login_id' => $username,'last_login' => $last_login,'timestamp' => $expired_at);
        }
    }
    public function logoutapp($token)
    {
        $this->db->select('id, email, password');
        $this->db->from('user');
        $this->db->where('token', $token);
        $this->db->limit(1);
        $q = $this->db->get();
        if ($q->num_rows() == 0) {
            return array('status' => 400, 'message' => 'Invalid Token');
        } else {
            $q = $q->row();
            $last_login = date('Y-m-d H:i:s');
            $token      = $this->getToken();
            $expired_at = date("Y-m-d H:i:s", strtotime('+8760 hours'));
            $token      = $this->getToken();
            $data = array(
                'token' => null,
            );
            $this->db->where('id',$q->id);
            $this->db->update('user', $data);
            return array('success' =>true ,'status' => 200,'message' => 'Successfully logged out');
        }
    }
    public function checktoken($token)
    {
        $this->db->select('id, email, password');
        $this->db->from('user');
        $this->db->where('token', $token);
        $this->db->limit(1);
        $q = $this->db->get();
        
        $q = $q->row();
        return $q;
    }
    public function getToken($randomIdLength = 10)
    {
        $token = '';
        do {
            $bytes = rand(1, $randomIdLength);
            $token .= str_replace(
                ['.', '/', '='], '', base64_encode($bytes)
            );
        } while (strlen($token) < $randomIdLength);
        return $token;
    }

}
