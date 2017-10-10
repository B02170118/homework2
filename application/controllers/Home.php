<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('home');
	}
	public function products()
	{
		$this->load->view('products');
	}
	public function register()
	{	
		$data['msg'] ='';
		$this->load->view('register',$data);
	}
	public function login()
	{
		
		$data['msg'] ='';
		$this->load->view('login',$data);
	}
	public function about()
	{
		$this->load->view('about');
	}

	public function login_validation()
	{	
			// set variables from the form
			$username = $this->input->post('username');//echo $username; echo '<br>';
			$password = $this->input->post('password');//echo $password; echo '<br>';
			
			$this->load->model('user_model');
			$query = $this->user_model->resolve_user_login($username,$password);
			
			if($query == true)
			 {
				// set session user datas
				$data['username'] = $username;
				
				// user login ok
				$this->load->view('signinOK',$data);	
			} else {
				
				// login failed
				$data['msg'] = '<h1>wrong username</h1>';
				
				// send error to the view
				$this->load->view('signinV',$data);			
			}
		
	}
	public function register_validation()
	{	
			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password'); 
			
			$this->load->model('user_model');
			$query = $this->user_model->create_user($username,$password);
			
			if ($query == false) {
				$data['username'] = $username;
				$this->load->view('registerOK', $data);
			} else {

					
				// send error to the view
				//$data['msg'] = '<h1>wrong username</h1>';
				$this->load->view('registerV');	
				
				// user creation failed, this should never happen
				//$data->error = 'There was a problem creating your new account. Please try again.';
				//$this->load->view('signup', $data);
			}

			
	}

}
