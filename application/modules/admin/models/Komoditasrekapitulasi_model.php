<?php defined('BASEPATH') or exit('No direct script access allowed');

class Komoditasrekapitulasi_model extends CI_Model
{
  protected $table = 't_komoditas_rekapitulasi';
  protected $column_order = array(null, 'name');
  protected $column_search = array('name');
  protected $order = array('name' => 'asc');
  protected $usergroup = "";

  public function get_all($yearMonth = null)
  {
    $this->db->select('
      A.*, 
      B.`name as komoditas_name`, `unit as komoditas_unit`,
      C.`name as pasar_name`, `status as pasar_status`,
      D.`name as komoditas_type_name`,
      E.`name as komoditas_cluster_name`,
    ');
    $this->db->from($this->table . ' as A');
    $this->db->join('m_komoditas as B', 'A.`komoditas_id` = B.`id`', 'inner');
    $this->db->join('m_pasar as C', 'A.`pasar_id` = C.`id`', 'inner');
    $this->db->join('m_komoditas_type as D', 'B.`type_id` = D.`id`', 'inner');
    $this->db->join('m_komoditas_cluster as E', 'B.`cluster_id` = E.`id`', 'inner');
    if ($yearMonth) {
      $this->db->where("DATE_FORMAT(A.date, '%Y-%m') =", $yearMonth);
    }
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

  public function get_unique_data($field = null, $value = null, $field1 = null, $value1 = null, $field2 = null, $value2 = null, $field3 = null, $value3 = null)
  {
    $this->db->select([
      $this->table . '.*',
    ]);
    $this->db->from($this->table);
    if ($field && $value) {
      $this->db->where($this->table . '.' . $field, $value);
    }
    if ($field1 && $value1) {
      $this->db->where($this->table . '.' . $field1, $value1);
    }
    if ($field2 && $value2) {
      $this->db->where($this->table . '.' . $field2, $value2);
    }
    if ($field3 && $value3) {
      $this->db->where($this->table . '.' . $field3, $value3);
    }
    $data = $this->db->get();
    return $data->row();
  }

  public function get_all_data($field, $value)
  {
    $this->db->select([
      $this->table . '.*',
    ]);
    $this->db->from($this->table);
    $this->db->where($this->table . '.' . $field, $value);
    $data = $this->db->get();
    return $data->result();
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
