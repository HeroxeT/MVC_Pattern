<?php
namespace Base;

class Db
{

    public $pdo;

    public function __construct()
    {

        $settings = $this->getPDOSettings();
        $this->pdo = new \PDO($settings['dsn'], $settings['user'], $settings['pass'], null);

    }

    protected function getPDOSettings()
    {

        $config = include ROOTPATH . '/config/db.php';
        $result['dsn'] = "{$config['type']}:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        $result['user'] = $config['user'];
        $result['pass'] = $config['pass'];
        return $result;
    }

    public function execute($query, array $params = null)
    {

        if (is_null($params)) {
            $db = $this->pdo;
            if ($db->query($query)) {
                return ["Success" => $db->fetchAll()];
            } else {
                return ["error" => $db->errorInfo()];
            }
        }
        $db = $this->pdo->prepare($query);
        if ($db->execute($params)) {
            return ["Success" => $db->fetchAll()];
        } else {
            return ["error" => $db->errorInfo()];
        }

    }
}
