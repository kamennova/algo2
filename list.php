<?php

class Elem
{
    public $data;
    public $next;
    public $prev;
}

class ListC
{
    public $front;
    public $back;

    function __construct()
    {
        $this->front = null;
        $this->back = null;
    }

    function push($data)
    {
        $elem = new Elem;
        $elem->data = $data;
        $elem->next = null;
        $elem->prev = $this->front;

        ($this->front)->next = $elem;
        $this->front = $elem;

        if (!$this->back) {
            $this->back = $this->front;
        }
    }

    function fill($num)
    {
        $data = rand(1, 50);
        for ($i = 0; $i < $num; $i++) {
            $data += 2;
            $this->push($data);
        }
    }

    function output()
    {
        $curr = $this->back;
        while ($curr) {
            echo $curr->data . ' ';
            $curr = $curr->next;
        }
        echo "\n";
    }

    function get_length()
    {
        $length = 0;
        $curr = $this->front;
        while ($curr) {
            $length++;
            $curr = $curr->prev;
        }

        return $length;
    }

    function get_elem_data($index)
    {
        $curr = $this->back;
        for ($i = 0; $i < $index; $i++) {
            $curr = $curr->next;
        }

        return $curr->data;
    }
}