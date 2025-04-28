<?php
namespace Core;

class Database
{
    private $conn;

    public function __construct()
    {
        $envFilePath = __DIR__ . '/../../.env';
        if (file_exists($envFilePath)) {
            $env = parse_ini_file($envFilePath);
            foreach ($env as $key => $value) {
                putenv("$key=$value");
            }
        } else {
            echo "The .env file was not found.<br>";
        }

        $host = getenv('DB_HOST');
        $user = getenv('DB_USER');
        $pass = getenv('DB_PASS');
        $dbname = getenv('DB_NAME');
        $port = getenv('DB_PORT');

        $this->conn = new \mysqli($host, $user, $pass, $dbname, $port);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function escape($value)
    {
        return $this->conn->real_escape_string($value);
    }

    public function close()
    {
        $this->conn->close();
    }
}