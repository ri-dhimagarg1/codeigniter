<?php
 class Admin extends MY_Controller{

// Displaying articles list
          public function dashboard()
          {
          	$this->load->helper('form');
          	$this->load->model('articlesmodel');
          	$this->load->library('pagination');
          	$config=[
          	'base_url'=> base_url('index.php/admin/dashboard'),
          	'per_page'=>5,
          	'total_rows'=>$this->articlesmodel->num_rows(),


          	];
          	$this->pagination->initialize($config);
          	
          	$articles = $this->articlesmodel->articles_list($config['per_page'],$this->uri->segment(3));
          	$this->load->view('admin/dashboard',['art'=>$articles]);
          }


          // dISPLAYING ADDED ARTICLE FORM
          public function addarticle()
          {
          	$this->load->helper('form');
          	$this->load->view('admin/add_article');
          }


          // TO STORE ADD ARTICLE IN DB
          public function store_articles()
          {
          	$this->load->library('form_validation');
          	if($this->form_validation->run('add_articles_rules')){
          		$post = $this->input->post();
          		unset($post['Submit']);
          		$this->load->model('articlesmodel');
          		if($this->articlesmodel->add_article($post))
          		{
          				$this->session->set_flashdata('feedback','Successfully inserted');
          				// FOR DIAPLYING GREEN OR RED BOX.
          				$this->session->set_flashdata('feedback_class','alert-success');
          		}
          		else
          		{
          			$this->session->set_flashdata('feedback','failed to insert');
          				$this->session->set_flashdata('feedback_class','alert-danger');
          		}
          			//AFTER ADDING ARTICLE REDIRECT TO DASHBOARD TO SEE ALL INSERTED ARTICLES
          			return redirect('admin/dashboard');

          	}
          	else
          	{
          		return redirect('admin/addarticle');
          	}
          }


          //THIS IF FOR EDIT ARTICLE FUNCTIONALITY IN THIS WE HAVE USED GET TYPE WHICH IS PASSING DATA FROM VIEW TO THIS FUNCTION AND WE ARE ABLE TO FETCH THAT ARTICLE INFORMATION THROUGH TAHT ID
          public function edit_article($article)
          {
          	$this->load->model('articlesmodel');
          	$article = $this->articlesmodel->find_article($article);
          	$this->load->helper('form');
          	$this->load->view('admin/edit_article',['article'=>$article]);


          }

          public function update_article($article_id)
          {
          	$this->load->library('form_validation');
          	if($this->form_validation->run('add_articles_rules')){
          		$post = $this->input->post();
          		unset($post['Submit']);
          		$this->load->model('articlesmodel');
          		if($this->articlesmodel->update_article($article_id,$post))
          		{
          				$this->session->set_flashdata('feedback','Successfully updated');
          				// FOR DIAPLYING GREEN OR RED BOX.
          				$this->session->set_flashdata('feedback_class','alert-success');
          		}
          		else
          		{
          			$this->session->set_flashdata('feedback','failed to update');
          				$this->session->set_flashdata('feedback_class','alert-danger');
          		}
          			//AFTER ADDING ARTICLE REDIRECT TO DASHBOARD TO SEE ALL INSERTED ARTICLES
          			return redirect('admin/dashboard');

          	}
          	else
          	{	// in redirect functio we load controller
          		return redirect('admin/edit_article');
          	}


          }


          public function delete_article()
          {
          	$article_id=$this->input->post('article_id');
          	$this->load->model('articlesmodel');
          	if($this->articlesmodel->delete_article($article_id))
          		{
          				$this->session->set_flashdata('feedback','Successfully deleted');
          				// FOR DIAPLYING GREEN OR RED BOX.
          				$this->session->set_flashdata('feedback_class','alert-success');
          		}
          		else
          		{
          			$this->session->set_flashdata('feedback','failed to delete');
          				$this->session->set_flashdata('feedback_class','alert-danger');
          		}
          			//AFTER ADDING ARTICLE REDIRECT TO DASHBOARD TO SEE ALL INSERTED ARTICLES
          			return redirect('admin/dashboard');


          }

          // IF USER IS NOT LOGGED IN THEN NOT ABLE TO ACCESS DASHBOARD DIRECTLY.
         public function __construct()
          {
          	parent::__construct();
          	if(! $this->session->userdata('user_id'))
          		return redirect('login');
          }



 } 
 ?>