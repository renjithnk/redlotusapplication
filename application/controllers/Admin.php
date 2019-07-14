s<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('admin/Admin_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
        $this->load->library('image_lib');
    }

    private $upload_path = './assets/images/products/';
    
    public function admin_login()
    {
    	$exampleInputPassword1=$this->input->post('exampleInputPassword1');
		$exampleInputEmail1=$this->input->post('exampleInputEmail1');
		$result=$this->Admin_model->check_admin($exampleInputPassword1,$exampleInputEmail1);
		if($result==0)
		{
			$message= array(
    		'title' => 'invalid username or password',
    		'heading' => 'My Heading',
    		'message' => 'My Message');
    		$this->session->set_userdata('invalid_admin_login',$message);
    		echo "false";
		}
		else
		{
			$admin_id=$result[0]->admin_id;
			$this->session->set_userdata('admin_id',$admin_id);
			echo "true";
			//redirect(base_url('logged_in'));
		}
	}

	public function admin_view_orders()
	{
		$result['orders']=$this->Admin_model->fetch_all_orders();
		$this->load->view('includes/header-administrator');
		$this->load->view('admin/admin-view-orders',$result);
		$this->load->view('includes/footer-common');
	}
    
	public function dashboard()
	{
		$this->load->view('includes/header-administrator');
		$this->load->view('admin/admin-dashboard');
	}

	public function admin_add_product()
	{
		$result=$this->Admin_model->delete_old_images();
		if($result!=0)
		{
			foreach ($result as $value) {
			$image_name=$value->image;
			if ($image_name && file_exists($this->upload_path . "/" . $image_name)) {
				unlink($this->upload_path . "/" . $image_name);
				$this->Admin_model->remove_image($image_name);
			}
			}
		}
		$this->load->view('includes/header-administrator');
		$this->load->view('admin/admin-add-product');
	}

	public function admin_product_check()
	{
		$no=$this->input->post('content');
		$result=$this->Admin_model->check_article_no($no);
		echo $result;
	}

	public function insert_product()
	{
		$articleno=$this->input->post('articleno'); 
		$size=$this->input->post('size'); 
		$price=$this->input->post('price'); 
		$sku=$this->input->post('sku'); 
		$category=$this->input->post('category');
		$data_array=array('article_number'=>$articleno,'product_category'=>$category);
		$result=$this->Admin_model->inset_product_details($data_array,$size,$price,$sku,$category);
		if($result!=0)
		{
			$this->Admin_model->assign_image_product($result);
		}
		header('Location: ' . $_SERVER["HTTP_REFERER"] );
	}

	public function randomkey()
  	{
    	$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    	$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    	for ($i = 0; $i < 25; $i++)
    	{
      		$n = rand(0, $alphaLength);
      		$pass[] = $alphabet[$n];
    	}
    	$reference_code= implode($pass);
    	return $reference_code;
  	}

	public function images_upload()
	{
		$file_name=$_FILES['file']['name'];
		$file_type=$_FILES['file']['type'];
		$extension = substr($file_name, strpos($file_name, ".") + 1);    
		do
		{
			$image_name=$this->randomkey();
			$image_name=$image_name.".".$extension;
			$result=$this->Admin_model->check_filename($image_name);
		}while ($result!=0);
		if ( ! empty($_FILES)) 
		{
			$data_array=array('image'=>$image_name,'image_name'=>$file_name);
		}
			$news_image_id=$this->Admin_model->insert_image_data($data_array);
			$config["upload_path"]   = $this->upload_path;
			$config["allowed_types"] = "gif|jpg|png";
			$config['file_name']=$image_name;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload("file")) 
			{
				echo "failed to upload file(s)";
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			}
            else
            {
              $image_data = $this->upload->data();
              $data = $this->resize_news_image($image_data);
              echo $data;
            }
	}

	public function resize_news_image($image_data) 
	{
    	$is_file_error=FALSE;
    	$img = substr($image_data['full_path'], 51);
    	$config['image_library'] = 'gd2'; 
    	$config['source_image'] = $image_data['full_path'];
    	$config['new_image'] =$image_data['full_path'];
   	 	$config['maintain_ratio'] = false;
    	$config['width']= 500;
    	$config['height']= 500; 
    	$this->image_lib->initialize($config);
    	if(!$this->image_lib->resize())
    	{
      		$is_file_error = TRUE;
    	}
    	else
    	{
    		return 1;
    	}
	}

	public function images_remove()
	{
		echo $file = $this->input->post("file");
		$image_name=$this->Admin_model->fetch_image_name($file);
		if ($file && file_exists($this->upload_path . "/" . $image_name)) {
			unlink($this->upload_path . "/" . $image_name);
			$this->Admin_model->remove_image($image_name);
		}
	}

	public function admin_view_product()
	{
		$result['product']=$this->Admin_model->fetch_products();
		if($result!=0)
		{
			foreach ($result['product'] as $key => $value) {
				$product_id=$value->product_id;
				$disc=$this->Admin_model->fetch_product_disc($product_id);
				$result['product'][$key]->disc=$disc;	
				$image=$this->Admin_model->fetch_product_images($product_id);		
				$result['product'][$key]->image=$image;		
			}
		}
		$this->load->view('includes/header-administrator');
		$this->load->view('admin/admin-view-product',$result);
		$this->load->view('includes/footer-common');
	}

	public function admin_update_sock()
	{
		$hidden_sock=$this->input->post('hidden_sock');
		$new_sock=$this->input->post('new_sock');
		$desc_id=$this->input->post('desc_id');
		if($new_sock=="")
		{
			$update_stockng=$hidden_sock;
			$result=$this->Admin_model->update_stock($update_stockng,$desc_id);
			echo $update_stockng;
		}
		else
		{
			$update_stockng=$hidden_sock+$new_sock;
			$desc_id=$this->input->post('desc_id');
			$result=$this->Admin_model->update_stock($update_stockng,$desc_id);
			echo $update_stockng;
		}
		
	}

	public function particular()
	{
		$parameter=$this->uri->segment(2);
		$result['product']=$this->Admin_model->fetch_particuler_products($parameter);
		if($result['product']!="0")
		{
			foreach ($result['product'] as $key => $value) {
				$product_id=$value->product_id;
				$disc=$this->Admin_model->fetch_product_disc($product_id);
				$result['product'][$key]->disc=$disc;	
				$image=$this->Admin_model->fetch_product_images($product_id);		
				$result['product'][$key]->image=$image;		
			}
		}
		//$this->User_model->delete_all_uncarted_products();
		$this->load->view('includes/header-administrator');
		$this->load->view('admin/admin-view-product',$result);
		$this->load->view('includes/footer-common');
	}

	public function delete_product()
	{
		$product_id=$this->input->post('element');
		$result=$this->Admin_model->delete_product($product_id);
		echo $result;
	}
	
}
