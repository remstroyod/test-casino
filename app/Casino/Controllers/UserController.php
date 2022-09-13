<?php
namespace Casino\Controllers;

use Casino\Models\History;
use Casino\Models\User;
use Casino\Services\View;
use Casino\Traits\UserTrait;
use DateTime;

class UserController extends BaseController
{

    use UserTrait;

    /**
     * @var User
     */
    protected User $user;

    /**
     * @var History
     */
    protected History $history;

    public function __construct()
    {

        session_start();

        $this->user = new User();
        $this->history = new History();

    }

    /**
     * @return void
     */
    public function store()
    {

        if( empty( $_POST['name'] ) || empty( $_POST['phone'] ) )
        {

            $_SESSION['error'] = 'Required fields not filled';
            return $this->redirect('/');

        }

        if( $this->user->getUserByPhone($_POST['phone']) )
        {

            $_SESSION['error'] = 'A user with this phone number is already registered';
            return $this->redirect('/');

        }

        $user = $this->user->storeUser([
            'name'  => $_POST['name'],
            'phone' => $_POST['phone'],
            'hash'  => $this->generateHash(),
        ]);

        if( $user )
        {

            $user = $this->user->getUser($user);
            return $this->redirect('/user/' . $user['hash']);

        }

        return false;

    }

    /**
     * @param $hash
     * @return void
     */
    public function show($hash)
    {

        $user = $this->user->getUserByHash($hash);

        if( ! $user ) return $this->redirect('/user');

        if( $this->checkDateLink($user['date']) )
        {

            return View::load('template/user', ['user' => (object) $user]);

        }else{

            $this->destroy($user['id']);

        }

    }

    /**
     * @param $user
     * @return void
     */
    public function destroy($user)
    {

        $this->user->deleteUser($user);
        return $this->redirect('/');

    }

    /**
     * @param $user
     * @return void
     */
    public function update($user)
    {

        $now = new DateTime();
        $date = $now->format('Y-m-d H:i:s');

        $update = $this->user->updateUser([ 'id' => $user ], [ 'hash' => $this->generateHash(), 'date' => $date ]);

        if( $update )
        {

            $user = $this->user->getUser($user);
            return $this->redirect('/user/' . $user['hash']);

        }

    }

    /**
     * @param $user
     * @return void
     */
    public function spin($user): void
    {

        $result = 0;
        $rand = rand(1, 1000);

        if($rand % 2 === 0)
        {

            if( $rand > 900 )
            {
                $result = $rand * (70 / 100);
            }elseif ( $rand > 600 && $rand < 900 ) {
                $result = $rand * (50 / 100);
            }elseif ( $rand > 300 && $rand < 600 ) {
                $result = $rand * (30 / 100);
            }elseif ( $rand < 300 ) {
                $result = $rand * (10 / 100);
            }

        }

        $this->history->storeHistory($user, [ 'id_user' => $user, 'random' => $rand, 'summa' => $result ]);

        $html = sprintf('<h2><span>Your winnings:</span> <strong>%s$</strong></h2>', $result);

        echo json_encode([
            'message' => 'Success!',
            'html' => $html
        ]);

    }

    /**
     * @param $user
     * @return void
     */
    public function history($user): void
    {

        $histories = $this->history->getHistories($user);

        ob_start();

        include $_SERVER['DOCUMENT_ROOT'] . '/resources/views/template/history.php';

        $output = ob_get_contents();
        ob_end_clean();


        echo json_encode([
            'message' => 'Success!',
            'html' => $output
        ]);

    }


}
