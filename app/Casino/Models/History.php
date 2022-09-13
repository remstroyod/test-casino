<?php
namespace Casino\Models;

use Casino\Services\DB;

class History extends DB
{

    /**
     * @var string
     */
    protected $table = 'history';

    /**
     * @param int $user
     * @param array $data
     * @return mixed
     */
    public function storeHistory(int $user, array $data = []): mixed
    {

        if( $this->getHistoryCount($user) == 3 )
        {
            $this->destroyHistory($user);
        }

        $result = $this->dbConn->insert($this->table, $data);

        return $result;

    }

    /**
     * @param int $user
     * @return void
     */
    private function getHistoryCount(int $user): int
    {

        $result = $this->dbConn->fetchRow('SELECT COUNT(id) as count FROM ' . $this->table . ' WHERE id_user = :id_user', ['id_user' => $user]);

        if( $result ) return $result['count'];

    }

    /**
     * @param int $user
     * @return mixed
     */
    private function destroyHistory(int $user): mixed
    {

        $result = $this->dbConn->fetchRow('SELECT id FROM ' . $this->table . ' WHERE id_user = :id_user ORDER BY id ASC LIMIT 1', ['id_user' => $user]);

        if ( $result )
        {
            $result = $this->dbConn->delete($this->table, ['id' => $result['id']]);
        }

        return $result;

    }

    /**
     * @param int $user
     * @return mixed
     */
    public function getHistories(int $user): mixed
    {

        $result = $this->dbConn->fetchRowMany('SELECT * FROM ' . $this->table . ' WHERE id_user = :id_user', ['id_user' => $user]);

        return $result;

    }

}
