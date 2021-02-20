<?php

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->library('pagination');
    }

    public function index() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News Archive';

        $this->load->view('templates/admin-header', $data);

        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    public function state() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }
        $data['news'] = $this->news_model->state();
        

        $this->load->view('templates/admin-header', $data);

        $this->load->view('news/state', $data);
        $this->load->view('templates/footer');
    }

    public function addstate() {
       if (!$this->session->userdata('is_logged_in')) {
        redirect(site_url('users/login'));
    } else {
        $data['user_id'] = $this->session->userdata('user_id');
    }
    $response = array();
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('state', 'state', 'required');
    if ($this->form_validation->run() === FALSE) {
        $response['flag'] = false;
        $response['error'] = "Something Went Wrong";
    } else {
        $this->news_model->set_state();
        $response['flag'] = true;
        $response['message'] = "State Added Successfully";
    }
    echo json_encode( $response );
  // return $this->response->setJSON($);
}

public function adddistrict() {
   if (!$this->session->userdata('is_logged_in')) {
    redirect(site_url('users/login'));
} else {
    $data['user_id'] = $this->session->userdata('user_id');
}
$response = array();
$this->load->helper('form');
$this->load->library('form_validation');
$this->form_validation->set_rules('state', 'state', 'required');
if ($this->form_validation->run() === FALSE) {
    $response['flag'] = false;
    $response['error'] = "Something Went Wrong";
} else {
    $this->news_model->set_district();
    $response['flag'] = true;
    $response['message'] = "State Added Successfully";
}
echo json_encode( $response );
  // return $this->response->setJSON($);
}
public function addchild(){
    try{
       if (!$this->session->userdata('is_logged_in')) {
        redirect(site_url('users/login'));
    } else {
        $data['user_id'] = $this->session->userdata('user_id');
    }
    $response = array();
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'name', 'required');

$config['upload_path'] = './screenshots'; //core folder (if you like upload to application folder use APPPATH)
$config['allowed_types'] = 'gif|jpg|png'; //allowed MIME types
$config['encrypt_name'] = TRUE; //creates uniuque filename this is mainly for security reason
$this->load->library('upload', $config);

if (!$this->upload->do_upload('file')) { //picture_upload is upload field name set in HTML eg. name="upload_field"
$error = array('error' => $this->upload->display_errors());
}else{
    //print_r($this->upload->data()); // this is array of uploaded file consist of filename, filepath etc. print it out
  $file_naam=  $this->upload->data()['file_name']; // this is how you get for example "file name" of file
  
}
if ($this->form_validation->run() === FALSE) {
    $response['flag'] = false;
    $response['error'] = "Something Went Wrong";
} else {
    $this->news_model->set_child($file_naam);
    $response['flag'] = true;
    $response['message'] = "Child Added Successfully";
}
}

//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

echo json_encode( $response );
exit;
}
public function district() {
    if (!$this->session->userdata('is_logged_in')) {
        redirect(site_url('users/login'));
    } else {
        $data['user_id'] = $this->session->userdata('user_id');
    }
    $data['district'] = $this->news_model->district();
    $data['news'] = $this->news_model->state();
    $data['title'] = 'News District';

    $this->load->view('templates/admin-header', $data);

    $this->load->view('news/district', $data);
    $this->load->view('templates/footer');
}
public function child() {
    if (!$this->session->userdata('is_logged_in')) {
        redirect(site_url('users/login'));
    } else {
        $data['user_id'] = $this->session->userdata('user_id');
    }
    $data['child'] = $this->news_model->child();
    $data['state'] = $this->news_model->state();
    $data['district'] = $this->news_model->district();
    $data['title'] = 'News Archive';

    $this->load->view('templates/admin-header', $data);

    $this->load->view('news/child', $data);
    $this->load->view('templates/footer');
}
public function getchild($id = null) {
    if (!$this->session->userdata('is_logged_in')) {
        redirect(site_url('users/login'));
    } else {
        $data['user_id'] = $this->session->userdata('user_id');
    }
    $id = $this->uri->segment(4);

    if (empty($id)) {
        show_404();
    }
    $data['child'] = $this->news_model->child( $id);
    $data['title'] = 'News Archive';

    $this->load->view('news/getchild', $data);
}

public function view($slug = NULL){
    if (!$this->session->userdata('is_logged_in')) {
        redirect(site_url('users/login'));
    } else {
        $data['user_id'] = $this->session->userdata('user_id');
    }
    $data['news_item'] = $this->news_model->get_news($slug);

    if (empty($data['news_item'])) {
        show_404();
    }

    $data['title'] = $data['news_item']['title'];

    $this->load->view('templates/admin-header', $data);
    $this->load->view('templates/admin-sidebar');
    $this->load->view('news/view', $data);
    $this->load->view('templates/footer');
}

public function create() {
    if (!$this->session->userdata('is_logged_in')) {
        redirect(site_url('users/login'));
    } else {
        $data['user_id'] = $this->session->userdata('user_id');
    }

    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Create News';

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Text', 'required');

    if ($this->form_validation->run() === FALSE) {
        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/admin-sidebar');
        $this->load->view('news/create');
        $this->load->view('templates/footer');
    } else {
        $this->news_model->set_news();
        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/admin-sidebar');
        $this->load->view('news/success');
        $this->load->view('templates/footer');
        redirect(site_url('news'));
    }
}

public function edit() {
    if (!$this->session->userdata('is_logged_in')) {
        redirect(site_url('users/login'));
    } else {
        $data['user_id'] = $this->session->userdata('user_id');
    }

    $id = $this->uri->segment(3);

    if (empty($id)) {
        show_404();
    }

    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Edit News';
    $data['news_item'] = $this->news_model->get_news_by_id($id);

    if ($data['news_item']['user_id'] != $this->session->userdata('user_id')) {
            $currentClass = $this->router->fetch_class(); // class = controller
            redirect(site_url($currentClass));
        }
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/admin-header', $data);
            $this->load->view('templates/admin-sidebar');
            $this->load->view('news/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->news_model->set_news($id);
            //$this->load->view('news/success');
            redirect(site_url('news'));
        }
    }

    public function delete() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        }

        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $news_item = $this->news_model->get_news_by_id($id);

        if ($news_item['user_id'] != $this->session->userdata('user_id')) {
            $currentClass = $this->router->fetch_class(); // class = controller
            redirect(site_url($currentClass));
        }

        $this->news_model->delete_news($id);
        redirect(base_url() . '/news');
    }
}
