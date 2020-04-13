<?php
class Node
{
    //wiki: 单向链表，它包含两个域，一个信息域和一个指针域。这个链接指向列表中的下一个节点，而最后一个节点则指向一个空值。
    /**
     * 数据
     * @var T
     */
    public $data;

    /**
     * 下一个节点的指针
     * @var ptr
     */
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class singleLinkList
{
    /**
     * 链表头结点
     * @var Node
     */
    public $head;

    /**
     * 链表大小
     * @var int
     */
    private $size = 0;

    public function __construct()
    {
        $this->head = new Node(null);
    }

    public function getLength()
    {
        return $this->size;
    }

    /**
     * 添加节点
     * @param Node $node
     * @return void
     */
    public function add(Node $node)
    {
        $cur = $this->head;
        while ($cur->next !== null) {
            $cur = $cur->next;
        }
        $cur->next = $node;
        return ++$this->size;
    }

    /**
     * 打印节点
     * @return void
     */
    public function showNode()
    {
        $cur = $this->head;
        $i = 0;
        while ($cur->next !== null) {
            $cur = $cur->next;
            echo 'index: ' . ++$i . '  data: ' . $cur->data . PHP_EOL;
        }
    }

    /**
     * 节点是否存在
     * @param int $index
     * @return bool true 存在, false 不存在
     */
    public function isNodeExist(int $index)
    {
        return ($index > 1 && ($index < ($this->size + 1)));
    }

    /**
     * 搜索节点
     * @param int $index
     * @return void
     */
    public function searchNodeByIndex(int $index)
    {
        if (!$this->isNodeExist($index)) {
            throw new Exception('节点不存在');
        }
        $cur = $this->head;
        $tmp_index = 1;
        do {
            if ($index === $tmp_index++) {
                return $cur->next;
            }
        } while (($cur->next !== null) && ($cur = $cur->next));
    }

    /**
     * 在指定位置插入节点
     * @param int $index
     * @param Node $node
     * @return void
     */
    public function insertNodeByIndex(int $index, Node $node)
    {
        if (!$this->isNodeExist($index)) {
            throw new Exception('待插入的节点位置超出链表长度');
        }
        $cur = $this->head;
        $temp_index = 1;
        do {
            if ($index === $temp_index++) {
                $node->next = $cur->next;
                $cur->next = $node;
                break;
            }
        } while (($cur->next !== null) && ($cur = $cur->next));
        return ++$this->size;
    }

    /**
     * 删除指定节点
     * @param int $index
     * @return void
     */
    public function deleteNodeByIndex(int $index)
    {
        if (!$this->isNodeExist($index)) {
            throw new Exception('节点不存在');
        }
        $cur = $this->head;
        $temp_index = 1;
        do {
            if ($index == $temp_index++) {
                $cur->next = $cur->next->next;
                break;
            }
        } while (($cur->next !== null) && ($cur = $cur->next));
        return --$this->size;
    }
}

$list = new singleLinkList();
$list->add(new Node(100));
$list->add(new Node(200));
$list->add(new Node(300));

$list->showNode();

$list->deleteNodeByIndex(2);

$list->insertNodeByIndex(2, new Node(400));
$list->insertNodeByIndex(2, new Node(500));

$list->showNode();
