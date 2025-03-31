<?php

class Database
{
    private $conn;

    public function __construct()
    {
        $env = $this->loadEnv(__DIR__ . '/../../.env');

        $host = $env['DB_HOST'];
        $user = $env['DB_USER'];
        $pass = $env['DB_PASS'];
        $dbname = $env['DB_NAME'];
        $port = $env['DB_PORT'];

        $this->conn = new mysqli($host, $user, $pass, $dbname, $port);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
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

    private function loadEnv($path)
    {
        if (!file_exists($path)) {
            die(".env file not found!");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $env = [];

        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            list($key, $value) = explode('=', $line, 2);
            $env[trim($key)] = trim($value);
        }

        return $env;
    }
}

?>