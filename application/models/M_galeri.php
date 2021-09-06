<?php
	class M_galeri extends CI_Model {

		function __construct() {
			parent::__construct();
			$this->load->database();
		}

		function get_total_galeri_display() {
			$sql = "SELECT count(*)'total' FROM gallery";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$result = $query->row_array();
				$query->free_result();
				return $result['total'];
			} else {
				return 0;
			}
		}

		function get_list_galeri_display($params) {
			$sql = "SELECT * FROM gallery ORDER BY idGallery DESC LIMIT ?,?";
			$query = $this->db->query($sql,$params);
			if ($query->num_rows() > 0) {
				$result = $query->result_array();
				$query->free_result();
				return $result;
			} else {
				return array();
			}
		}

		function get_list_galeri() {
			$sql = "SELECT * FROM gallery ORDER BY idGallery DESC";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$result = $query->result_array();
				$query->free_result();
				return $result;
			} else {
				return array();
			}
		}

		function get_detail_galeri($params) {
			$sql = "SELECT * FROM gallery WHERE idGallery = ?";
			$query = $this->db->query($sql,$params);
			if ($query->num_rows() > 0) {
				$result = $query->row_array();
				$query->free_result();
				return $result;
			} else {
				return array();
			}
		}

		function insert_galeri($data) {
			return $this->db->insert('gallery',$data);
		}

		function update_galeri($data,$where) {
			$this->db->where($where);
			return $this->db->update('gallery',$data);
		}

		function delete_galeri($where) {
			$this->db->where($where);
			return $this->db->delete('gallery');
		}
	}
?>