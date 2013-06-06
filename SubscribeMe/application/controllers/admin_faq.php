<?php
class admin_faq extends AD_Controller {

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
		$this->load->model('admin_faq_model');
	}

	function index($offset = 0){
		//ofset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);

		//load data
		$entries = $this->admin_faq_model->get_paged_list($this->limit, $offset)->result();

		//generate pagination
		$this->load->library('pagination');
		$config['base_url']    = site_url('admin/faq');
        $config['total_rows']  = $this->admin_faq_model->count_all();
        $config['per_page']    = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination']    = $this->pagination->create_links();

        //generate table data
        $this->load->library('table');
        //$this->table->set_empty("&nbsp;");
        $this->table->set_heading('id', 'Title', 'Content', '');
        //$i = 0 + $offset;
        foreach ($entries as $entry){
        	$this->table->add_row($entry->id, substr($entry->question, 0, 10)."..", substr($entry->answer, 0, 40)."..", 
        		anchor('admin/faq/read/'.$entry->id,'view', array('class'=>'view')).' '.
        		anchor('admin/faq/update/'.$entry->id, 'update', array('class'=>'update')).' '.
        		anchor('admin/faq/delete/'.$entry->id, 'delete', array('class'=>'delete', 'onclick'=>"return confirm('Are you sure you want to delete this entry?')"))
        	);
        }
        $data['table'] = $this->table->generate();
        $data['add_data'] = 'admin/faq/create';
        $data['show_add_button'] = TRUE;

        //load view
        	$amenu = new Amenu;

			$data['menu'] = $amenu->show_menu();

			$this->load->view('templates/backend/header', $data);
			$this->load->view('admin/entryList', $data);
			$this->load->view('templates/backend/footer');
        
	}


	function read() {
		//set common properties
		$data['title'] = 'Entry Details';
		$data['link_back'] = anchor('admin/faq', 'Back to list of entries',array('class'=>'back'));

		$id = $this->uri->segment(4);
		//get entry details
		$data['entry'] = $this->admin_faq_model->get_by_id($id)->row();

		//load view
		$amenu = new Amenu;

		$data['menu'] = $amenu->show_menu();

		$this->load->view('templates/backend/header', $data);
		$this->load->view('admin/faq/entryView_faq', $data);
		$this->load->view('templates/backend/footer');
	}

	function create()
	{
		$this->form_validation->question = $this->input->post('question');
		$this->form_validation->answer = $this->input->post('answer');

		//set common properties
		$data['title'] = 'Add new entry';
		$data['message'] = '';
		$data['action'] = site_url('admin/faq/create');
		$data['link_back'] = anchor('admin/faq', 'Back to list of entries', array('class'=>'back'));
		$data['title_fieldname'] = 'question';
		$data['content_fieldname'] = 'answer';

		//load view
		$amenu = new Amenu;

		$data['menu'] = $amenu->show_menu();

		$this->form_validation->set_rules('question', 'Question', 'required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');

		if ($this->form_validation->run() === FALSE) // Something went wrong!
		{
			$this->load->view('templates/backend/header', $data);
			$this->load->view('admin/entryEdit', $data);
			$this->load->view('templates/backend/footer');
		}
		else
		{
			$bool = $this->admin_faq_model->save();

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
				redirect('admin/faq');
			}
		}
	}

	function update() 
	{
		// Get id from url
		$id = $this->uri->segment(4);

		$entry = $this->admin_faq_model->get_by_id($id)->row();

		// Prefill form values
		if ($this->input->post('question') == '')	
		{	
			$this->form_validation->question = $entry->question;	
		}
		else 	
		{	
			$this->form_validation->question = $this->input->post('question');	
		}


		if ($this->input->post('answer') == '')		
		{	
			$this->form_validation->answer = $entry->answer;	
		}
		else 										
		{	
			$this->form_validation->answer = $this->input->post('answer');	
		}
		
		//set common properties
		$data['title'] = 'Update entry';
		$data['message'] = '';
		$data['action'] = site_url('admin/faq/update/'.$id);
		$data['link_back'] = anchor('admin/faq','Back to list of entries', array('class'=>'back'));
		$data['title_fieldname'] = 'question';
		$data['content_fieldname'] = 'answer';

		//load view
		$amenu = new Amenu;

		$data['menu'] = $amenu->show_menu();

		$this->form_validation->set_rules('question', 'Question', 'required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');

		if ($this->form_validation->run() === FALSE) // Something went wrong!
		{
			$this->load->view('templates/backend/header', $data);
			$this->load->view('admin/entryEdit', $data);
			$this->load->view('templates/backend/footer');
		}
		else
		{
			$bool = $this->admin_faq_model->update($id);

			if ($bool == false)
			{
				$data['message'] = 'Title already in use';

				$this->form_validation->question = $this->input->post('question');
				$this->form_validation->answer = $this->input->post('answer');

				$this->load->view('templates/backend/header', $data);
				$this->load->view('admin/entryEdit', $data);
				$this->load->view('templates/backend/footer');
				// + error, title / slug in use
			}
			else
			{			
				redirect('admin/faq');
			}
		}
	}


	function delete()
	{
		// Get id from url -> delete this record
		$id = $this->uri->segment(4);
		$this->admin_faq_model->delete($id);

		// Redirect back to overview
		redirect('admin/faq');
	}

	/*function _set_fields(){
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
	*/
}
