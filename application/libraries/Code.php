<?php

  class Code
  {

    function generateCode($code, $max_code)
    {
        $numb = (int) substr($max_code, strlen($code)+1);
        $numb++;
        $new_code = $code."-".sprintf("%04s", $numb);
        return $new_code;
    }

  }

?>
