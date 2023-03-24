<?php

class m0006_add_FK_user_car
{

    public function up()
    {
        $db = new DbMigration();
        $SQL = "ALTER TABLE car 
                ADD CONSTRAINT FK_usercar   
                FOREIGN KEY (id_user) REFERENCES users(id_user);";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = new DbMigration();
        $SQL = "ALTER TABLE car DROP CONSTRAINT FK_usercar  ";
        $db->pdo->exec($SQL);
    }
}

