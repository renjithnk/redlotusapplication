<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {


public function check_admin($exampleInputPassword1,$exampleInputEmail1)
  {
    $where='(email="'.$exampleInputEmail1.'" and password="'.$exampleInputPassword1.'")';
    $this->db->select('admin_id')->from('admin')->where($where)->limit(1);
    $query=$this->db->get();
    if($query->num_rows() > 0)
    {
      $result=$query->result();
      return $result;
    }else{
      return 0;
    }
  }

  public function check_filename($image_name)
  {
    $where='(image="'.$image_name.'")';
    $this->db->select('image')->from('product_image')->where($where);
    $query=$this->db->get();
    if($query->num_rows() > 0)
    {
      return 1;
    }else{
      return 0;
    }
  }

  public function delete_old_images()
  {
    $where='(product_id=" ")';
    $this->db->select('image')->from('product_image')->where($where);
    $query=$this->db->get();
    //echo $this->db->last_query();
    if($query->num_rows() > 0)
    {
      $result=$query->result();
      return $result;
    }else{
      return 0;
    }
  }

  public function insert_image_data($data_array)
  {
    if($this->db->insert('product_image', $data_array))
      {
        $news_id = $this->db->insert_id();
        return $news_id;
      }else{
        $insert_status= "failed";
        return $insert_status;
      }
  }

  public function fetch_image_name($file)
  {
    $where='(image_name LIKE "'.$file.'%" or `image` LIKE"'.$file.'%")';
    $this->db->select('image')->from('product_image')->where($where);
    $query=$this->db->get();
    if($query->num_rows() > 0)
    {
      $result=$query->result();
      $image=$result[0]->image;
      return $image;
    }else{
      return 0;
    }
  }

    public function remove_image($without_extension)
  {
    $where='(image_name LIKE "'.$without_extension.'%" or `image` LIKE"'.$without_extension.'%")';
    $this->db->where($where);
    $this->db->delete("product_image");
    if ($this->db->affected_rows() > 0)
    {
      return 1;
    } 
    else
    {
      return 0;
    }
  }
  public function check_article_no($no)
  {
    $where='(article_number="'.$no.'")';
    $this->db->select('article_number')->from('product')->where($where)->limit(1);
    $query=$this->db->get();
    if($query->num_rows() > 0)
    {
      return 1;
    }else{
      return 0;
    }
  }

  public function inset_product_details($data_array,$size,$price,$sku)
  {
    $query = $this->db->get_where('product', $data_array);
    $count = $query->num_rows();
    if($count)
    {
      $this->db->select('product_id')->from('product')->where($data_array);
      $query=$this->db->get();
      $result=$query->result();
      $product_id=$result[0]->product_id;
      $desc_array=array('product_id'=>$product_id,'size'=>$size,'price'=>$price,'sku'=>$sku);
      if($this->db->insert('product_desc', $desc_array))
      {
        return $product_id;
      }else{
        return 0;
      }
    }
    else
    {
      if($this->db->insert('product', $data_array))
      {
        $product_id=$this->db->insert_id();
        $desc_array=array('product_id'=>$product_id,'size'=>$size,'price'=>$price,'sku'=>$sku);
        if($this->db->insert('product_desc', $desc_array))
        {
          return $product_id;
        }else{
          return 0;
        }
      }else{
        //echo $this->db->last_query();
        return 0;
      }
    }
  }

  public function assign_image_product($result)
  {
    $array=array('product_id'=>$result);
    $where='(product_id=" " )';
    $this->db->where($where);
    if($this->db->update('product_image',$array))
    {
      return 1;
    }else{
      return 0;
    }
  }

  public function get_admin($admin_id)
  {
    $where='(admin_id="'.$admin_id.'")';
    $this->db->select('*')->from('admin')->where($where)->limit(1);
    $query=$this->db->get();
    if($query->num_rows() > 0)
    {
      $result=$query->result();
      return $result;
    }else{
      return 0;
    }
  }

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
}