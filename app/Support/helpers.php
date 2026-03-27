<?php

class View
{
    protected $view;
    protected $data;

    public function __construct($view, $data = [])
    {
        $this->view = $view;
        $this->data = $data;
    }

    public function render()
    {
        extract($this->data);
        $viewPath = __DIR__ . '/../../resources/views/' . str_replace('.', '/', $this->view) . '.php';
        
        if (!file_exists($viewPath)) {
            throw new \Exception("View not found: {$viewPath}");
        }

        ob_start();
        include $viewPath;
        return ob_get_clean();
    }

    public function __toString()
    {
        return $this->render();
    }
}

function view($view, $data = [])
{
    return new View($view, $data);
}

function collect($items)
{
    return new Collection($items);
}

class Collection
{
    protected $items;

    public function __construct($items)
    {
        $this->items = is_array($items) ? $items : [$items];
    }

    public function firstWhere($key, $value)
    {
        foreach ($this->items as $item) {
            if (isset($item[$key]) && $item[$key] === $value) {
                return $item;
            }
        }
        return null;
    }

    public function where($key, $value)
    {
        $results = [];
        foreach ($this->items as $item) {
            if (isset($item[$key]) && strpos($item[$key], $value) !== false) {
                $results[] = $item;
            }
        }
        return new self($results);
    }

    public function all()
    {
        return $this->items;
    }
}
