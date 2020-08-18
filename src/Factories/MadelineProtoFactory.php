<?php

namespace Hu\MadelineProto\Factories;

use danog\MadelineProto\API;
use Hu\MadelineProto\MadelineProto;
use Illuminate\Database\Connection;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Model;

class MadelineProtoFactory
{
    /**
     * @var Connection
     */
    private $database;

    /**
     * Table name.
     *
     * @var string
     */
    private $table;

    /**
     * SessionFactory constructor.
     *
     * @param DatabaseManager $manager
     * @param string $table
     */
    public function __construct(DatabaseManager $manager, string $table)
    {
        $this->database = $manager->connection();
        $this->table = $table;
    }

    /**
     * Get the MadelineProto (session) instance from session table.
     *
     * @param int|Model $session can be either <b>id</b> or model instance of <b>TelegramSession</b> which
     *                           generated from <u>madeline-proto:multi-session --model</u> command
     * @param array|null $config if this parameter is null, then the config from <b>telegram.php</b>
     *                           file will be used
     * @return MadelineProto
     */
    public function get($session, array $config = null)
    {
        if (is_int($session)) {
            $session = $this->database->table($this->table)->find($session);

            $sessionFile = $session->session_file;
        } else {
            $sessionFile = $session->session_file;
        }

        return $this->make($sessionFile, $config);
    }

    /**
     * Generating MadelineProto (session) instance.
     *
     * @param string $sessionFile
     * @param array|null $config if this parameter is null, then the config from <b>telegram.php</b>
     *                           file will be used
     * @return MadelineProto
     */
    public function make(string $sessionFile, array $config = null)
    {
        if (is_null($config)) {
            $config = config('telegram.settings');
        }

        $client = new API(storage_path("app/telegram/$sessionFile"), $config);

        return new MadelineProto($client);
    }
}
