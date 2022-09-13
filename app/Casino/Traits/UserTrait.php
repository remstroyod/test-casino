<?php
namespace Casino\Traits;

use DateTime;

trait UserTrait
{

    /**
     * @return void
     */
    public function generateHash()
    {
        $hash = date('U');
        $hash = hash('sha256', $hash . 'casino');

        return $hash;
    }

    /**
     * @param $date
     * @return bool
     */
    public function checkDateLink($date)
    {

        $now = new DateTime();
        $date = DateTime::createFromFormat("Y-m-d H:i:s", $date);
        $interval = $now->diff($date);

        if( $interval->d < 7 ) return true;

        return false;

    }

    /**
     * @param $url
     * @return void
     */
    public function redirect($url)
    {
        header('Location: ' . $url);
    }

}
