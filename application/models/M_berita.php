<?php
	class M_berita extends CI_Model {

		function __construct() {
			parent::__construct();
			$this->load->database();
		}

		function get_total_berita_display() {
			$sql = "SELECT count(*)'total' FROM berita";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$result = $query->row_array();
				$query->free_result();
				return $result['total'];
			} else {
				return 0;
			}
		}

		function get_list_berita_display($params) {
			$sql = "SELECT * FROM berita ORDER BY idBerita DESC LIMIT ?,?";
			$query = $this->db->query($sql,$params);
			if ($query->num_rows() > 0) {
				$result = $query->result_array();
				$query->free_result();
				return $result;
			} else {
				return array();
			}
		}

		function get_list_berita() {
			$sql = "SELECT * FROM berita ORDER BY idBerita DESC";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$result = $query->result_array();
				$query->free_result();
				return $result;
			} else {
				return array();
			}
		}

		function get_detail_berita($params) {
			$sql = "SELECT * FROM berita WHERE idBerita = ?";
			$query = $this->db->query($sql,$params);
			if ($query->num_rows() > 0) {
				$result = $query->row_array();
				$query->free_result();
				return $result;
			} else {
				return array();
			}
		}

		function insert_berita($data) {
			return $this->db->insert('berita',$data);
		}

		function update_berita($data,$where) {
			$this->db->where($where);
			return $this->db->update('berita',$data);
		}

		function delete_berita($where) {
			$this->db->where($where);
			return $this->db->delete('berita');
		}
	}
?>