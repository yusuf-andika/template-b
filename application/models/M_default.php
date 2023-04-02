<?php

class M_default extends CI_Model
{


    // Authentification
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    // Crud Modelling
    function input($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function getall($db)
    {
        return $this->db->get($db);
    }


    // Up Level
    function get_order($db,$field,$ascdesc)
    {
        $this->db->select('*');
        $this->db->from($db);
        $this->db->order_by($field, $ascdesc);
        return $this->db->get();
    }

    function limit($db,$limit)
    {
        $this->db->select('*');
        $this->db->from($db);
        $this->db->limit($limit);
        return $this->db->get();
    }

    function join($db,$dbjoin,$where)
    {
        $this->db->select('*');
        $this->db->from($db);
        $this->db->join($dbjoin, $where);
        return $this->db->get();
    }

    function join_where($db,$dbjoin,$on,$where)
    {
        $this->db->select('*');
        $this->db->from($db);
        $this->db->join($dbjoin, $on);
        $this->db->where($where);

        return $this->db->get();
    }
}