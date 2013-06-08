<?php
class Admin_news extends AD_Controller {

	// Number of entries per page
	private $limit = 10;

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url', 'form'); // Load helper(s)

		$this->load->library(array('table', 'amenu', 'form_validation')); // Load library(s)

		$this->load->model('admin_news_model'); // Load model(s)
	}

	public function index($offset = 0)
	{
		// Set offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);

		// Load data from model
		$entries = $this->admin_news_model->get_paged_list($this->limit, $offset)->result();

		// Generate pagination
		$this->load->library('pagination');
		$config['base_url']    = site_url('admin/nieuws');
        $config['total_rows']  = $this->admin_news_model->count_all();
        $config['per_page']    = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination']    = $this->pagination->create_links();

        // Generate table data
        $this->table->set_heading('id', 'Title', 'Text', '');
        foreach ($entries as $entry)
        {
        	$this->table->add_row($entry->id, substr($entry->title, 0, 10)."..", substr($entry->text, 0, 40)."..", 
        		anchor('admin/nieuws/read/'.$entry->id,'view', array('class'=>'view')).' '.
        		anchor('admin/nieuws/update/'.$entry->id, 'update', array('class'=>'update')).' '.
        		anchor('admin/nieuws/delete/'.$entry->id, 'delete', array('class'=>'delete', 'onclick'=>"return confirm('Are you sure you want to delete this entry?')"))
        	);
        }        
        $data['table'] = $this->table->generate();
        $data['add_data'] = 'admin/nieuws/create';
        $data['show_add_button'] = TRUE;
        $data['upload'] = '';
        $data['show_upload_button'] = FALSE;

        // Load view
    	$amenu = new Amenu;

		$data['menu'] = $amenu->show_menu();
		$data['title'] = 'CRUD -> NEWS';

		$this->load->view('templates/backend/header', $data);
		$this->load->view('admin/entryList', $data);
		$this->load->view('templates/backend/footer');  
	}

	function create()
	{
		// Prefill form values
		$this->form_validation->title = $this->input->post('title');
		$this->form_validation->text = $this->input->post('text');

		// Set common properties
		$data['title'] = 'Create a FAQ item';
		$data['message'] = '';
		$data['action'] = site_url('admin/nieuws/create');
		$data['link_back'] = anchor('admin/nieuws', 'Back to list of entries', array('class'=>'back'));
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
		else // Try insert new item into DB
		{
			$bool = $this->admin_news_model->save(); // Save function will return true or false in $bool

			if ($bool == false) // Display error (title (and slug) are in use)
			{
				$data['message'] = 'Title already in use';

				$this->load->view('templates/backend/header', $data);
				$this->load->view('admin/entryEdit', $data);
				$this->load->view('templates/backend/footer');
			}
			else // New item successfully created
			{			
				redirect('admin/nieuws'); // Redirect back to overview
			}
		}
	}

	function read() 
	{
		// Set common properties
		$data['title'] = 'Entry details';
		$data['link_back'] = anchor('admin/nieuws', 'Back to list of entries',array('class'=>'back'));

		// Get $id from url
		$id = $this->uri->segment(4);

		// Get entry details
		$data['entry'] = $this->admin_news_model->get_by_id($id)->row();

		// Load view
		$amenu = new Amenu;

		$data['menu'] = $amenu->show_menu();

		$this->load->view('templates/backend/header', $data);
		$this->load->view('admin/news/entryView_news', $data);
		$this->load->view('templates/backend/footer');
	}

	function update() 
	{
		// Get $id from url
		$id = $this->uri->segment(4);

		$entry = $this->admin_news_model->get_by_id($id)->row();

		// Prefill form values
		if ($this->input->post('title') == '')			{	$this->form_validation->title = $entry->title;				}
		else 											{	$this->form_validation->title = $this->input->post('title');	}

		if ($this->input->post('text') == '')			{	$this->form_validation->text = $entry->text;					}
		else 											{	$this->form_validation->text = $this->input->post('text');		}
		
		// Set common properties
		$data['title'] = 'Update entry';
		$data['message'] = '';
		$data['action'] = site_url('admin/nieuws/update/'.$id);
		$data['link_back'] = anchor('admin/nieuws','Back to list of entries', array('class'=>'back'));
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
		else // Try update item into DB
		{
			$bool = $this->admin_news_model->update($id); // Update function will return true or false in $bool

			if ($bool == false) // Display error (title (and slug) are in use)
			{
				$data['message'] = 'Title already in use';

				$this->load->view('templates/backend/header', $data);
				$this->load->view('admin/entryEdit', $data);
				$this->load->view('templates/backend/footer');
			}
			else // Current item successfully updated
			{			
				redirect('admin/nieuws'); // Redirect back to overview
			}
		}
	}

	function delete()
	{		
		$id = $this->uri->segment(4); // Get $id from url
		
		$this->admin_news_model->delete($id); // Delete this record

		redirect('admin/nieuws'); // Redirect back to overview
	}
}