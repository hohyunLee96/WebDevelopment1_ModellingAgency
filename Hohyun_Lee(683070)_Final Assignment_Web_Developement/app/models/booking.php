<?php

class Booking implements JsonSerializable
{

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }

    private int $booking_id;
    private string $client_name;
    private int $client_id;
    private string $model_name;
    private int $model_id;
    private string $booking_status;
    private string $booking_date;


    // Getters and setters generated using https://docs.devsense.com/en/vscode/editor/code-actions

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->booking_id;
    }

    /**
     * @param int $booking_id
     * @return self
     */
    public function setId(int $booking_id): self
    {
        $this->booking_id = $booking_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientName(): string {
        return $this->client_name;
    }

    /**
     * @param string $client_name
     * @return self
     */
    public function setClientName(string $client_name): self {
        $this->client_name = $client_name;
        return $this;
    }

    /**
     * @return int
     */
    public function getClient_Id(): int
    {
        return $this->client_id;
    }

    /**
     * @param int $client_id
     * @return self
     */
    public function setClient_Id(int $client_id): self
    {
        $this->client_id = $client_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getModelName(): string {
        return $this->model_name;
    }

    /**
     * @param string $model_name
     * @return self
     */
    public function setModelName(string $model_name): self {
        $this->model_name = $model_name;
        return $this;
    }

    /**
     * @return int
     */
    public function getModel_Id(): int
    {
        return $this->model_id;
    }

    /**
     * @param int $model_id
     * @return self
     */
    public function setModel_Id(int $model_id): self
    {
        $this->model_id = $model_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getBooking_Status(): string {
        return $this->booking_status;
    }

    /**
     * @param string $booking_status
     * @return self
     */
    public function setBooking_Status(string $booking_status): self {
        $this->booking_status = $booking_status;
        return $this;
    }

    /**
     * @return string
     */
    public function getBooking_Date(): string {
        return $this->booking_date;
    }

    /**
     * @param string $booking_date
     * @return self
     */
    public function setBooking_Date(string $booking_date): self {
        $this->booking_date = $booking_date;
        return $this;
    }
}

