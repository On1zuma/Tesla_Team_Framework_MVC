<?php

final class validForm
{
    public function signup()
    {

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
         *  READ  (id, ['column'=>'value', 'second column'=>'value'], table name)
         * // not working if you don't have the correspond data in you table
         * RETURN :
         * queryGetAction give you back an array like that : [username = 'Dracula'] => 1 [email = 'archibald@haddock.com'] => 1
         * if the value => 1, this means that the value exists in the DB otherwise, it does not exist in the database
         * **/


        /**
         * CREATE ([['column'=>'value'], ['second column'=>'value']], table name)
         * **/

        
        $email = '';
        $username = '';
        $firstname = '';
        $lastname = '';
        $token = '';
        $password = '';
        $captcha = '';
        if(isset($_POST['email'])){
          $email=$_POST['email'];
        }
        if(isset($_POST['username'])){
          $username=$_POST['username'];
        }
        if(isset($_POST['firstname'])){
          $firstname=$_POST['firstname'];
        }
        if(isset($_POST['lastname'])){
            $lastname=$_POST['lastname'];
        }
        if(isset($_POST['token'])){
            $token=$_POST['token'];
        }
        if(isset($_POST['password'])){
            $password=$_POST['password'];
        }
        if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo 'Please check the the captcha form.';
          exit;
        }
        $secretKey = $_ENV['CAPTCHA_SERVER_KEY'];
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);    
        // should return JSON with success as true
        if($responseKeys["success"]) {
            var_dump('CAPTCHA SUCCESS');
        } else {
            var_dump('ERROR');
        }
         


         
        $create = $db->queryCreateAction(
            [
                //colum name / DATA
                'email' => $email,
                'username' => $username,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'token' => $token,
                'password' => $password,
            ],
            'users'
        );

    }


    public function login()
    {

        $db = new Database();

        
        $username = '';
        $password = '';
        $captcha = '';
        if(isset($_POST['username'])){
          $username=$_POST['username'];
        }
        if(isset($_POST['password'])){
            $password=$_POST['password'];
        }
        if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo 'Please check the the captcha form.';
          exit;
        }
        $secretKey = $_ENV['CAPTCHA_SERVER_KEY'];
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);    
        // should return JSON with success as true
        if($responseKeys["success"]) {
            var_dump('CAPTCHA SUCCESS');
        } else {
            var_dump('ERROR');
        }
         


         
        $get = $db->queryGetAction(
            [
                'username' => $username,
                'password' => $password,
            ],
            'users'
        );

        /**
         * DELETE (id, table name) //not working if you don't have the correspond data in you table
         * **/

        // $message = $db->queryDeleteAction(5, 'users');
    }
}
