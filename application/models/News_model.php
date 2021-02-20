<?php
class News_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function record_count()
    {
        return $this->db->count_all('news');
    }
    
    public function get_news($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get_where('news', array('user_id' => $this->session->userdata('user_id')));
            return $query->result_array(); // $query->result(); // returns object
        }

        $query = $this->db->get_where('news', array('slug' => $slug, 'user_id' => $this->session->userdata('user_id')));
        return $query->row_array(); // $query->row(); // returns object
        
        // $query->num_rows(); // returns number of rows selected, similar to counting rows
        // $query->num_fields(); // returns number of fields selected
    }

    public function state($slug = FALSE)
    {
      $this->db->select('id,state');
      $query = $this->db->get('state');
      return $query->result_array();

        // $query->num_rows(); // returns number of rows selected, similar to counting rows
        // $query->num_fields(); // returns number of fields selected
  }
  public function district($id = 0)
  {
   
    if ($id === 0)
    {
     $this->db->select('district.*,state.id,
       state.state');
     $this->db->from('district');
     $this->db->join('state', 'district.state_id = state.id','left');
     $query = $this->db->get();
     // $query = $this->db->get('district');
     return $query->result_array();
 }
 else{
     $this->db->select('district.id,district.district,state.id,
       state.state');
     $this->db->from('district');
     $this->db->join('state', 'district.state_id = state.id','left');
     $this->db->where('state.id', $id);
     $query = $this->db->get();

     // $query = $this->db->get('district');
     return $query->result_array();
 }

        // $query->num_rows(); // returns number of rows selected, similar to counting rows
        // $query->num_fields(); // returns number of fields selected
}

public function child($id = 0)
{
    if ($id === 0)
    {

        $this->db->select('child.*,child.district,
            child.state,state.state as sta,district.district as dist');
        $this->db->from('child');
        $this->db->join('state', 'child.state = state.id','left');
        $this->db->join('district', 'child.district = district.id','left');
        $query = $this->db->get();
     // $query = $this->db->get('district');
        return $query->result_array();
    }
    $this->db->select('child.*,child.district,
        child.state,state.state as sta,district.district as dist');
    $this->db->from('child');
    $this->db->join('state', 'child.state = state.id','left');
    $this->db->join('district', 'child.district = district.id','left');
    $this->db->where('child.id', $id);
    $query = $this->db->get();
     // $query = $this->db->get('district');
    return $query->row_array();
}


public function get_news_by_id($id = 0)
{
    if ($id === 0)
    {
        $query = $this->db->get('news');
        return $query->result_array();
    }

    $query = $this->db->get_where('news', array('id' => $id));
    return $query->row_array();
}

public function set_news($id = 0)
{
    $this->load->helper('url');

    $slug = url_title($this->input->post('title'), 'dash', TRUE);

    $data = array(
            'title' => $this->input->post('title'), // $this->db->escape($this->input->post('title'))
            'slug' => $slug,
            'text' => $this->input->post('text'),
            'user_id' => $this->input->post('user_id'),
        );

    if ($id == 0) {
            //$this->db->query('YOUR QUERY HERE');
        return $this->db->insert('news', $data);
    } else {
        $this->db->where('id', $id);
        return $this->db->update('news', $data);
    }
}

public function set_state($id = 0)
{
    $this->load->helper('url');
    $data = array(
            'state' => $this->input->post('state'), // $this->db->escape($this->input->post('title'))
        );
    if ($id == 0) {
            //$this->db->query('YOUR QUERY HERE');
        return $this->db->insert('state', $data);
    } else {
        $this->db->where('id', $id);
        return $this->db->update('state', $data);
    }
}

public function set_district($id = 0)
{
    $this->load->helper('url');
    $data = array(
            'state_id' => $this->input->post('state'), // $this->db->escape($this->input->post('title'))
            'district' => $this->input->post('district'), // $this->db->escape($this->input->post('title'))
        );
    if ($id == 0) {
            //$this->db->query('YOUR QUERY HERE');
        return $this->db->insert('district', $data);
    } else {
        $this->db->where('id', $id);
        return $this->db->update('district', $data);
    }
}
public function set_child($file_naam=null)
{
    $this->load->helper('url');



    $data = array(
            'state' => $this->input->post('State'), // $this->db->escape($this->input->post('title'))
            'district' => $this->input->post('district'),
            'name' => $this->input->post('name'),
            'sex' => $this->input->post('sex'),
            'dob' => $this->input->post('dob'),
            'father' => $this->input->post('father'),
            'mother' => $this->input->post('mother'),
            'img' => $file_naam,
             // $this->db->escape($this->input->post('title'))
        );
    if ($id == 0) {
        return $this->db->insert('child', $data);
    } else {
        $this->db->where('id', $id);
        return $this->db->update('child', $data);
    }
}

public function delete_news($id)
{
    $this->db->where('id', $id);
        return $this->db->delete('news'); // $this->db->delete('news', array('id' => $id));  
        
        // error() method will return an array containing its code and message
        // $this->db->error();
    }
}
