<?php
class Connect{
    public $conn;
    function __construct(){
        $this->conn = new mysqli("localhost","root","","market");
       // $this->conn = new mysqli('localhost','ourudaan_admin','Pkaran@26', 'ourudaan_Udaan');
         
    }
    
    function ProcessQuery($sql){
        if($this->conn->query($sql)===TRUE){
            return true;
        }else {
            return "Error: " . $sql . "<br>" . $this->conn->error;
        }
        return 0;
    }
    
    function lastInsert($sql){
        if($this->conn->query($sql)===TRUE){
            return $last_id = $this->conn->insert_id;
        }else {
            return "Error: " . $sql . "<br>" . $this->conn->error;
        }
        return 0;
    }
    
    function select_data2($sql){
        $result = $this->conn->query($sql);
        return $result;
    }
     function select_data($sql,$no){
        $result = $this->conn->query($sql);
        $a = array();
        $i=0;
        $j=0;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_array()) {
                for($i=0;$i<$no;$i++){
                    $a[$j][$i] = $row[$i];
                }
                $j = $j+1;
            }
        } 
        return $a;
    }
    
    function clean($string) {
    //   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
       $string = preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
       return preg_replace('/-+/', ' ', $string); // Replaces multiple hyphens with single one.
    }
    
    function checkData($sql){
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return 1;
        }else{ 
            return 0;
        }
    }
    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    function encrypt_decrypt($action, $string) {
        $output = false;

        $encrypt_method = "AES-256-CBC";
        $secret_key = 'This is my secret key';
        $secret_iv = 'This is my secret iv';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
}
?>