<?php
class Model implements JsonSerializable {

    public function jsonSerialize() : mixed {
        return get_object_vars($this);
    }
    private int $id;
    private string $name;
    private int $age;
    private string $type;
    private string $birthDate;
    private string $image;

    // Getters and setters generated using https://docs.devsense.com/en/vscode/editor/code-actions

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getAge(): int {
        return $this->age;
    }

    /**
     * @param int $age
     * @return self
     */
    public function setAge(int $age): self {
        $this->age = $age;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getBirthDate(): string {
        return $this->birthDate;
    }

    /**
     * @param string $birthDate
     * @return self
     */
    public function setBirthDate(string $birthDate): self {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * @param string $image
     * @return self
     */
    public function setImage(string $image): self {
        $this->image = $image;
        return $this;
    }
}
