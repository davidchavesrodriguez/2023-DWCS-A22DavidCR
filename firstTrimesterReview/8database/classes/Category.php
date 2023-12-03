<?php

class Category implements JsonSerializable
{
    public function __construct(private int $id, private string $name = "undefined")
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function __toString()
    {
        return "Category: {$this->name} <br> Category ID: {$this->id} ";
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
