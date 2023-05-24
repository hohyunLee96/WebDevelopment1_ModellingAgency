<?php
class User implements JsonSerializable{

    private int $id;
    private string $name;
    private string $email;
    private string $hashedPassword;
    private string $types;
    private string $image;

    public function jsonSerialize() : mixed {
        return get_object_vars($this);
    }
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
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * @param string $email
     * @return self
     */
    public function setEmail(string $email): self {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getHashedPassword(): string {
        return $this->hashedPassword;
    }

    /**
     * @param string $hashedPassword
     * @return self
     */
    public function setHashedPassword(string $hashedPassword): self {
        $this->hashedPassword = $hashedPassword;
        return $this;
    }

    /**
     * @return string
     */
    public function getTypes(): string {
        return $this->types;
    }

    /**
     * @param string $types
     * @return self
     */
    public function setTypes(string $types): self {
        $this->types = $types;
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
