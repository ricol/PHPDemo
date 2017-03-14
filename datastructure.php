<html>

    <head>
        <title>PHP Data Structure & Algorithm Demo</title>
    </head>

    <body>
        <?php
        require('common/header.php');

        class linked_list
        {

            private $head;

            public function add($data, $position)
            {
                
            }

            public function remove($index)
            {
                
            }

            public function getCount()
            {
                
            }

        }

        $aList = new linked_list();

        class ReadingList
        {

            protected $stack;
            protected $limit;

            public function __construct($limit = 10)
            {
                // initialize the stack
                $this->stack = array();
                // stack can only contain this many items
                $this->limit = $limit;
            }

            public function push($item)
            {
                // trap for stack overflow
                if (count($this->stack) < $this->limit)
                {
                    // prepend item to the start of the array
                    array_unshift($this->stack, $item);
                } else
                {
                    throw new RunTimeException('Stack is full!');
                }
            }

            public function pop()
            {
                if ($this->isEmpty())
                {
                    // trap for stack underflow
                    throw new RunTimeException('Stack is empty!');
                } else
                {
                    // pop item from the start of the array
                    return array_shift($this->stack);
                }
            }

            public function top()
            {
                return current($this->stack);
            }

            public function isEmpty()
            {
                return empty($this->stack);
            }

        }

        $myBooks = new ReadingList();

        $myBooks->push('A Dream of Spring');
        $myBooks->push('The Winds of Winter');
        $myBooks->push('A Dance with Dragons');
        $myBooks->push('A Feast for Crows');
        $myBooks->push('A Storm of Swords');
        $myBooks->push('A Clash of Kings');
        $myBooks->push('A Game of Thrones');

        echo $myBooks->pop() . '<br />'; // outputs 'A Game of Thrones'
        echo $myBooks->pop() . '<br />'; // outputs 'A Clash of Kings'
        echo $myBooks->pop() . '<br />'; // outputs 'A Storm of Swords'

        require('common/footer.php');
        ?>
    </body>
</html>