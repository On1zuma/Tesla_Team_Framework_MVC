<?php

class m0008_add_FK_car_charge
{
    public function up()
    {
        $db = new DbMigration();
        $SQL = "ALTER TABLE charge 
                ADD CONSTRAINT FK_carcharge 
                FOREIGN KEY (id_car) REFERENCES car(id_car);";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = new DbMigration();
        $SQL = "ALTER TABLE charge DROP CONSTRAINT FK_carcharge  ";
        $db->pdo->exec($SQL);
    }

}