<?php defined('BASEPATH') or exit('No direct script access allowed');

class Menususersgroup_model extends CI_Model
{
  protected $table = 'c_menus_users_group';
  protected $column_order = array(null, 'name');
  protected $column_search = array('name');
  protected $order = array('name' => 'asc');
  protected $usergroup = "";

  public function get_all()
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $query = $this->db->get();

    return $query->result();
  }

  public function insert_data($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function get_data($field, $value)
  {
    $this->db->select([
      $this->table . '.*',
    ]);
    $this->db->from($this->table);
    $this->db->where($this->table . '.' . $field, $value);
    $data = $this->db->get();
    return $data->row();
  }

  public function get_data_multiple_condition($field, $value, $field2, $value2)
  {
    $this->db->select([
      $this->table . '.*',
    ]);
    $this->db->from($this->table);
    $this->db->where($this->table . '.' . $field, $value);
    $this->db->where($this->table . '.' . $field2, $value2);
    $data = $this->db->get();
    return $data->row();
  }

  public function get_all_data_group($field, $value)
  {
    $this->db->select('
      B.`name`,`url`,`position`,`icon`,`status`,`parent_id`, 
      A.`id`, `user_group_id`, `menu_id`
    ');
    $this->db->from($this->table . ' as A');
    $this->db->join('c_menus as B', 'B.`id` = A.`menu_id`', 'left');
    $this->db->where('A.' . $field, $value);
    $data = $this->db->get();
    return $data->result();
  }

  public function update_data($where, $data)
  {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }

  public function delete_data($where, $where2 = null)
  {
    $this->db->where($where);
    if ($where2) :
      $this->db->where($where2);
    endif;
    $this->db->delete($this->table);
    return $this->db->affected_rows();
  }

  public function count_all()
  {
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }
}
