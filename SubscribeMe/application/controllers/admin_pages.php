<?php
class Admin_pages extends AD_Controller {

	// Number of entries per page
	private $limit = 10;

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url', 'form'); // Load helper(s)

		$this->load->library(array('table', 'amenu', 'form_validation')); // Load library(s)

		$this->load->model('admin_pages_model'); // Load model(s)
	}

	public function index($offset = 0)
	{
		// Set offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);

		// Load data from model
		$entries = $this->admin_pages_model->get_paged_list($this->limit, $offset)->result();

		// Generate pagination
		$this->load->library('pagination');
		$config['base_url']    = site_url('admin/paginas');
        $config['total_rows']  = $this->admin_pages_model->count_all();
        $config['per_page']    = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination']    = $this->pagination->create_links();

        // Generate table data
        $this->table->set_heading('id', 'Title', 'Page', 'Text', '');
        foreach ($entries as $entry)
        {
        	$this->table->add_row($entry->id, substr($entry->title, 0, 10)."..", substr($entry->page, 0, 10)."..", substr($entry->text, 0, 40)."..", 
        		anchor('admin/paginas/read/'.$entry->id,'view', array('class'=>'view')).' '.
        		anchor('admin/paginas/update/'.$entry->id, 'update', array('class'=>'update'))
        	);
        }        
        $data['table'] = $this->table->generate();
        $data['add_data'] = '';
        $data['show_add_button'] = FALSE;

        // Load view
    	$amenu = new Amenu;

		$data['menu'] = $amenu->show_menu();
		$data['title'] = 'CRUD -> PAGES';

		$this->load->view('templates/backend/header', $data);
		$this->load->view('admin/entryList', $data);
		$this->load->view('templates/backend/footer');  
	}	

	function read() 
	{
		// Set common properties
		$data['title'] = 'Entry details';
		$data['link_back'] = anchor('admin/paginas', 'Back to list of entries',array('class'=>'back'));

		// Get $id from url
		$id = $this->uri->segment(4);

		// Get entry details
		$data['entry'] = $this->admin_pages_model->get_by_id($id)->row();

		// Load view
		$amenu = new Amenu;

		$data['menu'] = $amenu->show_menu();

		$this->load->view('templates/backend/header', $data);
		$this->load->view('admin/pages/entryView_pages', $data);
		$this->load->view('templates/backend/footer');
	}

	function update() 
	{
		// Get $id from url
		$id = $this->uri->segment(4);

		$entry = $this->admin_pages_model->get_by_id($id)->row();

		// Prefill form values
		if ($this->input->post('title') == '')			{	$this->form_validation->title = $entry->title;				}
		else 											{	$this->form_validation->title = $this->input->post('title');	}

		if ($this->input->post('text') == '')			{	$this->form_validation->text = $entry->text;					}
		else 											{	$this->form_validation->text = $this->input->post('text');		}
		
		// Set common properties
		$data['title'] = 'Update entry';
		$data['message'] = '';
		$data['action'] = site_url('admin/paginas/update/'.$id);
		$data['link_back'] = anchor('admin/paginas','Back to list of entries', array('class'=>'back'));
		$data['title_fieldname'] = 'title';
		$data['content_fieldname'] = 'text';

		// Load view
		$amenu = new Amenu;

		$data['menu'] = $amenu->show_menu();

		// Set title and text field as required
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');

		if ($this->form_validation->run() === FALSE) // Display error (title and/or text field is empty)
		{
			$this->load->view('templates/backend/header', $data);
			$this->load->view('admin/entryEdit', $data);
			$this->load->view('templates/backend/footer');
		}
		else // Update item into DB
		{
			$this->admin_pages_model->update($id); 
		
			redirect('admin/paginas'); // Redirect back to overview
		}
	}
}