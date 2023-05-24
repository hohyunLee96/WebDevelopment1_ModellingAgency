<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/model.php';
require __DIR__ . '/../models/booking.php';


class ModelRepository extends Repository
{

    function confirmBooking($selected_id)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE booking SET booking_status = :booking_status WHERE id = :id");

            $stmt->bindValue(':booking_status', "booking confirmed");
            $stmt->bindValue(':id', $selected_id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function editModel($selected_id, $editName, $editPhoto)
    {
        try {
            $stmt = $this->connection->prepare("UPDATE model SET name = :name, image = :image WHERE id = :id");

            $stmt->bindValue(':name', $editName);
            $stmt->bindValue(':image', $editPhoto);
            $stmt->bindValue(':id', $selected_id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function bookModels($client_id, $selected_id, $bookingDate)
    {
        try {
            $stmt = $this->connection->prepare("INSERT into booking (client_id, model_id, booking_status, booking_date) VALUES (:client_id, :model_id, :booking_status, :booking_date)");

            $stmt->bindValue(':client_id', $client_id);
            $stmt->bindValue(':model_id', $selected_id);
            $stmt->bindValue(':booking_status', 'booking requested');
            $stmt->bindValue(':booking_date', $bookingDate);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function createModel($model)
    {
        try {
            $stmt = $this->connection->prepare("INSERT into model (name, age, type, birthDate, image) VALUES (:name, :age, :type, :birthDate, :image)");

            $stmt->bindValue(':name', $model["name"]);
            $stmt->bindValue(':age', $model["age"]);
            $stmt->bindValue(':type', $model["type"]);
            $stmt->bindValue(':birthDate', $model["birthDate"]);
            $stmt->bindValue(':image', $model["image"]);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function deleteModel($selected_id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM model WHERE id = :id");

            $stmt->bindValue(':id', $selected_id);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function deleteBooking($selected_id)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM booking WHERE id = :id");

            $stmt->bindValue(':id', $selected_id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getModelByType($type)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM model");
//            $stmt->bindParam(':type', $type);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model');
            $models = $stmt->fetchAll();

            return $models;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getModelByID($modelId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM model WHERE id = :id");
            $stmt->bindParam(':id', $modelId);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Model');
            $modelById = $stmt->fetchAll();

            return $modelById;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getBooking()
    {
        try {

            $stmt = $this->connection->prepare("SELECT model.name AS model_name, booking.model_id, user.name AS client_name, booking.client_id, booking.booking_status, booking.booking_date, booking.id AS booking_id
FROM model
INNER JOIN booking ON booking.model_id=model.id
INNER JOIN user ON booking.client_id=user.id;");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Booking');
            $booking = $stmt->fetchAll();

            return $booking;

        } catch (PDOException $e) {
            echo $e;
        }
    }
    function deleteModelById($id){
        try {
            $stmt = $this->connection->prepare("DELETE FROM model WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return;
        } catch (PDOException $e) {
            echo $e;
        }
        return true;
    }

}