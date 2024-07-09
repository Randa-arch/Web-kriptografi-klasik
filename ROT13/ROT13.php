<?php

class ROT13
{    
    
    private $alpha = [];
    
    private $encrypted = [];
    
    private $encryptedWord = "";

    public function __construct()
    {
        foreach (range('a','z') as $letter) {
            $this->alpha[] = $letter; 
        }
    }

    public function encrypt(string $word): string
    {
        for ($i=0; $i < strlen($word); $i++) { 
            $key[$i] = array_search($word[$i], $this->alpha);
            if($key[$i] <= 12){
                array_push($this->encrypted, $key[$i]+13);
            }
            else{
                array_push($this->encrypted, $key[$i]-13);
            }
            
        }
        foreach ($this->encrypted as $value) {
            $this->encryptedWord .= $this->alpha[$value];
        }
        return $this->encryptedWord;
    }


}

?>