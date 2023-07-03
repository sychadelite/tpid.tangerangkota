<?php defined('BASEPATH') or exit('No direct script access allowed');

class Beritafiles_model extends CI_Model
{
  protected $table = 'm_berita_files';
  protected $column_order = array('id', 'berita_id', 'file_name', 'file_size', 'file_path', 'created_at', 'updated_at', 'deleted_at');
  protected $column_search = array('name');
  protected $order = array('name' => 'asc');
  protected $usergroup = "";

  public function get_all()
  {
    $this->db->select($this->column_order);
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
    $this->db->select($this->column_order);
    $this->db->from($this->table);
    $this->db->where($this->table . '.' . $field, $value);
    $data = $this->db->get();
    return $data->row();
  }

  public function get_all_data($field, $value, $filtered_in_field = null, $array_in_data = [], $filtered_not_in_field = null, $array_not_in_data = [])
  {
    $this->db->select($this->column_order);
    $this->db->from($this->table);
    $this->db->where($field, $value);
    if ($filtered_in_field && is_array($array_in_data) && !empty($array_in_data)) {
      $this->db->where_in($filtered_in_field, $array_in_data);
    }
    if ($filtered_not_in_field && is_array($array_not_in_data) && !empty($array_not_in_data)) {
      $this->db->where_not_in($filtered_not_in_field, $array_not_in_data);
    }
    $data = $this->db->get();
    return $data->result();
  }

  public function get_all_public_data($field = null, $value = null, $limit = null, $offset = null)
  {
    $this->db->select('A.`id`, `berita_id`, `file_path`, B.`category_id`, `slug`, `title`, `description`, `cover`');
    $this->db->from($this->table . ' as A');
    $this->db->join('m_berita as B', 'A.`berita_id` = B.`id`', 'inner');
    if ($field && $value) {
      $this->db->where('A.' . $field, $value);
    }
    $this->db->order_by('A.`created_at`', 'desc');
    if ($limit) {
      $this->db->limit($limit, $offset);
    }
    $data = $this->db->get();
    return $data->result();
  }

  public function update_data($where, $data)
  {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }

  public function delete_data($where, $id = null)
  {
    if ($id) {
      $this->db->where($this->table . '.' . 'berita_id', $id);
    }
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
