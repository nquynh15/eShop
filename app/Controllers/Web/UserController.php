<?php
require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/User.php');
require_once('core/Auth.php');
require_once('core/Flash.php');
require_once('app/Requests/ResetpasswordRequest.php');
class UserController extends WebController

{
    private $user;


    private $key = 'user';

    public function __construct()
    {
        $this->user = new User();

    }
    public function index()
    {
        $limit = 5;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];

        }
        else {
            $page = 1;

        }
        ;

        $start = ($page - 1) * $limit;
        $id = Auth::getUser('user')['users_id'];
        $user = $this->user->find($id)->hydrate();
        $usersP = $this->user->listPay($id, $start, $limit)->hydrate();
        $users = $this->user->list($id)->hydrate();
        return $this->view('user/index.php', ['user' => $user, 'users' => $users, 'usersP' => $usersP]);
    }

    public function change()
    {
        if (isset($_POST['reset'])) {
            $resetpasswordRequest = new ResetpasswordRequest();
            $resetpasswordRequest->validateLogin($_POST);
            $id = Auth::getUser('user')['users_id'];
            $user = $this->user->find($id)->hydrate();
            if ($resetpasswordRequest->countErrors() == 0) {
                unset($_POST['renewpassword']);
                $email = Auth::getUser('user')['email'];

                $user = $this->user->where(['email' => $email, 'password' => md5($_POST['password'])])->first();
                if (empty($user)) {
                    Flash::set('error', 'password not exits');
                    return redirect('user/index');
                }
                else {
                    $this->user->update($_POST['newpassword'], $email);
                    Auth::setUser('user', $user, isset($_POST['remerber_me']) ? true : false);

                    return redirect('login/index');
                }
            }
            return $this->view('user/index.php', ['resetErrors' => $resetpasswordRequest->getErrors(), 'user' => $user]);
        }
        return redirect('user/index');
    }


}

?>