<?php
class admin_news extends AD_Controller {

	//number of entries per page
	private $limit = 10;

	public function __construct()
	{
		parent::__construct();
		//load helper
		$this->load->helper('url', 'form');

		//load library
		$this->load->library(array('table', 'amenu', 'form_validation'));

		//load model
		$this->load->model('admin_news_model');
	}

	function index($offset = 0){
		//ofset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);

		//load data
		$entries = $this->admin_news_model->get_paged_list($this->limit, $offset)->result();

		//generate pagination
		$this->load->library('pagination');
		$config['base_url']    = site_url('admin/nieuws');
        $config['total_rows']  = $this->admin_news_model->count_all();
        $config['per_page']    = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination']    = $this->pagination->create_links();

        //generate table data
        $this->load->library('table');
        //$this->table->set_empty("&nbsp;");
        $this->table->set_heading('id', 'Title', 'Content', 'Date','');
        //$i = 0 + $offset;
        foreach ($entries as $entry){
        	$this->table->add_row($entry->id, substr($entry->title, 0, 10)."..", substr($entry->text, 0, 40)."..", $entry->date,
        		anchor('admin/nieuws/read/'.$entry->id,'view', array('class'=>'view')).' '.
        		anchor('admin/nieuws/update/'.$entry->id, 'update', array('class'=>'update')).' '.
        		anchor('admin/nieuws/delete/'.$entry->id, 'delete', array('class'=>'delete', 'onclick'=>"return confirm('Are you sure you want to delete this entry?')"))
        	);
        }
        $data['table'] = $this->table->generate();
        $data['add_data'] = 'admin/nieuws/create';
        $data['show_add_button'] = TRUE;

        //load view
        	$amenu = new Amenu;

			$data['menu'] = $amenu->show_menu();

			$this->load->view('templates/backend/header', $data);
			$this->load->view('admin/entryList', $data);
			$this->load->view('templates/backend/footer');
        
	}

	function delete(){

		$id = $this->uri->segment(4);
		//delete entry
		$this->admin_news_model->delete($id);

		//redirect to entry list page
		redirect('admin/nieuws');
	}

	function create()
	{
		$this->form_validation->title = $this->input->post('title');
		$this->form_validation->text = $this->input->post('text');

		//set common properties
		$data['title'] = 'Add new entry';
		$data['message'] = '';
		$data['action'] = site_url('admin/nieuws/create');
		$data['link_back'] = anchor('admin/nieuws', 'Back to list of entries', array('class'=>'back'));
		$data['title_fieldname'] = 'title';
		$data['content_fieldname'] = 'text';

		//load view
		$amenu = new Amenu;

		$data['menu'] = $amenu->show_menu();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');

		if ($this->form_validation->run() === FALSE) // Something went wrong!
		{
			$this->load->view('templates/backend/header', $data);
			$this->load->view('admin/entryEdit', $data);
			$this->load->view('templates/backend/footer');
		}
		else
		{
			$bool = $this->admin_news_model->save();

			if ($bool == false)
			{
				$data['message'] = 'Title already in use';

				$this->load->view('templates/backend/header', $data);
				$this->load->view('admin/entryEdit', $data);
				$this->load->view('templates/backend/footer');
				// + error, title / slug in use
			}
			else
			{			
				redirect('admin/nieuws');
			}
		}
	}

	function read() {
		//set common properties
		$data['title'] = 'Entry Details';
		$data['link_back'] = anchor('admin/nieuws', 'Back to list of entries',array('class'=>'back'));

		$id = $this->uri->segment(4);
		//get entry details
		$data['entry'] = $this->admin_news_model->get_by_id($id)->row();

		//load view
		$amenu = new Amenu;

		$datam['menu'] = $amenu->show_menu();

		$this->load->view('templates/backend/header', $datam);
		$this->load->view('admin/news/entryView_news', $data);
		$this->load->view('templates/backend/footer');
	}

	function update() 
	{
		// Get id from url
		$id = $this->uri->segment(4);

		$entry = $this->admin_news_model->get_by_id($id)->row();

		// Prefill form values
		if ($this->input->post('title') == '')	
		{	
			$this->form_validation->title = $entry->title;	
		}
		else 	
		{	
			$this->form_validation->title = $this->input->post('title');	
		}


		if ($this->input->post('text') == '')		
		{	
			$this->form_validation->text = $entry->text;	
		}
		else 										
		{	
			$this->form_validation->text = $this->input->post('text');	
		}
		
		//set common properties
		$data['title'] = 'Update entry';
		$data['message'] = '';
		$data['action'] = site_url('admin/nieuws/update/'.$id);
		$data['link_back'] = anchor('admin/nieuws','Back to list of entries', array('class'=>'back'));
		$data['title_fieldname'] = 'title';
		$data['content_fieldname'] = 'text';

		//load view
		$amenu = new Amenu;

		$data['menu'] = $amenu->show_menu();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');

		if ($this->form_validation->run() === FALSE) // Something went wrong!
		{
			$this->load->view('templates/backend/header', $data);
			$this->load->view('admin/entryEdit', $data);
			$this->load->view('templates/backend/footer');
		}
		else
		{
			$bool = $this->admin_news_model->update($id);

			if ($bool == false)
			{
				$data['message'] = 'Title already in use';

				$this->form_validation->title = $this->input->post('title');
				$this->form_validation->text = $this->input->post('text');

				$this->load->view('templates/backend/header', $data);
				$this->load->view('admin/entryEdit', $data);
				$this->load->view('templates/backend/footer');
				// + error, title / slug in use
			}
			else
			{			
				redirect('admin/nieuws');
			}
		}
	}
/*
	function updateEntry(){
		//set common properties
		$data['title'] = 'Update entry';
		$data['action'] = site_url('admin_news/updateEntry');
		$data['link_back'] = anchor('admin_news', 'Back to list of entries', array('class'=>'back'));

		//set validation properties
		$this->_set_fields();
		$this->_set_rules();

		//run validation
		// if ($this->form_validation->run() == FALSE){
		// 	$data['message'] = 'nope';
		// }else{
			//save data
			$id = $this->uri->segment(3);
			// $entry = array('title' => $this->input->post('title'),
			// 				'text' => $this->input->post('text'));
			$this->admin_news_model->update($id);

			//set user message
			$data['message'] = '<div class="success">update entry success</div>';
		// }
			redirect('admin_news');

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
	}*/
}
?>