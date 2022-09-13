<?php
namespace Casino\Models;

use Casino\Services\DB;

class User extends DB
{

    protected $table = 'users';

    /**
     * @param int $id
     * @return mixed
     */
    public function getUser(int $id)
    {

        $result = $this->dbConn->fetchRow('SELECT * FROM ' . $this->table . ' WHERE id = :id', ['id' => $id]);

        return $result;

    }

    /**
     * @param array $data
     * @return mixed
     */
    public function storeUser(array $data)
    {

        $id = $this->dbConn->insert($this->table, $data);

        return $id;

    }

    /**
     * @param string $phone
     * @return mixed
     */
    public function getUserByPhone(string $phone)
    {

        $result = $this->dbConn->fetchRow('SELECT * FROM ' . $this->table . ' WHERE phone = :phone', ['phone' => $phone]);

        return $result;

    }

    /**
     * @param string $hash
     * @return mixed
     */
    public function getUserByHash(string $hash)
    {

        $result = $this->dbConn->fetchRow('SELECT * FROM ' . $this->table . ' WHERE hash = :hash', ['hash' => $hash]);

        return $result;

    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteUser(int $id)
    {

        $result = $this->dbConn->delete($this->table, ['id' => $id]);

        return $result;

    }

    /**
     * @param array $id
     * @param array $data
     * @return mixed
     */
    public function updateUser(array $id = [], array $data = [])
    {

        $result = $this->dbConn->update($this->table, $id, $data);

        return $result;

    }

}
