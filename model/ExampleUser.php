<?php

final class ExampleUser
{
    public function giveMessage()
    {
        //EXAMPLE

        $db = new DatabaseUser();
        //if that's not working read the README (you have to apply the migrations)

        /**
         * CREATE (['column'=>'value', 'second column'=>'value'], table name)
         * **/

        // $message = $db->queryCreateUserAction(
        //     'lucky@luke.com',
        //     'Dracula',
        //     'Mary',
        //     'Jane',
        //     'PASSWD',
        // );


        /**
         * UPDATE (id, ['column'=>'value', 'second column'=>'value'], table name)
         * **/

        // $message = $db->queryUpdateUserAction(
        //     'lucky@luke.com',
        //     'Dracula',
        //     'peanut',
        //     'forget_@hey',
        //     6
        // );

        /**
         *  READ  email + user password
         * // not working if you don't have the correspond data in you table and return wrong
         * RETURN : message + create user session
         *
         * **/

        $value = $db->queryGetUserAction('alucky@luke.com', 'PASSWD'); //mdp bcrypte
        if (isset($_SESSION['id'])) {
            var_dump($_SESSION['email']);
            var_dump($_SESSION['id']);
            var_dump($_SESSION['csrf_token']);
        }
        var_dump($value);


        /**
         * DELETE (id)
         * **/
        // $message = $db->queryDeleteUserAction(7);
    }
}
