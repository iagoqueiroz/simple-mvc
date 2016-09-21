<?php
namespace App\Core;

class QueryBuilder
{
    private $select   = null;
    private $from     = null;
    private $where    = null;
    private $join     = [];
    private $order    = null;

    public function select()
    {
        $selects = func_get_args();

        if(count($selects) > 0){
            $this->select = implode(', ', $selects);
        }

        return $this;
    }

    public function from($from)
    {
        $this->from = $from;

        return $this;
    }

    public function where($where)
    {
        $this->where = $where;

        return $this;
    }

    public function join($table, $join)
    {
        if(func_num_args() != 2){
            trigger_error('O método join precisa de dois parâmetros');
        }

        $this->join[$table] = $join;

        return $this;
    }

    public function order($field, $order)
    {
        $this->order = $field . ' ' . $order;

        return $this;
    }

    protected function build()
    {
        $query  = 'SELECT ';
        $query .= empty($this->select) ? '*' : $this->select;
        $query .= ' FROM ' . (is_null($this->from) ? $this->table : $this->from);

        if(!is_null($this->join)){
            foreach($this->join as $table => $join){
                $query .= ' INNER JOIN ' . $table . ' ON ' . $join;
            }
        }
        if(!is_null($this->where)){
            $query .= ' WHERE ' . $this->where;
        }
        if(!is_null($this->order)){
            $query .= ' ORDER BY ' . $this->order;
        }

        return $query;
    }
}