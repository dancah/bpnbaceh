<?php
	class M_auth extends CI_Model {

		function __construct() {
			parent::__construct();
			$this->load->database();
		}

		function get_detail_user($params) {
			$sql = "SELECT * FROM user WHERE username = ? AND password = ?";
			$query = $this->db->query($sql,$params);
			if ($query->num_rows() > 0) {
				$result = $query->row_array();
				$query->free_result();
				return $result;
			} else {
				return array();
			}
		}

		function get_detail_user_by_id($params) {
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

		function update_user($data,$where) {
			$this->db->where($where);
			return $this->db->update('user',$data);
		}
	}
?>