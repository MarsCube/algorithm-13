<?php
class Stack
{
    /**
     * 栈数据
     *
     * @var array
     */
    private $stack;
    /**
     * 栈的长度
     *
     * @var integer 
     */
    private $size;

    public function __construct()
    {
        $this->stack = [];
        $this->size = 0;
    }
    /**
     * 压栈操作
     *
     * @param mixed $data 压栈的数据
     * @return object 返回对象本身
     */
    public function push($data)
    {
        $this->stack[$this->size++] = $data;
        return $this;
    }

    /**
     * 出栈操作
     *
     * @return mixed 空栈返回false，否则返回栈顶元素
     */
    public function pop()
    {
        if (!$this->isEmpty()) {
            $top = array_splice($this->stack, --$this->size, 1);
            return $top[0];
        }
        return false;
    }

    /**
     * 获取栈
     *
     * @return array 返回栈
     */
    public function getStack()
    {
        return $this->stack;
    }

    /**
     * 获取栈顶元素
     *
     * @return mixed 空栈返回false，否则返回栈顶元素
     */
    public function getTop()
    {
        if (!$this->isEmpty()) {
            return $this->stack[$this->size -1];
        }
        return false;
    }
    /**
     * 获取栈的长度
     *
     * @return integer 返回栈的长度
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * 检测栈是否为空
     *
     * @return boolean true-空栈 false-非空栈
     */
    public function isEmpty()
    {
        return 0 == $this->size;
    }
}

$stack = new Stack();
$stack->push(1)->push('han');
var_dump($stack);