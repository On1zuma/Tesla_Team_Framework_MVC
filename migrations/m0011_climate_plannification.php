<?php

class m0011_climate_plannification
{

    public function up()
    {
        $db = new DbMigration();
        $SQL = "CREATE TABLE climate_plannification (
            id_climate_plannification INT AUTO_INCREMENT PRIMARY KEY,
            start_climate_time time NOT NULL ,
            stop_climate_time time NOT NULL ,
            climate_active BIT NOT NULL ,
            id_car INT NOT NULL ,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = new DbMigration();
        $SQL = "DROP TABLE climate_plannification";
        $db->pdo->exec($SQL);
    }

}