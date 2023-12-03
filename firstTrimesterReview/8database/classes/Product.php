<?php

class Product implements JsonSerializable
{
    public function __construct(
        private string $name,
        private string $description,
        private string $picture,
        private Category $category,
        private ?int $id
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;
        return $this;
    }

    public function setCategory(Category $category): self
    {
        $this->category = $category;
        return $this;
    }

    public function __toString(): string
    {
        return "Product [ID: {$this->id}, Name: {$this->name}, Description: {$this->description}, Picture: {$this->picture}, Category: {$this->category}]";
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'picture' => $this->picture,
            'category' => $this->category,
        ];
    }
}
