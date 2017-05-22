<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralModel extends CI_Model {

	function getAll($table, $limit = NULL, $offset = NULL)
	{
		return $this->db->get($table, $limit, $offset);
	}

	function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function getJoin($table,$data) {
	    $this->db->from($table);
	    
	    foreach($data as $coll => $value){
	        $this->db->join($coll, $value);
	    }
	    
	    $query = $this->db->get();
	    
	    return $query;
	}

	function getWhere($table, $where)
	{
		$r = $this->db->get_where($table, $where);
		return $r;
	}

	function getKriteriaUnggul($id_jasa)
	{
		$q = "SELECT a.nilai as r_nilai, b.nama_kriteria,  max(a.nilai) as max FROM rank_perkriteria a, kriteria b WHERE ID_jasa = $id_jasa and a.ID_kriteria=b.ID_kriteria order by a.nilai desc";
		$r = $this->db->query($q);
		$r = $r->row();
		return $r->max;
	}

	function delete($table, $where)
	{
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}
		$this->db->delete($table);
		return $this->db->affected_rows();
	}

}

/* End of file generalModel.php */
/* Location: ./application/models/generalModel.php */