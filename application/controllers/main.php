<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	private $data;
	
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->ion_auth->logged_in())	
		{
			redirect('auth/login', 'refresh');
			exit();
		}
		
		$this->load->library('grocery_CRUD');
	}

	public function _data_output($output = null)
	{
		
		$this->load->view('crud_template',$output);

	}

	public function index()
	{
		$this->load->library('assets');
		$css = array(
					'css/style.css'
					);
		$js = array();
					
		$this->data['css'] = $this->assets->get_css($css);
		$this->data['js'] = $this->assets->get_js($js);
		$this->data['title'] = "หน้าหลัก";
		$this->data['navigation'] = $this->load->view('template/navigation','',TRUE);
		$this->data['content'] = $this->load->view('main/main','',TRUE);
		
		$this->load->view('template/main',$this->data);
	
	}

	public function search($keyword=FALSE)
	{
		$this->load->model('member_model');
		
		if(!($keyword) && !($this->input->post('keyword')))
		{
			redirect('');
			exit();
		}else{
			if(!($keyword))
			{
				$keyword = $this->input->post('keyword');
			}	
		}
		
		$this->data['keyword'] = $keyword;
		$this->data['title'] = 'หน้าหลัก';
		
/********************************        config pagination    ********************/		
		$config['base_url'] = base_url()."main/search/$keyword/";
		$config['uri_segment'] = 4;
		$config['per_page'] = 25;																//how many record per page
		$config['num_links'] = 6;																//how many link to show
		$config['full_tag_open'] = '<div class="pagination pagination-centered pagination-small"><ul>';										//bootstrap use <div class="pagination"></div>
		$config['full_tag_close'] = '</ul></div>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#"><b>';
		$config['cur_tag_close'] = '</b></a></li>';
		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";
		$search_query = $this->member_model->main_search($keyword, $config['per_page'],$this->uri->segment(4));
		$this->data['histories'] = $search_query;
		$config['total_rows'] = $this->member_model->get_search_rows();
		$this->pagination->initialize($config);												//create
		$this->data['pagination'] = $this->pagination->create_links();
		
		$previous_url = uri_string();
		$explode = explode('/',$previous_url);
		
		
		//no keyword in uri
		if(count($explode) == 2)
		{
			$previous_url = $previous_url."/".urldecode($keyword);
		}
		
		$this->session->set_userdata('previous_url',$previous_url);
		
		$this->data['total_rows'] = $config['total_rows'];
		$this->data['rows_text'] = 'พบรายการทั้งหมด '.$config['total_rows']." รายการ สำหรับการค้นหา '".urldecode($keyword)."'" ;
		
		
		//echo $keyword;
		
		//exit();
		
/**********************************end config pagination*******************************************************************/		
		$this->load->view('template/main',$this->data);
	}

	public function jobs()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('jobs');
			$crud->set_relation('type','job_type','name');
			$crud->set_subject('เครื่องจักร / งาน');
			$output = $crud->render();
			$this->_data_output($output);
	}

	public function job_type()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('job_type');
			$crud->set_subject('ประเภทงาน');
			$output = $crud->render();
			$this->_data_output($output);
	}
	

	public function papers()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('papers');
			$crud->set_subject('กระดาษ');
			$output = $crud->render();
			$this->_data_output($output);
	}
	

	public function technician()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('technician');
			$crud->set_subject('technician');
			$output = $crud->render();
			$this->_data_output($output);
	}
	

	public function duration()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('duration');
			$crud->set_subject('Duration');
			$output = $crud->render();
			$this->_data_output($output);
	}
	
	
	
	public function history()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('history');
			$crud->set_subject('History');
			$output = $crud->render();
			$this->_data_output($output);
	}
	
	public function members()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('members');
			$crud->columns('idcard', 'fname','lname','dob','address','sub_district','district','province_id','postcode');
			$crud->set_subject('Member');
			$output = $crud->render();
			$this->_data_output($output);
		
	}
	
	public function provinces()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('provinces');
			$crud->set_relation('geo_id','geography','name');
			$crud->set_subject('รายชื่อจังหวัด');
			$extras = array();
			$output = $crud->render();
			$this->_data_output($output);
	}	
	
	public function issues()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('issues');
			$crud->set_relation('book_id','books','name');
			$crud->display_as('pocketbook_id','Pocket Book');
			$crud->set_subject('Issue');
			$output = $crud->render();
			
			$this->_data_output($output);
	}
		
	public function books()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('books');
			$crud->set_subject('Books');
			$output = $crud->render();

			$this->_data_output($output);
	}	
		
	public function careers()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('careers');
			$crud->set_subject('Careers');
			$output = $crud->render();

			$this->_data_output($output);
	}		
		
	public function contacts()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('contacts');
			$crud->set_subject('Contacts');
			$output = $crud->render();

			$this->_data_output($output);
	}
		
	public function countries()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('countries');
			$crud->set_subject('Countries');
			$output = $crud->render();

			$this->_data_output($output);
	}	
		
	public function education()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('education');
			$crud->set_subject('Education');
			$output = $crud->render();

			$this->_data_output($output);
	}
		
	public function geography()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('geography');
			$crud->set_subject('Geography');
			$output = $crud->render();

			$this->_data_output($output);
	}
		
	public function personalize()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('personalize');
			$crud->set_subject('Personalize');
			$output = $crud->render();

			$this->_data_output($output);
	}
		
	public function questions()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('questions');
			$crud->set_subject('Questions');
			$output = $crud->render();

			$this->_data_output($output);
	}
		
	public function salary()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('salary');
			$crud->set_subject('Salary');
			$output = $crud->render();

			$this->_data_output($output);
	}
		
	public function sexual()
	{
			$crud = new grocery_CRUD();
			$crud->set_table('sexual');
			$crud->set_subject('Sexual');
			$output = $crud->render();

			$this->_data_output($output);
	}

}