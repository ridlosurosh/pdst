<?php
class Mdivisi extends CI_Model {

	function _get_datatables_query($table, $tblJoin,$tableJoin,$column_search,$order,$tableWhere)
	{
		$this->db->from($table)->join($tblJoin,$tableJoin)->where($tableWhere, 'aktif');

		$i = 0;
	
		foreach ($column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($order))
		{
			$ordering = $order;
			$this->db->order_by(key($ordering), $ordering[key($ordering)]);
		}
	}

	function get_datatables($table, $tblJoin,$tableJoin,$column_search,$order,$tableWhere)
	{
		$this->_get_datatables_query($table, $tblJoin,$tableJoin,$column_search,$order,$tableWhere);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start'])->where($tableWhere, 'aktif');
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($table, $tblJoin,$tableJoin,$column_search,$order,$tableWhere)
	{
		$this->_get_datatables_query($table, $tblJoin,$tableJoin,$column_search,$order,$tableWhere);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($table, $tblJoin,$tableJoin,$column_search,$order)
	{
		$this->db->from($table, $tblJoin,$tableJoin,$column_search,$order);
		return $this->db->count_all_results();
	}

	public function ui_data_santri($cari, $dat)
    {

        $this->db->group_start();
        $this->db->like('nama', $cari, 'both');
        $this->db->or_like('niup', $cari, 'both');
        $this->db->group_end();
        // $this->db->where_not_in
        $this->db->where_not_in('id_person', $dat);
        $this->db->where('status', 'aktif');
        $this->db->order_by('nama', 'ASC');
        $this->db->from('tb_person');
        $query = $this->db->get();
        return $query;
    }

	public function simpan_data($table,$data)
	{
		return $this->db->insert($table, $data);
	}

	public function simpan_data_histori($dataHistori)
	{
		return $this->db->insert("tb_history_divisi", $dataHistori);
	}

	public function editDivisi($table, $id, $dataHistori)
	{
		return $this->db->update($table, $dataHistori, array('id_person' => $id));
	}

	public function editHistori($table, $id, $dataHistori)
	{
		return $this->db->update($table, $dataHistori, array('id_person' => $id));
	}

}