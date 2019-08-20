<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_executive extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('admin/Admin_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
        $this->load->library('image_lib');
    }

	private $upload_path = PRODUCT_UPLOAD_PATH;

    public function index()
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
    	$this->load->view('includes/header-user-executive');
    	$this->load->view('executive/user-view-product',$result);
    	$this->load->view('includes/footer-common');
    }

    public function user_login()
    {
    	$this->load->view('includes/header-common');
    	$this->load->view('executive/user-executive-login');
    	$this->load->view('includes/footer-common');
    }

    public function user_login_check()
    {
    	$user_email=$this->input->post('user_email');
		$user_password=$this->input->post('user_password');
		$result=$this->User_model->check_user($user_email,$user_password);
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
			$ex_id=$result[0]->ex_id;
			$this->session->set_userdata('user_id',$ex_id);
			echo "true";
		}
	}


    public function add_to_cart()
    {
        $createdby  =   $this->session->userdata('user_id');
		$od= rtrim($this->input->post('order_details'), '|');
    	$product_id=$this->input->post('product_id');
		
		$od_1 = explode("|", $od);
		foreach($od_1 as $value) {
			$od_2 = explode(":", $value);
			$desc_id = $od_2[0];
			$product_quantity=$od_2[1];

			if($product_quantity > 0) {
				$array=array('product_disc_id'=>$desc_id,'product_id'=>$product_id,'product_quantity'=>$product_quantity,'executive_id'=>$createdby);
				$check_array=array('product_id'=>$product_id,'product_disc_id'=>$desc_id,'cart_status'=>"0",'executive_id'=>$createdby);
				$result=$this->User_model->insert_to_cart($array,$check_array,$product_quantity);
			}
		}
    	echo $result;
    }
    
	public function user_view_product()
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

	public function order_view()
	{
		$result['cart_items']=$this->User_model->select_cart_items();
		$this->load->view('includes/header-administrator');
		$this->load->view('executive/user-order-checkout',$result);
		$this->load->view('includes/footer-common');
	}

	public function delete_cart()
	{
		$cart_id=$this->input->post('cart_id');
		$result=$this->User_model->delete_cart($cart_id);
		echo $result;
	}

	public function place_order()
	{
		$name=$this->input->post('name');
		$gst=$this->input->post('gst');
		$address=$this->input->post('address');
		$result=$this->User_model->place_order($name,$gst,$address);
		echo $result;
	}

	public function user_order_view()
	{
		$result['orders']=$this->User_model->fetch_order();
		$this->load->view('includes/header-user-executive');
		$this->load->view('executive/user-view-orders',$result);
		$this->load->view('includes/footer-common');
	}

	public function user_categories()
	{
		$this->load->view('includes/header-user-executive');
		$this->load->view('executive/user-categories');
//		$this->load->view('includes/footer-common');
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
		$this->load->view('includes/header-user-executive');
		$this->load->view('executive/user-view-product',$result);
		$this->load->view('includes/footer-common');
	}
	
}
