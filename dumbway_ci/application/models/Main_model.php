<?php

Class Main_model extends CI_Model
{
    
    private $table;
    private $pk;
    private $order_by;

    public function set_table($tbl)
    {
        $this->table = $tbl;
    }
    public function get_table()
    {
        return $this->table;
    }
    public function set_pk($primary_key)
    {
        $this->pk = $primary_key;
    }
    public function get_pk()
    {
        return $this->pk;
    }
    
    public function set_order_by($sort)
    {
        $this->order_by = $sort;
    }
    
    public function get_order_by()
    {
        return $this->order_by;
    }

    public function show_data($desc=false)
    {
        if($desc === FALSE)
        {
            return $this->db->get($this->table);
        }
        else if($desc === TRUE)
        {
            $this->db->select('*');
            $this->db->from($this->table);
            $this->db->order_by($this->order_by,'DESC');
            $query = $this->db->get();
            return $query;
        }
    }
    
    public function show_by_query($query)
    {
        return $this->db->query($query);
    }
    public function show_by_condition($where)
    {
        return $this->db->get_where($this->table,$where);
    }

    public function insert_data($data)
    {
        return $this->db->insert($this->table,$data);
    }
    public function update_data($data,$paramater)
    {
        $this->db->where($this->get_pk(),$paramater);
        $this->db->update($this->table,$data);
        return $this->db->affected_rows();
    }
    public function delete_data($parameter)
    {
        $this->db->where($this->get_pk(), $parameter);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }    
}