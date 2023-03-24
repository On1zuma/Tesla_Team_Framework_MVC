<?php

class m0007_charge
{
    public function up()
    {
        $db = new DbMigration();
        $SQL = "CREATE TABLE charge (
            id_charge  INT AUTO_INCREMENT PRIMARY KEY, 
            start_datetime 	DateTime NOT NULL,
            stop_datetime  	DateTime NOT NULL,
            charge_amount  Float NOT NULL, 
            expense Float NOT NULL,
            currency VARCHAR(5) NOT NULL,
            charge_domicile BIT NOT NULL,
            charge_work BIT NOT NULL,
            supercharger BIT NOT NULL,
            id_car INT NOT NULL, 
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = new DbMigration();
        $SQL = "DROP TABLE charge";
        $db->pdo->exec($SQL);
    }
}
