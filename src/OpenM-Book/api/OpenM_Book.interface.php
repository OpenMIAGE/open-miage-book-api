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
    const RETURN_USER_IS_ADMIN_PARAMETER = "UIA";

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
    const RETURN_ERROR_MESSAGE_PROPERTY_NOTFOUND_VALUE = "Property not found";

    //signal const
    const SIGNAL_TYPE_BUG = "BUG";

    /**
     * ajoute un item dans la section exemple 2001 dans M1 toulouse
     * @param type $name
     * @param type $communityParentId
     * @return HashtableString
     */
    public function addCommunity($name, $communityParentId);

    /**
     * M'ajoute dans un item passé en paramétre
     * @param String $communityId
     * @return HashtableString
     */
    public function registerMeIntoCommunity($communityId);

    /**
     * 
     * @param String $communityId
     * @param String $visibleByGroupAndCommunityIdJSONList
     * @return HashtableString
     */
    public function modifyMyVisibilityOnCommunity($communityId, $visibleByGroupAndCommunityIdJSONList);

    /**
     * retourne la liste des items fils de l'item passé en paramètre
     * @param String $communityId
     * @return HashtableString  listes des items  (nom/id)
     */
    public function getCommunity($communityId = null);

    /**
     * 
     * @param type $communityId
     */
    public function getCommunityAncestors($communityId);

    /**
     * 
     * @param type $communityId
     */
    public function getCommunityParent($communityId);

    /**
     * Retourne la liste des utilisateurs qui appartiennent à l'item (groupe) passé en paramettre
     * @param String $communityId
     * @param String $start pour la pagination
     * @param String $numberOfResult pour la pagination
     * @return HashtableString liste des utilisateur (userid, preferedName)
     */
    public function getCommunityUsers($communityId, $start = null, $numberOfResult = null);

    /**
     * Retourne la liste des utilisateurs non validés qui appartiennent à l'item (groupe) passé en paramettre
     * @param String $communityId
     * @param String $start pour la pagination
     * @param String $numberOfResult pour la pagination
     * @return HashtableString liste des utilisateur (userid, preferedName)
     */
    public function getCommunityNotValidUsers($communityId, $start = null, $numberOfResult = null);

    /**
     * me retirer d'un item(groupe)
     * @param String $itempId
     * @return HashtableString 
     */
    public function removeMeFromCommunity($communistyId);

    /**
     * permet de valider un utilisateur, ou validation par paires
     * nécéssite la confirmation d'un modérateur
     * @param String $userId
     * @param String $communityId
     * @return HashtableString
     */
    public function validateUser($userId, $communityId);

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
    public function signal($url, $message, $type = self::SIGNAL_TYPE_BUG, $id = null);

}

?>