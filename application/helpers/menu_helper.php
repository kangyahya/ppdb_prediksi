<?php
if (!function_exists('active_link')) {
    function active_menu($controller)
    {
        $CI = get_instance();
        $class = $CI->router->fetch_class();
        return ($class == $controller) ? 'active' : '';
    }
}

if ( ! function_exists('getData')) {
  function getData($tableName, $columns = '*', $where = [])
  {
      $ci =& get_instance();
      $sql = "SELECT $columns FROM $tableName";

      if (count($where) !== 0) {
          $key = array_keys($where)[0];
          $val = array_values($where)[0];
          $sql .= " WHERE $key = '$val'";
      }

      return $ci->db->query($sql)->result();
  }
}