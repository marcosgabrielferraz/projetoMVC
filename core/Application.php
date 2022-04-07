<?php
/**
 * User: TheCodeholic
 * Date: 7/7/2020
 * Time: 9:57 AM
 */
namespace app\core;

/**
 * Class Application
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app
 */
class Application
{
    public static Application $app;
    poblic static string $ROOT_DIR;
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $reponse;
    public Controller $controller;
    public Database $db;
    public Session $session;
    public DbModel $user;

    public function __construct($rootDir, $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootDir
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->session = new Session();
        
        $userId = Application::$app->session->get('user');
        if ($userId) {
            $key = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$key => $userId]);
        }
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $value = $user->{$primaryKey};
        Application::$app->session->set('user', $value);
        return true;
    }

    public function run()
    {
        echo $this->router->resolve();
    }
} 