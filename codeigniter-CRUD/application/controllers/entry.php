<?php
class Entry extends CI_Controller {

	//number of entries per page
	private $limit = 10;

	function Entry(){
		parent::__construct();

		//load helper
		$this->load->helper('url', 'form');

		//load library
		$this->load->library(array('table', 'form_validation'));

		//load model
		$this->load->model('EntryModel', '', TRUE);


	}

	function index($offset = 0){
		//ofset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);

		//load data
		$entries = $this->EntryModel->get_paged_list($this->limit, $offset)->result();

		//generate pagination
		$this->load->library('pagination');
		$config['base_url']    = site_url('entry/index/');
        $config['total_rows']  = $this->EntryModel->count_all();
        $config['per_page']    = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination']    = $this->pagination->create_links();

        //generate table data
        $this->load->library('table');
        $this->table->set_empty("&nbsp;");
        $this->table->set_heading('id', 'Title', 'Content', 'Date');
        $i = 0 + $offset;
        foreach ($entries as $entry){
        	$this->table->add_row(++$i, $entry->title, $entry->content, $entry->date,
        		anchor('entry/view/'.$entry->id,'view', array('class'=>'view')).' '.
        		anchor('entry/update/'.$entry->id, 'update', array('class'=>'update')).' '.
        		anchor('entry/delete/'.$entry->id, 'delete', array('class'=>'delete', 'onclick'=>"return confirm('Are you sure you want to delete this entry?')"))
        	);
        }
        $data['table'] = $this->table->generate();

        //load view
        $this->load->view('entryList', $data);
	}

	function add(){
		//set validation properties
		$this->_set_fields();

		$this->form_validation->id = '';
		$this->form_validation->title = '';
		$this->form_validation->content = '';
		$this->form_validation->date = '';


		//set common properties
		$data['title'] = 'Add new entry';
		$data['content'] = '';
		$data['message'] = '';
		$data['action'] = site_url('entry/addEntry');
		$data['link_back'] = anchor('entry/index/', 'Back to list of entries', array('class'=>'back'));

		//load view
		$this->load->view('entryEdit', $data);
	}

	function addEntry(){
		//set common properties
		$data['title'] = 'Add new entry';
		$data['action'] = site_url('entry/addEntry');
		$data['link_back'] = anchor('entry/index/','Back to list of entries', array('class'=>'back'));

		//set validation properties
		$this->_set_fields();
		$this->_set_rules();

		//run validation
		// if($this->form_validation->run() == FALSE){
		// 	$data['message'] = '';
		// }else{
			//save data
			$id = $this->EntryModel->save();

			//set form input title="id"
			$this->form_validation->id = $id;

			//set user message
			$data['message'] = '<div class="success">add new entry success</div>';
		// }

		//load view
		$this->load->view('entryEdit', $data);
	}

	function view($id) {
		//set common properties
		$data['title'] = 'Entry Details';
		$data['link_back'] = anchor('entry/index/', 'Back to list of entries',array('class'=>'back'));

		//get entry details
		$data['entry'] = $this->EntryModel->get_by_id($id)->row();

		//load view
		$this->load->view('entryView', $data);
	}

	function update($id) {
		//set validation properties
		$this->_set_fields();

		//prefill form values
		$entry = $this->EntryModel->get_by_id($id)->row();
		$this->form_validation->id = $id;
		$this->form_validation->title = $entry->title;
		$this->form_validation->content = $entry->content;
		$this->form_validation->date = $entry->date;

		//set common properties
		$data['title'] = 'Update entry';
		$data['message'] = '';
		$data['action'] = site_url('entry/updateEntry');
		$data['link_back'] = anchor('entry/index/','Back to list of entries', array('class'=>'back'));

		//load view
		$this->load->view('entryEdit', $data);
	}

	function updateEntry(){
		//set common properties
		$data['title'] = 'Update entry';
		$data['action'] = site_url('entry/updateEntry');
		$data['link_back'] = anchor('entry/index', 'Back to list of entries', array('class'=>'back'));

		//set validation properties
		$this->_set_fields();
		$this->_set_rules();

		//run validation
		// if ($this->form_validation->run() == FALSE){
		// 	$data['message'] = 'nope';
		// }else{
			//save data
			$id = $this->input->post('id');
			// $entry = array('title' => $this->input->post('title'),
			// 				'content' => $this->input->post('content'));
			$this->EntryModel->update($id);

			//set user message
			$data['message'] = '<div class="success">update entry success</div>';
		// }

		//load view
		$this->load->view('entryEdit', $data);
	}

	function delete($id){
		//delete entry
		$this->EntryModel->delete($id);

		//redirect to entry list page
		redirect('entry/index/','refresh');
	}

	//validation fields
	function _set_fields(){
		// $fields[''] = array(
		// 	'field' => 'id',
		// 	'label' => 'id');
		$fields[''] = array(
			'field' => 'title',
			'label' => 'title');
		$fields[''] = array(
			'field' => 'content',
			'label' => 'content');
		// $fields[''] = array(
		// 	'field' => 'date',
		// 	'label' => 'date');

		$this->form_validation->set_rules($fields);
	}

	//validation rules
	function _set_rules(){
		$rules['title'] = 'trim|required';
		$rules['content'] = 'trim|required';
		// $rules['date'] = 'trim|required';

		$this->form_validation->set_rules($rules);

		$this->form_validation->set_message('required', '* required');
        $this->form_validation->set_message('isset', '* required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}

	// date_validation callback
    // function valid_date($str)
    // {
    //     if(!ereg("^(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-([0-9]{4})$", $str))
    //     {
    //         $this->validation->set_message('valid_date', 'date format is not valid. dd-mm-yyyy');
    //         return false;
    //     }
    //     else
    //     {
    //         return true;
    //     }
    // }
}
?>