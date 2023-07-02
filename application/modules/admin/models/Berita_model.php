<?php defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
  protected $table = 'm_berita';
  protected $column_order = array(null, 'name');
  protected $column_search = array('name');
  protected $order = array('name' => 'asc');
  protected $usergroup = "";

  public function get_all()
  {
    $this->db->select('
      A.*,
      C.`username`, `fullname`, `email`, `C.status as user_status`, `image as user_image`,
      D.`name as category_name`, `type as category_type`, `D.description as category_description`,
      E.`name as user_group_name`
    ');
    $this->db->from($this->table . ' as A');
    $this->db->join('m_users as C', 'A.`user_id` = C.`id`', 'left');
    $this->db->join('m_category as D', 'A.`category_id` = D.`id`', 'left');
    $this->db->join('m_users_group as E', 'C.`user_group_id` = E.`id`', 'left');
    $query = $this->db->get();

    return $query->result();
  }

  public function get_files($field, $value)
  {
    $this->db->select('
      A.`id`, `title`,
      B.`file_name`, `file_size`, `file_path`, `file_data`
    ');
    $this->db->from($this->table . ' as A');
    $this->db->join('m_berita_files as B', 'A.`id` = B.`berita_id`', 'inner');
    $this->db->where('A.' . $field, $value);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      $results = $query->result();
      foreach ($results as &$row) {
        $row->file_data = $this->convertBlobToString($row->file_data);
      }
      return $results;
    } else {
      return [];
    }
  }

  public function insert_data($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function get_data($field, $value)
  {
    $this->db->select('A.*, B.`username`, `fullname`, `email`, C.`name as user_group_name`');
    $this->db->from($this->table . ' as A');
    $this->db->join('m_users as B', 'A.`user_id` = B.`id`', 'left');
    $this->db->join('m_users_group as C', 'B.`user_group_id` = C.`id`', 'left');
    $this->db->where('A.' . $field, $value);
    $data = $this->db->get();
    return $data->row();
  }

  public function get_unique_data($id, $title, $slug)
  {
    $this->db->select([
      $this->table . '.*',
    ]);
    $this->db->from($this->table);
    $this->db->where('id !=', $id)
      ->group_start()
      ->where('title', $title)
      ->or_where('slug', $slug)
      ->group_end();
    $data = $this->db->get();
    return $data->result();
  }

  public function get_all_data($field, $value)
  {
    $this->db->select([
      $this->table . '.*',
    ]);
    $this->db->from($this->table);
    $this->db->where($this->table . '.' . $field, $value);
    $this->db->order_by($this->table . '.created_at', 'desc');
    $data = $this->db->get();
    return $data->result();
  }

  public function get_latest_public_data($field = null, $value = null)
  {
    $this->db->select('A.*, B.`name as category_name`');
    $this->db->from($this->table . ' as A');
    $this->db->join('m_category as B', 'A.`category_id` = B.`id`', 'inner');
    if ($field && $value) {
      $this->db->where('A.' . $field, $value);
    }
    $this->db->where('A.status', 'active');
    $this->db->order_by('A.created_at', 'desc');
    $this->db->limit(1);

    $data = $this->db->get();
    return $data->row();
  }

  public function get_all_public_data($field = null, $value = null, $limit = null, $offset = null)
  {
    $this->db->select('A.*, B.`name as category_name`');
    $this->db->from($this->table . ' as A');
    $this->db->join('m_category as B', 'A.`category_id` = B.`id`', 'inner');
    if ($field && $value) {
      $this->db->where('A.' . $field, $value);
    }
    $this->db->where('A.status', 'active');
    $this->db->order_by('A.created_at', 'desc');
    if ($limit && $offset) {
      $this->db->limit($limit, $offset);
    }
    $data = $this->db->get();
    return $data->result();
  }

  public function get_all_public_data_by_year_month($field, $value, $yearMonth = null)
  {
    $this->db->select([
      $this->table . '.*',
    ]);
    $this->db->from($this->table);
    $this->db->where($this->table . '.' . $field, $value);
    if ($yearMonth) {
      $this->db->where("DATE_FORMAT(" . $this->table . ".created_at, '%Y-%m') =", $yearMonth);
    }
    $this->db->where($this->table . '.status', 'active');
    $this->db->order_by($this->table . '.created_at', 'desc');
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

  private function convertBlobToString($blobData)
  {
    if ($blobData === null) {
      return null;
    }
    return base64_encode($blobData);
  }
}
