<?php defined('BASEPATH') or exit('No direct script access allowed');

class Usergroup_model extends CI_Model
{
  protected $table = 'm_users_group';
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
