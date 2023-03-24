<?php

class m0004_user
{
    public function up()
    {
        $db = new DbMigration();
        $SQL = "CREATE TABLE users (
            id_user INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            firstname VARCHAR(255) NOT NULL,
            username VARCHAR(255) NOT NULL,
            lastname VARCHAR(255) NOT NULL,
            password VARCHAR(512) NOT NULL,
            token VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = new DbMigration();
        $SQL = "DROP TABLE users";
        $db->pdo->exec($SQL);
    }
}
