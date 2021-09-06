<?php
	class M_user extends CI_Model {

		function __construct() {
			parent::__construct();
			$this->load->database();
		}

		function get_list_user() {
			$sql = "SELECT * FROM user ORDER BY idUser DESC";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$result = $query->result_array();
				$query->free_result();
				return $result;
			} else {
				return array();
			}
		}

		function get_detail_user($params) {
			$sql = "SELECT * FROM user WHERE idUser = ?";
			$query = $this->db->query($sql,$params);
			if ($query->num_rows() > 0) {
				$result = $query->row_array();
				$query->free_result();
				return $result;
			} else {
				return array();
			}
		}

		function insert_user($data) {
			return $this->db->insert('user',$data);
		}

		function update_user($data,$where) {
			$this->db->where($where);
			return $this->db->update('user',$data);
		}

		function delete_user($where) {
			$this->db->where($where);
			return $this->db->delete('user');
		}
	}
?>