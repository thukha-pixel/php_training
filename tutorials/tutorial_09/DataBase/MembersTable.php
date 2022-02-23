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
                    `income` int UNSIGNED,
                    `created_at` DATETIME,
                    `updated_at` DATETIME DEFAULT NULL
                );
            ";

            $statement = $this->db->prepare($query);
            $statement->execute();

        } catch (PDOException $e) {
            return $e->getMessage()();
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
                    name, email, relative, phone, date_of_birth, income, created_at
                ) VALUES (
                    :name, :email, :relative, :phone, :date_of_birth, :income, NOW()
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
    *@param int $id
    *return data from db as object
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
    *@param int $id
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
    *@param int $id
    *@param string $name
    *@param string $email
    *@param string $relative
    *@param string or number $phone
    *@param string(DATETIME)$date_of_birth
    *@param string $income
    */
    public function update($id, $name, $email, $relative, $phone, $date_of_birth, $income)
    {
        try {
            $query = "
                UPDATE members
                SET name = :name,
                    email = :email,
                    relative = :relative,
                    phone = :phone,
                    date_of_birth = :date_of_birth,
                    income = :income,
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
                ":date_of_birth" =>$date_of_birth,
                ":income" => $income,
            ]);

        } catch (PDOException $e) {
            return $e->getMessage() ();
        }
    }

     /*
    *Get All Data
    *return data from db as array
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