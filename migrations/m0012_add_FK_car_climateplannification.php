<?php

class m0012_add_FK_car_climateplannification
{
    public function up()
    {
        $db = new DbMigration();
        $SQL = "ALTER TABLE climate_plannification 
                ADD CONSTRAINT FK_car_climateplannification 
                FOREIGN KEY (id_car) REFERENCES car(id_car);";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = new DbMigration();
        $SQL = "ALTER TABLE climate_plannification DROP CONSTRAINT FK_car_climateplannification  ";
        $db->pdo->exec($SQL);
    }
}