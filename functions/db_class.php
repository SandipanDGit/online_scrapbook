<?php

//config :
//host, username, password, db_name, password_length, username_length

class user_db{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "project_game";
    private $pdo = "";      //PDO object
    private $password_min_length = 3;
    private $username_min_length = 1;

    /////////////////////// CONNECT /////////////////////
    private function connect(){
        //returns true or false. and sets $self->pdo variable on success

        $dsn = "mysql:host=$this->host;dbname=$this->db_name";
        try{
            $pdo = new PDO($dsn, $this->username, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $this->pdo = $pdo;
        }
        catch(PDOException $e){
            $this->pdo = "";
            return false;
        }
        return true;
    }

    /////////////////////// USER EXISTS /////////////////////
    private function user_exists($user_id){
        //returns 1 if user exists
        //returns 2 if user doesnt exist
        //returns 3 on query failure or database issues
        
        if(!$this->pdo){
            if(!$this->connect()){
                return 3;
            }
        }
        //RETRIEVE EXISTING USERS LIST
        $sql = "select user_id from users";
        $stmt = $this->pdo->prepare($sql);    //$pdo is PDO object, $stmt is PDOStatement object
        $is_executed = $stmt->execute();   //returns true or false
        if(!$is_executed){
            return 3;
        }
        // $result = $stmt->fetchAll();   //$result should contain list of user_id as array
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            if($row['user_id'] == $user_id){
                return 1;
            }
        }
        $stmt = null;
        return 2;
    }

    /////////////////////// VALIDATE PASSWORD /////////////////////////
    private function validate_password($password){
        //if password validated, returns [1,1]
        //if validation failed, returns [0, error message]
        
        if(strlen($password) < $this->password_min_length){
            return array(0, "password must be at least $this->password_min_length character long");
        }
        if(preg_match("/[^a-zA-Z0-9_#@$%^&*()+=\-\[\]\'\";,.\/{}|:`<>?~\\\\]/", $password)){
            return array(0, "only digits, letters or symbols allowed in password");
        }
        return array(1,1);      
    }

    /////////////////////// VALIDATE USERNAME /////////////////////////
    private function validate_username($username){
        //if username and password validated, returns [1,1]
        //if validation failed, returns [0, error message]
        
        if(preg_match("/[^a-zA-Z0-9_]/", $username)){
            return array(0, "only letters, digits and _ allowed in username");
        }
        if(strlen($username) < $this->username_min_length){
            return array(0, "username must be at least $self->username_min_length character long");
        }
        return array(1,1);      
    }

    /////////////////////// CREATE USER /////////////////////
    public function create_user($user_id, $username, $password){
        //on success, returns [1,1]
        //on failure, returns [0, error message]

        //CONNECT TO DATABASE
        if(!$this->pdo){
            $is_connected = $this->connect();
            if(!$is_connected){
                return array(0, "database connection failed");
            }
        }

        //CHECK IF USER_ID ALREADY EXISTS
        $flag = $this->user_exists($user_id);
        if($flag == 1){
            return array(0, "user already exists");
        }
        else if($flag == 3){
            return array(0, "couldn't fetch user_id list");
        }

        //VALIDATE USERNAME AND PASSWORD
        list($is_validated, $validation_error) = $this->validate_username($username);
        if(!$is_validated){
            return array(0, $validation_error);
        }
        list($is_validated, $validation_error) = $this->validate_password($password);
        if(!$is_validated){
            return array(0, $validation_error);
        }

        //ENCRYPT PASSWORD
        $hash = password_hash($password, PASSWORD_DEFAULT);
        if(!$hash) return array(0, "password hash failed");

        //CREATE USER
        $sql = "insert into users (user_id, username, password) values(?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        try{
            $stmt->execute([$user_id, $username, $hash]);
        }
        catch(Exception $e){
            return array(0, "user creation query failed");
        }

