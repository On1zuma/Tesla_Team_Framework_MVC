<?php

class m0009_charge_plannification
{

    public function up()
    {
        $db = new DbMigration();
        $SQL = "CREATE TABLE charge_plannification (
            id_charge_plannification  INT AUTO_INCREMENT PRIMARY KEY, 
            start_charge_time time NOT NULL ,
            stop_charge_time time NOT NULL ,
            charge_active BIT NOT NULL ,
            id_car INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = new DbMigration();
        $SQL = "DROP TABLE charge_plannification";
        $db->pdo->exec($SQL);
    }


}