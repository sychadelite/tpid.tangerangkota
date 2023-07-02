<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  protected $table = 'm_users'; //nama tabel dari database
  protected $column_order = array(null, 'fullname', 'username', 'email', 'm_users_group.name'); //field yang ada di table post
  protected $column_search = array('fullname', 'username', 'email', 'm_users_group.name'); // field yang diizin untuk pencarian 
  protected $order = array('fullname' => 'asc'); // default order 
  protected $usergroup = "";

  public function get_all()
  {
    $this->db->select([
      $this->table . '.id',
      $this->table . '.user_group_id',
      $this->table . '.username',
      $this->table . '.fullname',
      $this->table . '.email',
      $this->table . '.status',
      $this->table . '.image',
      'm_users_group.name AS user_group_name'
    ]);
    $this->db->from($this->table);
    $this->db->join('m_users_group', 'm_users_group.id = ' . $this->table . '.user_group_id');
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
      'm_users_group.name AS user_group_name'
    ]);
    $this->db->from($this->table);
    $this->db->join('m_users_group', 'm_users_group.id = ' . $this->table . '.user_group_id');
    $this->db->where($this->table . '.' . $field, $value);
    // $this->db->where($this->table . '.' . 'status', 'active');
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