        return array(1,1);
    }

    /////////////////////// AUTHENTICATE USER /////////////////////
    public function authenticate($user_id, $password){
        //on success, returns [1, 1]
        //on failure, returns [0,error message]

        //CONNECT TO DATABASE
        if(!$this->pdo){
            if(!$this->connect()){
                return array(0, "database connection failed", 0, 0);
            }
        }
        //FETCH RECORD
        $sql = "select password from users where user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        try{
            $stmt->execute([$user_id]);
        }
        catch(Exception $e){
            return array(0, "database query failed", 0, 0);
        }
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$record){
            return array(0, "user not found", 0, 0);
        }
        if(password_verify($password, $record["password"])){
            return array(1, 1);
        }
        else{
            return array(0, "password mismatch");
        }
    }


    /////////////////////// FETCH USER DATA /////////////////////
    public function fetch_user($user_id){
        //on success, returns [1, $username, $password, $last_activity]
        //on failure, returns [0,error message,0,0]

        //CONNECT TO DATABASE
        if(!$this->pdo){
            if(!$this->connect()){
                return array(0, "database connection failed", 0, 0);
            }
        }
        //FETCH RECORD
        $sql = "select username, password, last_activity from users where user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        try{
            $stmt->execute([$user_id]);
        }
        catch(Exception $e){
            return array(0, "database query failed", 0, 0);
        }
        $record = $stmt->fetchAll();
        if(!$record){
            return array(0, "user not found", 0, 0);
        }
        return array(1, $record[0]['username'], $record[0]['password'], $record[0]['last_activity']);
    }

    /////////////////////// CHANGE NAME OF USER /////////////////////
    public function change_name($user_id, $new_name){
        //on success, returns [1,1]
        //on failure, returns [0, error message]

        //CONNECT TO DATABASE
        if(!$this->pdo){
            if(!$this->connect()){
                return array(0, "database connection failed");
            }
        }

        //CHECK IF USER_ID EXISTS
        $flag = $this->user_exists($user_id);
        if($flag == 2){
            return array(0, "user does not exist");
        }
        else if($flag == 3){
            return array(0, "couldn't fetch user_id list");
        }

        //VALIDATE NEW NAME
        list($is_validated, $validation_error) = $this->validate_username($new_name);
        if(!$is_validated){
            return array(0, $validation_error);
        }

        //UPDATE NAME
        $sql = "update users set username = ? where user_id = ?";
        $stmt = $self->pdo->prepare($sql);
        try{
            $stmt->execute([$new_name, $user_id]);
        }
        catch(Exception $e){
            return array(0, "user update query failed");
        }

        return array(1,1);
    }

    /////////////////////// CHANGE PASSWORD /////////////////////
    public function change_password($user_id, $new_password){
        //on success, returns [1,1]
        //on failure, returns [0, error message]

        //CONNECT TO DATABASE
        if(!$this->pdo){
            if(!$this->connect()){
                return array(0, "database connection failed");
            }
        }

        //CHECK IF USER_ID EXISTS
        $flag = $this->user_exists($user_id);
        if($flag == 2){
            return array(0, "user does not exist");
        }
        else if($flag == 3){
            return array(0, "couldn't fetch user_id list");
        }

        //VALIDATE NEW PASSWORD
        list($is_validated, $validation_error) = $this->validate_password($new_password);
        if(!$is_validated){
            return array(0, $validation_error);
        }

        //UPDATE PASSWORD
        $sql = "update users set password = ? where user_id = ?";
        $stmt = $self->pdo->prepare($sql);
        try{
            $stmt->execute([$new_password, $user_id]);
        }
        catch(Exception $e){
            return array(0, "password update query failed");
        }

        return array(1,1);
    }

    /////////////////////// DELETE USER ID /////////////////////
    public function delete_user($user_id){
        //on success, returns [1,1]
        //on failure, returns [0, error message]

        //CONNECT TO DATABASE
        if(!$this->pdo){
            if(!$this->connect()){
                return array(0, "database connection failed");
            }
        }

        //CHECK IF USER_ID EXISTS
        $flag = $this->user_exists($user_id);
        if($flag == 2){
            return array(0, "user does not exist");
        }
        else if($flag == 3){
            return array(0, "couldn't fetch user_id list");
        }

        //DELETE USER
        $sql = "delete from users where user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        try{
            $stmt->execute([$user_id]);
        }
        catch(Exception $e){
            return array(0, "user deletion query failed");
        }

        return array(1,1);
    }

    ///////////////////////// RESPOND //////////////////////////
    public function respond($user_id, $respondant, $response_body){
        //on success, returns [1, 1]
        //on failure, returns [0, error message]

        //CONNECT TO DATABASE
        if(!$this->pdo){
            if(!$this->connect()){
                return array(0, "database connection failed");
            }
        }

        //CHECK IF USER_ID EXISTS
        $flag = $this->user_exists($user_id);
        if($flag == 2){
            return array(0, "user does not exist");
        }
        else if($flag == 3){
            return array(0, "couldn't fetch user_id list");
        }

        //VALIDATE RESPONDANT'S NAME
        list($is_validated, $validation_error) = $this->validate_username($respondant);
        if(!$is_validated){
            return array(0, $validation_error);
        }

        //VALIDATE RESPONSE BODY
        if(!strlen($response_body)){
            return array(0, "can not enter empty message");
        }

        //DO DATABASE STUFF
        $sql = "insert into responses (user_id, respondant, response_body) values (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        try{
            $stmt->execute([$user_id, $respondant, $response_body]);
        }
        catch(PDOException $e){
            return array(0, "database query failed");
        }
        
        return array(1,1); 
    }

    ////////////////////// FETCH RESPONSE ///////////////
    public function fetch_responses($user_id){
        //on success, returns [1, [array of responses]]
        //on failure, returns [0, error message]

        //CONNECT TO DATABASE
        if(!$this->pdo){
            if(!$this->connect()){
                return array(0, "database connection failed");
            }
        }

        //CHECK IF USER_ID EXISTS
        $flag = $this->user_exists($user_id);
        if($flag == 2){
            return array(0, "user does not exist");
        }
        else if($flag == 3){
            return array(0, "couldn't fetch user_id list");
        }

        //FETCH RESPONSE LIST
        $sql = "select * from responses where user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        try{
            $stmt->execute([$user_id]);
        }
        catch(PDOException $e){
            return array(0, "query failed");
        }
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array(1, $result);
    }
}//class ends

?>