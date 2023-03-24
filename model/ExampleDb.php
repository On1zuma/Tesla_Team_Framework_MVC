<?php

final class ExampleDB
{
    public function giveMessage()
    {
        //EXAMPLE

        $db = new Database();
        //if that's not working read the README (you have to apply the migrations)

        /**
         * CREATE (['column'=>'value', 'second column'=>'value'], table name)
         * **/

        // $message = $db->queryCreateAction(
        //     [
        //         //colum name / DATA
        //         'email' => 'lucky@luke.com',
        //         'username' => 'Dracula',
        //         'firstname' => 'Mary',
        //         'lastname' => 'Jane',
        //         'token' => 'peanut',
        //         'password' => 'forget_@hey',
        //     ],
        //     'users'
        // );

        /**
         * UPDATE (id, ['column'=>'value', 'second column'=>'value'], table name)
         * **/

        // $message = $db->queryUpdateAction(1, ['username' => 'Dracula', 'email' => 'archibald@haddock.com'], 'users');

        /**
         * That return you all the data needed from a specific row
         *  Exemple : Array ( [id] => 6 [email] => alucky@luke.com [firstname] => Dracula [username] => peanut [lastname] => forget_@hey [token] => peanut [created_at] => 2022-12-14 11:21:09 [password] => $2y$10$2cNpNFm6x3ODDNZLLHcjp.cq84Ugq9KvXH1OlcntKkZnB4X0UZhMC )
         * **/
        $value = $db->queryGetAction(['id' => '6'], 'users'); //mdp bcrypte
        print_r($value);

        /**
         * DELETE (id, table name) //not working if you don't have the correspond data in you table
         * **/

        // $message = $db->queryDeleteAction(5, 'users');
    }
}
