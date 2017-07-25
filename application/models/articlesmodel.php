<?php
class Articlesmodel extends CI_Model{


 public function articles_list($limit,$offset)
 {		$user_id = $this->session->userdata('user_id');
 		$query=$this->db
 							->select('title')
 							->select('id')
 							->from('articles')
 							->where('user_id',$user_id)
 							->limit($limit,$offset)
 							->get();
 		return $query->result();
 }


 public function all_articles_list($limit,$offset)
 {
 		$query=$this->db
 							->select('title')
 							->select('id')
 							->from('articles')
 							->limit($limit,$offset)
 							->get();
 		return $query->result();
}


 public function all_num_rows()
 {
 	
 		$query=$this->db
 							->select('title')
 							->select('id')
 							->from('articles')
 							->get();
 		return $query->num_rows();
 }


 public function num_rows()
 {
 	$user_id = $this->session->userdata('user_id');
 		$query=$this->db
 							->select('title')
 							->select('id')
 							->from('articles')
 							->where('user_id',$user_id)
 							->get();
 		return $query->num_rows();
 }


 public function add_article($arr)
 {
   return $this->db->insert('articles',$arr);
 }



 public function find_article($article_id)
 {
 	 $q=$this->db->select(['title','id','body'])
 			->where('id',$article_id)
 			->get('articles');
return $q->row();
 }

 public function update_article($article_id, $articles)
 {
 	return $this->db->where('id',$article_id)
 						->update('articles',$articles);
 }

 public function delete_article($id)
 {
 	return $this->db->delete('articles',['id'=>$id]);
 }

 public function search_articles($query)
 {
 	$q = $this->db->from('articles')
 				->like('title',$query)
 				->get();
 	return $q->result();
 }

 public function find($id)
 {
 	$q =$this->db->from('articles')
 				->where(['id'=>$id])
 				->get();
 	if($q->num_rows())
 		return $q->row();
 	return False;
 }

}