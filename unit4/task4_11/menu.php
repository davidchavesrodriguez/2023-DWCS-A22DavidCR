<?php 
class Menu {
    private $type;
    private $options = [];

    public function __construct($type) {
        $this->type = $type;
    }

    public function addOption($title, $link, $backgroundColor) {
        $option = new Option($title, $link, $backgroundColor);
        $this->options[] = $option;
    }

    public function display() {
        echo '<div class="' . $this->type . '-menu">';
        foreach ($this->options as $option) {
            echo '<a href="' . $option->getLink() . '" style="background-color:' . $option->getBackgroundColor() . ';">' . $option->getTitle() . '</a>';
        }
        echo '</div>';
    }
}

class Option {
    private $title;
    private $link;
    private $backgroundColor;

    public function __construct($title, $link, $backgroundColor) {
        $this->title = $title;
        $this->link = $link;
        $this->backgroundColor = $backgroundColor;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getLink() {
        return $this->link;
    }

    public function getBackgroundColor() {
        return $this->backgroundColor;
    }
}
?>