<?php


 
    

function check_isvalidated($userType,$accessType=0)
{
    // if(!$_SESSION['username']){
    //    //redirect('user/login');
    // }
    
    if(!isset($userType))
    {
        redirect('user/login');
    }
    else{
        if($accessType!=1 && $userType==1){
            redirect('user/login');
        }
    }
}




?>