<?php
	class M_kegiatan extends CI_Model {

		function __construct() {
			parent::__construct();
			$this->load->database();
		}

		function get_total_kegiatan_display() {
			$sql = "SELECT count(*)'total' FROM kegiatan";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$result = $query->row_array();
				$query->free_result();
				return $result['total'];
			} else {
				return 0;
			}
		}

		function get_list_kegiatan_display($params) {
			$sql = "SELECT * FROM kegiatan ORDER BY idKegiatan DESC LIMIT ?,?";
			$query = $this->db->query($sql,$params);
			if ($query->num_rows() > 0) {
				$result = $query->result_array();
				$query->free_result();
				return $result;
			} else {
				return array();
			}
		}

		function get_list_kegiatan($params = "") {
			if ($params) {
				$sql = "SELECT * FROM kegiatan";
				if ($params[0]!='%') $sql.= " WHERE YEAR(tanggal) = ?";
				else { $sql.= " WHERE YEAR(tanggal) LIKE '%'"; }
				$query = $this->db->query($sql,$params);
			} else {
				$sql = "SELECT * FROM kegiatan ORDER BY idKegiatan DESC";
				$query = $this->db->query($sql);
			}
			if ($query->num_rows() > 0) {
				$result = $query->result_array();
				$query->free_result();
				return $result;
			} else {
				return array();
			}
		}

		function get_detail_kegiatan($params) {
			$sql = "SELECT * FROM kegiatan WHERE idKegiatan = ?";
			$query = $this->db->query($sql,$params);
			if ($query->num_rows() > 0) {
				$result = $query->row_array();
				$query->free_result();
				return $result;
			} else {
				return array();
			}
		}

		function get_data_peta($tahun) {
			$data_kegiatan = $this->get_list_kegiatan(array($tahun));
			$temp = array();
			if ($data_kegiatan) {
				foreach ($data_kegiatan as $key => $value) {
					$temp[$key][] = $value['nama'];
					$temp[$key][] = $value['lat'];
					$temp[$key][] = $value['lng'];
					// info window
					$info = '<div class="peta-info">
								<img src="'.base_url('uploads/media/'.$value['foto']).'" class="img-fluid">
								<p class="m-0 my-2"><b>'.$value['nama'].'</b></p>
								<p class="m-0"><i class="fa fa-calendar-alt fa-fw"></i> '.idDate($value['tanggal']).'</p>
								<p class="m-0"><i class="fa fa-map-marker-alt fa-fw"></i> '.$value['alamat'].'</p>
							</div>';
					$temp[$key][] = $info;
				}
			}
			return $temp;
		}

		function get_tahun_kegiatan() {
			$sql = "SELECT YEAR(tanggal)'tahun' FROM kegiatan GROUP BY YEAR(tanggal) ORDER BY YEAR(tanggal) DESC";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$result = $query->result_array();
				$query->free_result();
				return $result;
			} else {
				return array();
			}
		}

		function insert_kegiatan($data) {
			return $this->db->insert('kegiatan',$data);
		}

		function update_kegiatan($data,$where) {
			$this->db->where($where);
			return $this->db->update('kegiatan',$data);
		}

		function delete_kegiatan($where) {
			$this->db->where($where);
			return $this->db->delete('kegiatan');
		}
	}
?>