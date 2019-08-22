<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Executive_model extends CI_Model {


  public function fetch_products()
  {
    $this->db->select('product_id,article_number ')->from('product');
    $query=$this->db->get();
    if($query->num_rows() > 0)
    {
      $result=$query->result();
      return $result;
    }else{
      return 0;
    }
  }

  public function check_executive($user_email,$user_password)
  {
    $where='(ex_email="'.$user_email.'" and ex_password="'.$user_password.'")';
    $this->db->select('ex_id')->from('executives')->where($where)->limit(1);
    $query=$this->db->get();

    if($query->num_rows() > 0)
    {
      $result=$query->result();
      return $result;
    }else{
      return 0;
    }
  }

  public function fetch_product_disc($product_id)
  {
    $where='(product_id="'.$product_id.'")';
    $this->db->select('description_id,product_id,size,price,sku')->from('product_desc')->where($where);
    $query=$this->db->get();
    if($query->num_rows() > 0)
    {
      $result=$query->result();
      return $result;
    }else{
      return 0;
    }
  }

  public function delete_all_uncarted_products()
  {

    $createdby  =   $this->session->userdata('executive_id');    

    $this->db->where('executive_id',$createdby);
    $this->db->where('cart_status',"0");
    $this->db->delete("cart_order");
    if ($this->db->affected_rows() > 0)
    {
      return 1;
    } 
    else
    {
      return 0;
    }
  }

  public function select_cart_items()
  {
    $createdby  =   $this->session->userdata('executive_id');    

    $where='(executive_id=' . $createdby . ' AND cart_status="0")';
    $this->db->select('cart_id,article_number,size,price,product_quantity')->from('cart_order co')->join('product p','co.product_id=p.product_id','left')->join('product_desc pd','co.product_disc_id=pd.description_id','left')->where($where);
    $query=$this->db->get();
    if($query->num_rows() > 0)
    {
      $result=$query->result();
      return $result;
    }else{
      return 0;
    }
  }

  public function get_total_orders()
  {

      $createdby  =   $this->session->userdata('executive_id');    
      $where='(co.executive_id=' . $createdby .')';

      $this->db->select('or.order_id')->from('order or')->join('cart_order co','or.cart_id=co.cart_id','left')->join('product_desc pd','co.product_disc_id=pd.description_id','left')->join('product p','co.product_id=p.product_id','left')->where($where);
      $query=$this->db->get();
      return $query->num_rows();
  }

  public function fetch_order($limit, $start)
  {
    $createdby  =   $this->session->userdata('executive_id');    
    $where='(co.executive_id=' . $createdby . ' )';

    $this->db->select('or.cart_id,name,address,product_quantity,size,price,article_number')->from('order or')->join('cart_order co','or.cart_id=co.cart_id','left')->join('product_desc pd','co.product_disc_id=pd.description_id','left')->join('product p','co.product_id=p.product_id','left')->where($where)->limit($limit, $start)->order_by('order_id','desc');
    $query=$this->db->get();
//      echo $this->db->last_query(); die;      
    if($query->num_rows() > 0)
    {
      $result=$query->result();
      return $result;
    }else{
      return 0;
    }
  }

  public function fetch_product_images($product_id)
  {
    $where='(product_id="'.$product_id.'")';
    $this->db->select('image')->from('product_image')->where($where);
    $query=$this->db->get();
    if($query->num_rows() > 0)
    {
      $result=$query->result();
      return $result;
    }else{
      return 0;
    }
  }

  public function insert_to_cart($array,$check_array,$product_quantity)
  {
    $query = $this->db->get_where('cart_order', $check_array);
  //  print_r($this->db->last_query()); die;
    $count = $query->num_rows();
    if($count)
    {
      $this->db->set('product_quantity', $product_quantity); 
      $this->db->where($check_array); //which row want to upgrade  
      if($this->db->update('cart_order'))
      {
        $result=$this->find_cart_total();
        return $result;
      }else{
        return 0;
      }  
    }
    else
    {
      if($this->db->insert('cart_order', $array))
      {
        $result=$this->find_cart_total();
        return $result;
      }else{
        //echo $this->db->last_query();
        return 0;
      }
    }
  }

  public function find_cart_total()
  {
    $createdby  =   $this->session->userdata('executive_id');

    $this->db->where('executive_id',$createdby);
    $this->db->where('cart_status',"0");
    $this->db->select('SUM(product_quantity) as product_quantity')->from('cart_order');
    $query=$this->db->get();
    if($query->num_rows() > 0)
    {
      $result=$query->result();
      $product_quantity=$result[0]->product_quantity;

      if(is_null($product_quantity))
        return 0;
      else 
        return $product_quantity;
    }else{
      return 0;
  }
}

  public function delete_cart($cart_id)
  {
    $this->db->where('cart_id',$cart_id);
    $this->db->delete("cart_order");
    if ($this->db->affected_rows() > 0)
    {
      return 1;
    } 
    else
    {
      return 0;
    }
  }

  public function place_order($name,$gst,$address)
  {
    $createdby  =   $this->session->userdata('executive_id');

    $this->db->where('executive_id',$createdby);
    $this->db->where('cart_status',"0");
    $this->db->select('cart_id')->from('cart_order');
    $query=$this->db->get();
    if($query->num_rows() > 0)
    {
      $result=$query->result();
      foreach ($result as $key => $value) {
        $cart_id=$value->cart_id;
        $array=array('name'=>$name,'gst'=>$gst,'address'=>$address,'cart_id'=>$cart_id,'executive_id'=>$createdby);
        $insert_status=$this->place_order_confirm($array);
        if($insert_status==1)
        {
          $result_update_cart=$this->update_cart($cart_id);
        }
      }
      return $result_update_cart;
    }else{
      return 0;
  }
  }

  public function place_order_confirm($array)
  {
    if($this->db->insert('order', $array))
      {
        return 1;
      }else{
        //echo $this->db->last_query();
        return 0;
      }
  }

  public function update_cart($cart_id)
  {
    $this->db->set('cart_status',"1"); 
    $this->db->where('cart_id',$cart_id); //which row want to upgrade  
    if($this->db->update('cart_order'))
    {
      $this->db->select('product_quantity,product_disc_id')->from('cart_order')->where('cart_id',$cart_id);
      $query=$this->db->get();
      if($query->num_rows() > 0)
      {
        $result=$query->result();
        foreach ($result as $key => $value) {
          $product_quantity=$value->product_quantity;
          $product_disc_id=$value->product_disc_id;
          $this->db->set('sku', '`sku`-'.$product_quantity.'', FALSE);
          $this->db->where('description_id',$product_disc_id); 
          if($this->db->update('product_desc'))
          {
            return 1;
          }else{
            return 0;
          }
        }
      }
    }else{
      return 0;
    }  
  }
}