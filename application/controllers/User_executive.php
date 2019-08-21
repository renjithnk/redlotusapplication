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
		$this->load->library('pagination');
		$this->load->helper('url');
    }

	private $upload_path = PRODUCT_UPLOAD_PATH;

    public function index()
    {
		$data = array();

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
		$cart_total = $this->User_model->find_cart_total();
		$data['cart_total'] = $cart_total;

    	$this->load->view('includes/header-user-executive', $data);
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


		$config['base_url'] = base_url() . "user-view-orders"; 
		$config['total_rows'] = $this->User_model->get_total_orders();
		$config['per_page'] = ROWS_PER_PAGE;
//		$config['page_query_string'] = TRUE;
		$config['enable_query_strings'] = TRUE;
		$config['reuse_query_string'] = TRUE;
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

		$this->pagination->initialize($config);		
	
		$result['orders']=$this->User_model->fetch_order($config["per_page"], $page);
        $result["links"] = $this->pagination->create_links();

		$cart_total = $this->User_model->find_cart_total();
		$data['cart_total'] = $cart_total;

    	$this->load->view('includes/header-user-executive', $data);
		$this->load->view('executive/user-view-orders',$result);
		$this->load->view('includes/footer-common');
	}

	public function user_categories()
	{
		$cart_total = $this->User_model->find_cart_total();
		$data['cart_total'] = $cart_total;

    	$this->load->view('includes/header-user-executive', $data);
		$this->load->view('executive/user-categories');
		$this->load->view('includes/footer-common');
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
		$cart_total = $this->User_model->find_cart_total();
		$data['cart_total'] = $cart_total;

    	$this->load->view('includes/header-user-executive', $data);
		$this->load->view('executive/user-view-product',$result);
		$this->load->view('includes/footer-common');
	}

	public function clear_orders()
	{
		$this->User_model->delete_all_uncarted_products();
		echo 1;
	}
	
}
