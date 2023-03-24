<?php

class m0005_car
{
    public function up()
    {
        $db = new DbMigration();
        $SQL = "CREATE TABLE car (
            id_car INT PRIMARY KEY,
            name_car VARCHAR(255) NOT NULL,
            base_timezone VARCHAR(10) NOT NULL,
            address_domicile VARCHAR(255) NOT NULL,
            address_work VARCHAR(255) NOT NULL,
            id_user INT NOT NULL ,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = new DbMigration();
        $SQL = "DROP TABLE car";
        $db->pdo->exec($SQL);
    }
}
