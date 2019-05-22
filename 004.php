<?php
/**
 * myArray class
 */
class myArray
{
    //数据
    private $data;
    //容量
    private $capacity;
    //长度
    private $length;

    /**
     * myArray constructor
     * @param integer $capacity
     */
    public function __construct(int $capacity)
    {
        $capacity = $capacity;
        if ($capacity <= 0) {
            return null;
        }
        $this->data = [];
        $this->capacity = $capacity;
        $this->length = 0;
    }

    /**
     * 数组是否已满
     * @return bool
     */
    public function isArrayFull(): bool
    {
        if ($this->length == $this->capacity) {
            return true;
        }
        return false;
    }

    /**
     * 索引index是否超出数组范围
     *
     * @param integer $index
     * @return bool
     */
    private function isOutOfRange(int $index): bool
    {
        if ($this->capacity < $index) {
            return true;
        }
        return false;
    }
    /**
     * 在索引index位置插入值value，返回错误码，0为成功
     * @param integer $index
     * @param [type] $value
     * @return integer
     */
    public function insert(int $index, int $value): int
    {
        if ($index < 0) {
            return 1;
        }
        if ($this->isArrayFull()) {
            return 2;
        }
        if ($this->isOutOfRange($index)) {
            return 3;
        }

        for ($i = $this->capacity; $i >= $index; $i--) {
            $this->data[$i + 1] = $this->data[$i] ?? null;
        }
        $this->data[$index] = $value;
        $this->length++;
        return 0;
    }

    /**
     * 打印数组
     * @return void
     */
    public function printData()
    {
        var_dump($this->data);
    }
}

$my_array = new myArray(10);
$my_array->insert(1, 100);
$my_array->insert(8, 200);
$my_array->printData();
