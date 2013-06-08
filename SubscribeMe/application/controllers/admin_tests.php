<?php
class Admin_tests extends AD_Controller {

	// Number of entries per page
	private $limit = 10;

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url', 'form'); // Load helper(s)

		$this->load->library(array('table', 'amenu', 'form_validation')); // Load library(s)

		$this->load->model('admin_tests_model'); // Load model(s)
	}

	public function index($offset = 0)
	{
		// Set offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);

		// Load data from model
		$entries = $this->admin_tests_model->get_paged_list($this->limit, $offset)->result();

		// Generate pagination
		$this->load->library('pagination');
		$config['base_url']    = site_url('admin/toetsen');
        $config['total_rows']  = $this->admin_tests_model->count_all();
        $config['per_page']    = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination']    = $this->pagination->create_links();

        // Generate table data
        $this->table->set_heading('id', 'course_name', 'year', 'period', 'test', '');
        foreach ($entries as $entry)
        {
        	$this->table->add_row($entry->id, substr($entry->course_name, 0, 40), substr($entry->year, 0, 40),substr($entry->period, 0, 40),substr($entry->test, 0, 40),
        		anchor('admin/toetsen/read/'.$entry->id,'view', array('class'=>'view')).' '.
        		anchor('admin/toetsen/update/'.$entry->id, 'update', array('class'=>'update')).' '.
        		anchor('admin/toetsen/delete/'.$entry->id, 'delete', array('class'=>'delete', 'onclick'=>"return confirm('Are you sure you want to delete this entry?')"))
        	);
        }        
        $data['table'] = $this->table->generate();
        $data['add_data'] = '';
        $data['show_add_button'] = FALSE;
        $data['upload'] = 'upload';
        $data['show_upload_button'] = TRUE;

        // Load view
    	$amenu = new Amenu;

		$data['menu'] = $amenu->show_menu();
		$data['title'] = 'CRUD -> TESTS';

		$this->load->view('templates/backend/header', $data);
		$this->load->view('admin/entryList', $data);
		$this->load->view('templates/backend/footer');  
	}

	function read() 
	{
		// Set common properties
		$data['title'] = 'Entry details';
		$data['link_back'] = anchor('admin/toetsen', 'Back to list of entries',array('class'=>'back'));

		// Get $id from url
		$id = $this->uri->segment(4);

		// Get entry details
		$data['entry'] = $this->admin_tests_model->get_by_id($id)->row();

		// Load view
		$amenu = new Amenu;

		$data['menu'] = $amenu->show_menu();

		$this->load->view('templates/backend/header', $data);
		$this->load->view('admin/toetsen/entryView_tests', $data);
		$this->load->view('templates/backend/footer');
	}

	function update() 
	{
		// Get $id from url
		$id = $this->uri->segment(4);

		$entry = $this->admin_tests_model->get_by_id($id)->row();

		// Prefill form values
		if ($this->input->post('year') == '')			{	$this->form_validation->year = $entry->year;					}
		else 											{	$this->form_validation->year = $this->input->post('year');		}
		if ($this->input->post('period') == '')			{	$this->form_validation->period = $entry->period;				}
		else 											{	$this->form_validation->period = $this->input->post('period');	}
		if ($this->input->post('test') == '')			{	$this->form_validation->test = $entry->test;					}
		else 											{	$this->form_validation->test = $this->input->post('test');		}
		
		// Set common properties
		$data['title'] = 'Update entry';
		$data['message'] = '';
		$data['action'] = site_url('admin/toetsen/update/'.$id);
		$data['link_back'] = anchor('admin/toetsen','Back to list of entries', array('class'=>'back'));
		$data['course_name'] = $this->admin_tests_model->courses();
		$data['year_fieldname'] = 'year';
		$data['period_fieldname'] = 'period';
		$data['test_fieldname'] = 'test';

		// Load view
		$amenu = new Amenu;

		$data['menu'] = $amenu->show_menu();

		// Set question and answer field as required
		$this->form_validation->set_rules('year', 'Year', 'required');
		$this->form_validation->set_rules('period', 'Period', 'required');
		$this->form_validation->set_rules('test', 'Test', 'required');

		if ($this->form_validation->run() === FALSE) // Display error (year, period and/or test field is empty)
		{
			$this->load->view('templates/backend/header', $data);
			$this->load->view('admin/entryEdit_tests', $data);
			$this->load->view('templates/backend/footer');
		}
		else // Try update item into DB
		{
			$bool = $this->admin_tests_model->update($id); // Update function will return true or false in $bool

			if ($bool == false) // Display error
			{
				$data['message'] = "Something went wrong, please try again. Remember.. You can't save if you have 0 changes.";

				$this->load->view('templates/backend/header', $data);
				$this->load->view('admin/entryEdit_tests', $data);
				$this->load->view('templates/backend/footer');
			}
			else // Current item successfully updated		
			{
				redirect('admin/toetsen'); // Redirect back to overview
			}
		}
	}

	function delete()
	{		
		$id = $this->uri->segment(4); // Get $id from url
		
		$this->admin_tests_model->delete($id); // Delete this record

		redirect('admin/toetsen'); // Redirect back to overview
	}
}