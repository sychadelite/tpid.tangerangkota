<?php defined('BASEPATH') or exit('No direct script access allowed');

class Menus_model extends CI_Model
{
  protected $table = 'c_menus';
  protected $column_order = array(null, 'name');
  protected $column_search = array('name');
  protected $order = array('name' => 'asc');
  protected $usergroup = "";

  public function get_all()
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->order_by('position', 'asc');
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

  public function get_group_menu($id = null)
  {
    $this->db->select('A.`id`,`name`,`url`,`position`,`icon`,`status`,`parent_id`, B.`menu_id`,`user_group_id`');
    $this->db->from($this->table . ' as A');
    $this->db->join('c_menus_users_group as B', 'A.`id` = B.`menu_id`', 'left');
    $this->db->where('A.`status`', 'active');
    if ($id != null) {
      $this->db->where('B.`user_group_id`', $id);
    }
    $this->db->order_by('A.`position` asc');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_all_group_menu($id = null)
  {
    $this->db->select('A.`id`,`name`,`url`,`position`,`icon`,`status`,`parent_id`, B.`menu_id`,`user_group_id`');
    $this->db->from($this->table . ' as A');
    $this->db->join('c_menus_users_group as B', 'A.`id` = B.`menu_id`', 'left');
    if ($id != null) {
      $this->db->where('B.`user_group_id`', $id);
    }
    $this->db->order_by('A.`position` asc');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function update_data($where, $data)
  {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }

  public function delete_data($where)
  {
    $this->db->where($where);
    $this->db->delete($this->table);
    return $this->db->affected_rows();
  }

  public function count_all()
  {
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }
}
