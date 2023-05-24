<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/user.php';

class LoginRepository extends Repository {

    public function check_user($email)
    {
        $result= $this->connection->prepare("SELECT * FROM user WHERE email = :email");
        $result->bindParam(':email',$email);
        $result->execute();

        $count = $result->rowCount();
        return $count;
    }
    public function insert_user($data)
    {
        $stmt = $this->connection->prepare("INSERT into user (email, name, hashedPassword, types, image) VALUES (:email, :name, :hashedPassword, :types, :image)");

        $stmt->bindValue(':email', $data["email"]);
        $stmt->bindValue(':name', $data["name"]);
        $stmt->bindValue(':hashedPassword', $data["hashedPassword"]);
        $stmt->bindValue(':types', $data["types"]);
        $stmt->bindValue(':image',$data['image']);

        $stmt->execute();
    }

    public function isUserValid($email,$password){
        try{
            $stmt= $this->connection->prepare("SELECT * FROM user WHERE email = :email");
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $row = $stmt->fetch();

            if(!$row){
                return null;
            }

            if(password_verify($password, $row['hashedPassword'])){
                $user = new User();
                $user ->setId($row['id'])
                    ->setEmail($row['email'])
                    ->setTypes($row['types']);
                return $user;
            }
            return null;
//            if(password_verify($password, $row['hashedPassword'])){
//                return true;
//            }
//            else{
//                return false;
//            }
        }
        catch (PDOException $e){
            echo $e;
        }
    }
    public function getUserByEmail($email){
        try{
            $user = new User();
            $stmt= $this->connection->prepare("SELECT * FROM user WHERE email = :email");
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            $user = $stmt->fetchAll();

            return $user;
        }
        catch (PDOException $e){
            echo $e;
        }
    }
}