<?php
class User extends MY_Controller{
public function index(){
	$this->load->helper('form');
	$this->load->model('articlesmodel');
	$this->load->library('pagination');
	$config=[
          	'base_url'=> base_url('index.php/user/index'),
          	'per_page'=>5,
          	'total_rows'=>$this->articlesmodel->all_num_rows(),


          	];
          	$this->pagination->initialize($config);
          	
          	$articles = $this->articlesmodel->all_articles_list($config['per_page'],$this->uri->segment(3));
          	
	$this->load->view('public/articles_list',compact('articles'));
}

public function search()
{
	$this->load->library('form_validation');
	$this->form_validation->set_rules('query','Query','required');
	if(! $this->form_validation->run())
		return $this->index();
	$result = $this->input->post('query');
	
	$this->load->model('articlesmodel');
	$articles=$this->articlesmodel->search_articles($result);
	$this->load->view('public/search_list',compact('articles'));

}

public function article( $id )
{
	$this->load->helper('form');
	$this->load->model('articlesmodel');
	$article=$this->articlesmodel->find($id);
	$this->load->view('public/details.php',compact('article'));

}


}
?>