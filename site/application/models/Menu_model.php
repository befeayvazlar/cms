<?php

class Menu_model extends CI_Model
{

    public $tableName = "menus";

    public function __construct()
    {
        parent::__construct();

    }

    public function getMenu()
    {
        $parent = $this->db->order_by('menu_sequence', 'asc')
            ->get_where('menus', ['menu_parent_id' => null]);
        $menu = $parent->result();
        $i = 0;

        foreach ($menu as $mn) {
            $menu[$i]->child = $this->getChildMenu($mn->menu_id);
            $i++;
        }

        return $menu;
    }

    public function getChildMenu($menu_parent_id)
    {
        $child = $this->db->order_by('menu_sequence', 'asc')
            ->get_where('menus', ['menu_parent_id' => $menu_parent_id]);
        $menu = $child->result();
        $i = 0;

        foreach ($menu as $mn) {
            $menu[$i]->child = $this->getChildMenu($mn->menu_id);
            $i++;
        }

        return $menu;
    }

    public function get($where = array(), $order="menu_id DESC")
    {
        return $this->db->where($where)->order_by($order)->get("menus")->row();
    }

    public function get_all($where = array(), $order = "menu_id ASC")
    {
        return $this->db->where($where)->order_by($order)->get("menus")->result();
    }

    public function add($data = array())
    {
        return $this->db->insert("menus", $data);
    }

    public function delete($where = array())
    {
        return $this->db->where($where)->delete("menus");
    }

    public function updateMenu($where, $update_data)
    {
        $this->db->update("menus", $update_data, $where);
    }

}
