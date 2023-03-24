<?php

class m0010_add_FK_car_chargeplannification
{
    public function up()
    {
        $db = new DbMigration();
        $SQL = "ALTER TABLE charge_plannification 
                ADD CONSTRAINT FK_car_chargeplannification 
                FOREIGN KEY (id_car) REFERENCES car(id_car);";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = new DbMigration();
        $SQL = "ALTER TABLE charge_plannification DROP CONSTRAINT FK_car_chargeplannification  ";
        $db->pdo->exec($SQL);
    }

}