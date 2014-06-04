<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {
	
	private $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('assets');
	}
	
	public function index()
	{
		
		$this->data['css'] = $this->assets->get_css();
		$this->data['scripts'] = $this->assets->get_script();
		$this->data['title'] = 'test page';
		$this->data['nav'] = 'this is nav';
		$view1['my_data'] = 'data1';
		$this->data['content'] = $this->load->view('view1',$view1,TRUE);
		
		$this->load->view('template/template', $this->data);
	}
	
	public function serialize()
	{
		//serialize($value)
		// unserialize($str)
		$s = serialize(array(
						'big',
						'test',
						'por',
						'tt'
						));
		
		$array = array(
				't'=>'test',
				'b'=>'big',
				'ta'=>'tanawat',
				'r'=>'raitim'
				);
		
		echo '<pre>';				
		print_r($s);
		echo '</pre>';
		
		echo '<br />';
		
		$us = unserialize($s);
		
		echo '<pre>';				
		print_r($us);
		echo '</pre>';
		
		
	}
	
	public function dragable()
	{
		$this->load->view('test/dragable');
	}
	
	public	function json()
	{
		$s = json_encode(array(
						'big',
						'test',
						'por',
						'tt'
						));
		
		$array = array(
				't'=>'test',
				'b'=>'big',
				'ta'=>'tanawat',
				'r'=>'raitim'
				);
		echo '<pre>';				
		print_r($s);
		echo '</pre>';
		
		echo '<br />';
		
		$us = json_decode($s);
		
		echo '<pre>';				
		print_r($us);
		echo '</pre>';
	}
	
	public function test_array()
	{
		
		$array1 = array(
						'items'=>array(
							'Milk',
							'Eggs',
							'Bread'
						)
					);
		
		//or
		
		//$array2 = ['items'=>['Milk', 'Eggs', 'Bread']];
		
		
		echo '<pre>';
		
		print_r($array1);
		
		echo '</pre>';
		
		
		echo '<pre>';
		
		var_dump($array1);
		
		echo '</pre>';
		
		
		//$object = 
		
		
		
		
		
		
		
	}
}