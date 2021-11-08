<?php



function following($str) {



if($str=='z'){

    return substr(++$str,1);
}else{
    return  ++$str; 
}

}

 echo following('c');



?>