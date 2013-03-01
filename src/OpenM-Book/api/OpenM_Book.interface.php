<?php

Import::php("OpenM-Book.api.OpenM_Book_Const");

/**
 *
 * @package OpenM
 * @subpackage OpenM\OpenM-Book\api
 * @license http://www.apache.org/licenses/LICENSE-2.0 Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * @link http://www.open-miage.org
 * @author Nicolas Rouzeaud & Gaël SAUNIER
 */
interface OpenM_Book extends OpenM_Book_Const {

    const RETURN_USER_PROPERTY_LIST_PARAMETER = "UPL";
    const RETURN_USER_GROUP_PROPERTY_VISIBILITY_LIST_PARAMETER = "PGVL";
    const RETURN_USER_PROPERTY_ID_PARAMETER = "PID";
    const RETURN_USER_PROPERTY_VALUE_ID_PARAMETER = "PVID";
    const RETURN_USER_PROPERTY_NAME_PARAMETER = "UPN";
    const RETURN_USER_FIRST_NAME_PARAMETER = "UFN";
    const RETURN_USER_LAST_NAME_PARAMETER = "ULN";
    const RETURN_USER_PHOTO_PARAMETER = "UPH";
    const RETURN_USER_PROPERTY_VALUE_PARAMETER = "UPV";

    //prefiled value
    const FIRST_NAME_PROPERTY_VALUE_ID = -1;
    const NAME_PROPERTY_VALUE_ID = -2;
    const PHOTO_ID_PROPERTY_VALUE_ID = -3;
    const BIRTHDAY_ID_PROPERTY_VALUE_ID = -4;
    const AGE_LIMIT_TO_REGISTER = 13;

    //property pattern
    const PROPERTY_NAME_PATTERN = "/^[a-z](([a-z]|\.)*[a-z])?$/";

    //error message
    const RETURN_ERROR_MESSAGE_USER_ALREADY_REGISTERED_VALUE = "User already registered";
    const RETURN_ERROR_MESSAGE_YOU_ARE_TOO_YOUNG_VALUE = "You're too young to register, the age limit is 13 years old";

    //signal const
    const SIGNAL_TYPE_BUG = "BUG";
    
    /**
     * ajoute un item dans la section exemple 2001 dans M1 toulouse
     * @param type $name
     * @param type $treeId
     * @param type $parentCommunityId
     * @return HashtableString un boolean
     */
    public function addCommunity($name, $treeId, $parentCommunityId);

    /**
     * M'ajoute dans un item passé en paramétre
     * @param String $communityId
     * @return HashtableString contient un boolean
     */
    public function registerMeIntoCommunity($communityId);

    /**
     * ajoute la valeur d'une propriétés
     * @param String $propertyId
     * @param String $propertyValue
     * @param String $visibilityGroupJSONList
     * @return HashtableString contenant l'ID de la valeur
     */
    public function addPropertyValue($propertyId, $propertyValue);

    /**
     * retourne la liste des items fils de l'item passé en paramètre
     * @param String $communityId
     * @return HashtableString  listes des items  (nom/id)
     */
    public function getCommunityChilds($communityId);

    /**
     * 
     * @param String $communityId
     * @return HashtableString  Contient un boolean
     */
    public function getCommunityTree($communityId = NULL);

    /**
     * Retourne la liste des utilisateurs qui appartiennent à l'item (groupe) passé en paramettre
     * @param String $communityJSONList
     * @param String $start pour la pagination
     * @param String $numberOfResult pour la pagination
     * @return HashtableString liste des utilisateur (userid, preferedName)
     */
    public function getCommunityUsers($communityJSONList = null, $start = null, $numberOfResult = null);

    /**
     * retourne les user qu'il faut valider, que j'ai le droit de voir
     * @param String $communityJSONList
     * @return HashtableString liste des utilisateur à valider
     */
    public function getNotValidUsers($communityJSONList = null);

    /**
     * retourne les porporité de l'utilisateur passée en parametre, que j'ai le droit de voir
     * @param String $userId id de l'utilisateur pour lequel récupérer les propriétées
     * @param boolean|String $basicOnly
     * @return HashtableString liste des propriétés avec leur valeurs
     */
    public function getUserProperties($userId = null, $basicOnly = null);

    /**
     * m'enregistre dans OpenM_Book
     * @param String $firstName
     * @param String $lastName
     * @param String $birthDay
     * @return HashtableString 
     */
    public function registerMe($firstName, $lastName, $birthDay);

    /**
     * me retirer d'un item(groupe)
     * @param String $itempId
     * @return HashtableString 
     */
    public function removeMeFromCommunity($itemId);

    /**
     * 
     * @param String $propertyValueId
     * @return HashtableString
     */
    public function removePropertyValue($propertyValueId);

    /**
     * ajoute ou modifie une valeur d'une propriétés
     * @param String $propertyValueId
     * @param String $propertyValue
     * @return HashtableString conteint un boolean
     */
    public function setPropertyValue($propertyValueId, $propertyValue);

    /**
     * modifie une valeur d'une propriétés
     * @param String $propertyValueId
     * @param String $visibilityGroupJSONList
     * @return HashtableString contient un boolean
     */
    public function setPropertyVisibility($propertyValueId, $visibilityGroupJSONList);

    /**
     * permet de se désinscrire de OpenM_Book
     * @return HashtableString contient un boolean
     */
    public function unRegisterMe();

    /**
     * permet de valider un utilisateur, ou validation par paires
     * nécéssite la confirmation d'un modérateur
     * @param String $userId
     * @param String $communityId
     * @return HashtableString
     */
    public function validateUser($userId, $communityId);
    
    /**
     * retourne toutes les propriétés et group ect... de l'user
     * @return HashtableString les propriétés et item(gorupe)
     */
    public function getMyData();
    
    /**
     * 
     * @param type $mailJSONList
     * @return HashtableString
     */
    public function invitPeople($mailJSONList);
    
    /**
     * 
     * @param type $type
     * @param type $url
     * @param type $message
     */
    public function signal($url, $message, $type = self::SIGNAL_TYPE_BUG);
    
    /**
     * 
     * @param type $userId
     * @param type $message
     * @param type $groupId
     * @return HashtableString
     */
    public function signalUser($userId, $message, $groupId=null);
    
    /**
     * 
     * @param type $message
     * @param type $communityId
     * @return HashtableString
     */
    public function signalCommunity($communityId, $message);
        
}

?>