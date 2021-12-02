<?php

function filter($selected,$sortArray, $sortValue){
                
               echo"<p><strong>Sort By:</strong> ";
                for($i=0;$i<count($sortArray);$i++){
                    if(strtolower($sortArray[$i]) == strtolower($selected)){
                        
                        echo "<input type=\"radio\" id=\"$sortArray[$i]\" name=\"sort\" value=\"$sortValue[$i]\" checked=\"checked\"/>"
                        ."<label for=\"$sortArray[$i]\">$sortArray[$i]</label>";
                    }
                    else  
                    echo"<input type=\"radio\" id=\"$sortArray[$i]\" name=\"sort\" value=\"$sortValue[$i]\"/>" 	
                    ."<label for=\"$sortArray[$i]\">$sortArray[$i]</label>";
                }
               echo "</p>";
               
            }   

function table($result){
            echo "<table id=\"recordTable\">\n";
            echo "<tr>\n "
                ."<th scope=\"col\">EOINumber</th>\n "
                ."<th scope=\"col\">JobRefNumber</th>\n "
                ."<th scope=\"col\">First Name</th>\n "
                ."<th scope=\"col\">Last Name</th>\n "
                ."<th scope=\"col\">Email</th>\n "
                ."<th scope=\"col\">Phone</th>\n "
                ."<th scope=\"col\">Gender</th>\n "
                ."<th scope=\"col\">Address</th>\n "
                ."<th scope=\"col\">Skill</th>\n "
                ."<th scope=\"col\">Status</th>\n "
                ."<th></th>"
                ."<tr>\n ";
            // retrive current record pointed by the result pointer
            
            while($row = mysqli_fetch_assoc($result)){
                
                echo "<tr>\n ";
                echo"<td>", $row["eoiNumber"], "</td>\n ";
                echo"<td>", $row["jobRefNum"], "</td>\n ";
                echo"<td>", $row["fname"], "</td>\n ";
                echo"<td>", $row["lname"], "</td>\n ";
                echo"<td>", $row["email"], "</td>\n ";
                echo"<td>", $row["phone"], "</td>\n ";
                echo"<td>", $row["gender"],"</td>\n ";
                echo"<td>", $row["streetAddress"]," ",$row["suburb"]," ",$row["state"], " ", $row["postcode"],"</td>\n ";
                echo"<td>", $row["skills"]," ", $row["otherSkills"], "</td>\n ";
              
                echo"<td>", $row["status"], "</td>\n ";
                echo " <td><a id=\"btnChange\"  class=\"button\" href=\"status.php?$row[eoiNumber]\">ChangeStatus</a></td>";
               
                echo "</tr>\n ";
            }
            echo "</table>\n ";
}
function sanitise_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
function tableLogin($result){
    echo "<table id=\"loginTable\">\n";
    echo "<tr>\n "
        ."<th scope=\"col\">No</th>\n "
        ."<th scope=\"col\">Username</th>\n "
        ."<th scope=\"col\">Password</th>\n "
        ."<th></th>"
        ."<tr>\n ";
    // retrive current record pointed by the result pointer
    
    while($row = mysqli_fetch_assoc($result)){
        
        echo "<tr>\n ";
        echo"<td>", $row["userNum"], "</td>\n ";
        echo"<td>", $row["username"], "</td>\n ";
        echo"<td>", $row["password"], "</td>\n ";
       
        echo "</tr>\n ";
    }
    echo "</table>\n ";
}

class Bcrypt{
    private $rounds;
  
    public function __construct($rounds = 12) {
      if (CRYPT_BLOWFISH != 1) {
        throw new Exception("bcrypt not supported in this installation. See http://php.net/crypt");
      }
  
      $this->rounds = $rounds;
    }
  
    public function hash($input){
      $hash = crypt($input, $this->getSalt());
  
      if (strlen($hash) > 13)
        return $hash;
  
      return false;
    }
  
    public function verify($input, $existingHash){
      $hash = crypt($input, $existingHash);
  
      return $hash === $existingHash;
    }
  
    private function getSalt(){
      $salt = sprintf('$2a$%02d$', $this->rounds);
  
      $bytes = $this->getRandomBytes(16);
  
      $salt .= $this->encodeBytes($bytes);
  
      return $salt;
    }
  
    private $randomState;
    private function getRandomBytes($count){
      $bytes = '';
  
      if (function_exists('openssl_random_pseudo_bytes') &&
          (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN')) { // OpenSSL is slow on Windows
        $bytes = openssl_random_pseudo_bytes($count);
      }
  
      if ($bytes === '' && is_readable('/dev/urandom') &&
         ($hRand = @fopen('/dev/urandom', 'rb')) !== FALSE) {
        $bytes = fread($hRand, $count);
        fclose($hRand);
      }
  
      if (strlen($bytes) < $count) {
        $bytes = '';
  
        if ($this->randomState === null) {
          $this->randomState = microtime();
          if (function_exists('getmypid')) {
            $this->randomState .= getmypid();
          }
        }
  
        for ($i = 0; $i < $count; $i += 16) {
          $this->randomState = md5(microtime() . $this->randomState);
  
          if (PHP_VERSION >= '5') {
            $bytes .= md5($this->randomState, true);
          } else {
            $bytes .= pack('H*', md5($this->randomState));
          }
        }
  
        $bytes = substr($bytes, 0, $count);
      }
  
      return $bytes;
    }
  
    private function encodeBytes($input){
      // The following is code from the PHP Password Hashing Framework
      $itoa64 = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  
      $output = '';
      $i = 0;
      do {
        $c1 = ord($input[$i++]);
        $output .= $itoa64[$c1 >> 2];
        $c1 = ($c1 & 0x03) << 4;
        if ($i >= 16) {
          $output .= $itoa64[$c1];
          break;
        }
  
        $c2 = ord($input[$i++]);
        $c1 |= $c2 >> 4;
        $output .= $itoa64[$c1];
        $c1 = ($c2 & 0x0f) << 2;
  
        $c2 = ord($input[$i++]);
        $c1 |= $c2 >> 6;
        $output .= $itoa64[$c1];
        $output .= $itoa64[$c2 & 0x3f];
      } while (true);
  
      return $output;
    }
  }

?>

