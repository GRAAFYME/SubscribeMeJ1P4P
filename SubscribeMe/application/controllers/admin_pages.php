<?php
class Admin_pages extends CI_Controller {

	//number of entries per page
	private $limit = 10;

	function Admin_pages(){
		parent::__construct();

		//load helper
		$this->load->helper('url', 'form');

		//load library
		$this->load->library(array('table', 'menu', 'form_validation'));

		//load model
		$this->load->model('Admin_pages_model');


	}

	function index($offset = 0){
		//ofset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);

		//load data
		$entries = $this->Admin_pages_model->get_paged_list($this->limit, $offset)->result();

		//generate pagination
		$this->load->library('pagination');
		$config['base_url']    = site_url('admin_pages/index/');
        $config['total_rows']  = $this->Admin_pages_model->count_all();
        $config['per_page']    = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination']    = $this->pagination->create_links();

        //generate table data
        $this->load->library('table');
        $this->table->set_empty("&nbsp;");
        $this->table->set_heading('id', 'Title', 'Page', 'Text','');
        $i = 0 + $offset;
        foreach ($entries as $entry){
        	$this->table->add_row($entry->id, $entry->title, $entry->page, $entry->text, 
        		anchor('admin_pages/view/'.$entry->id,'view', array('class'=>'view')).' '.
        		anchor('admin_pages/update/'.$entry->id, 'update', array('class'=>'update')));
        }
        $data['table'] = $this->table->generate();
        $data['add_data'] = '';
        $data['show_add_button'] = FALSE;

        //load view
        	$menu = new Menu;

			$datam['menu'] = $menu->show_menu();

			$this->load->view('templates/frontend/header', $datam);
			// $this->load->view('home/index', $datam);
			$this->load->view('cms/entryList', $data);
			$this->load->view('templates/frontend/footer');
        
	}

	function delete(){

		$id = $this->uri->segment(3);
		//delete entry
		$this->admin_pages_model->delete($id);

		//redirect to entry list page
		redirect('admin_pages','refresh');
	}

	function view() {
		//set common properties
		$data['title'] = 'Entry Details';
		$data['link_back'] = anchor('admin_pages/', 'Back to list of entries',array('class'=>'back'));

		$id = $this->uri->segment(3);
		//get entry details
		$data['entry'] = $this->Admin_pages_model->get_by_id($id)->row();

		//load view
		$menu = new Menu;

		$datam['menu'] = $menu->show_menu();

		$this->load->view('templates/frontend/header', $datam);
		$this->load->view('cms/entryView_pages', $data);
		$this->load->view('templates/frontend/footer');
	}

	function add(){
		//set validation properties
		$this->_set_fields();

		$this->form_validation->id = '';
		$this->form_validation->question = '';
		$this->form_validation->answer = '';

		//set common properties
		$data['title'] = 'Add new entry';
		$data['content'] = '';
		$data['message'] = '';
		$data['action'] = site_url('admin_pages/addEntry');
		$data['link_back'] = anchor('admin_pages/index/', 'Back to list of entries', array('class'=>'back'));
		$data['title_fieldname'] = 'question';
		$data['content_fieldname'] = 'answer';

		//load view
		$menu = new Menu;

		$datam['menu'] = $menu->show_menu();

		$this->load->view('templates/frontend/header', $datam);
		$this->load->view('cms/entryEdit', $data);
		$this->load->view('templates/frontend/footer');
	}

	function addEntry(){
		//set common properties
		$data['title'] = 'Add new entry';
		$data['action'] = site_url('admin_pages/addEntry');
		$data['link_back'] = anchor('admin_pages/index/','Back to list of entries', array('class'=>'back'));

		//set validation properties
		$this->_set_fields();
		$this->_set_rules();

		//run validation
		// if($this->form_validation->run() == FALSE){
		// 	$data['message'] = '';
		// }else{
			//save data
			$id = $this->Admin_pages_model->save();

			//set form input title="id"
			$this->form_validation->id = $id;

			//set user message
			$data['message'] = '<div class="success">add new entry success</div>';
		// }
		redirect('admin_pages');
		//load view
		// $this->load->view('entryEdit', $data);
	}

	function update() {
		//set validation properties
		$this->_set_fields();

		$id = $this->uri->segment(3);

		//prefill form values
		$entry = $this->Admin_pages_model->get_by_id($id)->row();
		$this->form_validation->id = $id;
		$this->form_validation->title = $entry->title;
		$this->form_validation->page = $entry->page;
		$this->form_validation->text = $entry->text;
		
		//set common properties
		$data['title'] = 'Update entry';
		$data['message'] = '';
		$data['action'] = site_url('admin_pages/updateEntry/'.$id);
		$data['link_back'] = anchor('admin_pages','Back to list of entries', array('class'=>'back'));
		$data['title_fieldname'] = 'title';
		$data['content_fieldname'] = 'text';
		//load view
		$menu = new Menu;

		$datam['menu'] = $menu->show_menu();

		$this->load->view('templates/frontend/header', $datam);
			// $this->load->view('home/index', $datam);
		$this->load->view('cms/entryEdit', $data);
		$this->load->view('templates/frontend/footer');

	}

	function updateEntry(){
		//set common properties
		$data['title'] = 'Update entry';
		$data['action'] = site_url('admin_pages/updateEntry');
		$data['link_back'] = anchor('admin_pages', 'Back to list of entries', array('class'=>'back'));

		//set validation properties
		$this->_set_fields();
		$this->_set_rules();

		//run validation
		// if ($this->form_validation->run() === FALSE){
		// 	$data['message'] = 'nope';
		// }else{
			//save data
			$id = $this->uri->segment(3);

			$this->Admin_pages_model->update($id);

			//set user message
			$data['message'] = '<div class="success">update entry success</div>';
		// }
			redirect('admin_pages');

		//load view
		// $this->load->view('entryEdit', $data);
	}

	function _set_fields(){
		// $fields[''] = array(
		// 	'field' => 'id',
		// 	'label' => 'id');
		$fields[''] = array(
			'field' => 'title',
			'label' => 'title');
		$fields[''] = array(
			'field' => 'text',
			'label' => 'text');
		// $fields[''] = array(
		// 	'field' => 'date',
		// 	'label' => 'date');

		$this->form_validation->set_rules($fields);
	}

	//validation rules
	function _set_rules(){
		$rules['title'] = 'trim|required';
		$rules['text'] = 'trim|required';
		// $rules['date'] = 'trim|required';

		$this->form_validation->set_rules($rules);

		$this->form_validation->set_message('required', '* required');
        $this->form_validation->set_message('isset', '* required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}
}
?>