<?php

namespace DataBase;

use PDOException;

/*
 *MembersTable associate with the model
 *MySQL $db (Dependency Injection)
*/
class MembersTable 
{
    private $db = null;

    public function __construct(MySQL $db)
    {
        $this->db = $db->connect();
    }


    /*
    *Create Table
    *
    */
    public function createTable()
    {
        try {
            $query = "
                CREATE TABLE IF NOT EXISTS `members`(
                    `id` int(10) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
                    `name` varchar(255) DEFAULT NULL,
                    `email` varchar(255) DEFAULT NULL,
                    `relative` varchar(255) DEFAULT NULL,
                    `phone` varchar(255) DEFAULT NULL,
                    `photo` varchar(255) DEFAULT NULL,
                    `date_of_birth` varchar(255) NULL,
                    `created_at` DATETIME,
                    `updated_at` DATETIME DEFAULT NULL
                );
            ";

            $statement = $this->db->prepare($query);
            $statement->execute();

        } catch (PDOException $e) {
            return $e->getMessage() ();
        }
    }

    /*
    *Insert Data
    *
    *@param array $data
    */
    public function insert($data)
    {
        try {
            $query = "
                INSERT INTO members (
                    name, email, relative, phone, date_of_birth, created_at
                ) VALUES (
                    :name, :email, :relative, :phone, :date_of_birth, NOW()
                )
            ";

            $statement = $this->db->prepare($query);
            $statement->execute($data);
            
        } catch (PDOException $e) {
            return $e->getMessage() ();
        }
    }

    /*
    *Find Data
    *
    *@param int or string $id
    */
    public function find($id)
    {
        $statement = $this->db->prepare("
            SELECT * FROM members WHERE id = :id
        ");

        $statement->execute([':id' => $id]);

        return $statement->fetch();
    }

    /*
    *Delete Data
    *
    *@param int or string $id
    */
    public function delete($id)
    {
        $statement = $this->db->prepare("
            DELETE FROM members WHERE id = :id
        ");

        $statement->execute([':id' => $id]);

        return $statement->rowCount();
    }

    /*
    *Update Data
    *
    *@param int or string $id
    *@param $name
    *@param $email
    *@param $relative
    *@param $phone
    *@param $date_of_birth
    */
    public function update($id, $name, $email, $relative, $phone, $date_of_birth)
    {
        try {
            $query = "
                UPDATE members
                SET name = :name,
                    email = :email,
                    relative = :relative,
                    phone = :phone,
                    date_of_birth = :date_of_birth,
                    updated_at = NOW()
                WHERE id = :id
            ";

            $statement = $this->db->prepare($query);
            $statement->execute([
                ':id' => $id,
                ':name' => $name, 
                ':email' => $email, 
                ':relative' =>$relative, 
                ":phone" =>$phone,
                ":date_of_birth" =>$date_of_birth
            ]);

        } catch (PDOException $e) {
            return $e->getMessage() ();
        }
    }

     /*
    *Get All Data
    *
    */
    public function getAll()
    {
        $statement = $this->db->query("
            SELECT members.*
            FROM members
        ");

        return $statement->fetchAll();
    }
}