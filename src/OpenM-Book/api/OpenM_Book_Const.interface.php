<?php

Import::php("OpenM-Services.api.OpenM_Service");

/**
 *
 * @package OpenM  
 * @subpackage OpenM\OpenM-Book\api 
 * @author Gaël Saunier
 */
interface OpenM_Book_Const extends OpenM_Service {
    
    const RETURN_ERROR_MESSAGE_USER_NOT_REGISTERED_VALUE = "you're not registered";
    const RETURN_ERROR_MESSAGE_USER_NOT_FOUND_VALUE = "user not found";    
    const RETURN_ERROR_MESSAGE_GROUP_NOT_FOUND_VALUE = "group not found";
    
    const RETURN_USER_LIST_PARAMETER = "USER_LIST";
    const RETURN_USER_ID_PARAMETER = "ID";
    
    const USER_ID_PARAMETER_PATERN = "/^[1-9][0-9]*$/";
    const GROUP_ID_PARAMETER_PATERN = "/^[1-9][0-9]*$/";
    const ID_PARAMETER_PATERN = "/^[1-9][0-9]*$/";
}

?>
