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
interface OpenM_Book_User extends OpenM_Book_Const {

    const RETURN_USER_PROPERTY_LIST_PARAMETER = "UPL";
    const RETURN_USER_GROUP_PROPERTY_VISIBILITY_LIST_PARAMETER = "PGVL";
    const RETURN_USER_PROPERTY_ID_PARAMETER = "PID";
    const RETURN_USER_PROPERTY_VALUE_ID_PARAMETER = "PVID";
    const RETURN_USER_PROPERTY_NAME_PARAMETER = "UPN";
    const RETURN_USER_FIRST_NAME_PARAMETER = "UFN";
    const RETURN_USER_LAST_NAME_PARAMETER = "ULN";
    const RETURN_USER_PROPERTY_VALUE_PARAMETER = "UPV";
    const RETURN_USER_IS_ADMIN_PARAMETER = "UIA";
    const RETURN_USER_BIRTHDAY_PARAMETER = "UBI";
    const RETURN_USER_BIRTHDAY_DISPLAY_YEAR_PARAMETER = "UBDY";

    //prefiled value
    const FIRST_NAME_PROPERTY_VALUE_ID = -1;
    const LAST_NAME_PROPERTY_VALUE_ID = -2;
    const PHOTO_ID_PROPERTY_VALUE_ID = -3;
    const DEFAULT_EMAIL_PROPERTY_VALUE_ID = -4;
    const BIRTHDAY_ID_PROPERTY_VALUE_ID = -5;
    const AGE_LIMIT_TO_REGISTER = 13;

    //property pattern
    const PROPERTY_NAME_PATTERN = "/^[a-z](([a-z]|\.)*[a-z])?$/";

    //error message
    const RETURN_ERROR_MESSAGE_USER_ALREADY_REGISTERED_VALUE = "User already registered";
    const RETURN_ERROR_MESSAGE_YOU_ARE_TOO_YOUNG_VALUE = "You're too young to register, the age limit is 13 years old";
    const RETURN_ERROR_MESSAGE_PROPERTY_NOTFOUND_VALUE = "Property not found";

    //error message on register
    const RETURN_ERROR_CODE_FIRST_NAME_BAD_FORMAT_VALUE = 101;
    const RETURN_ERROR_CODE_LAST_NAME_BAD_FORMAT_VALUE = 102;
    const RETURN_ERROR_CODE_BIRTHDAY_BAD_FORMAT_VALUE = 103;
    const RETURN_ERROR_CODE_MAIL_BAD_FORMAT_VALUE = 104;
    const RETURN_ERROR_CODE_TO_YOUNG_VALUE = 105;

    /**
     * retourne toutes les propriétés et group ect... de l'user
     * @return HashtableString les propriétés et item(gorupe)
     */
    public function buildMyData();

    /**
     * ajoute la valeur d'une propriétés
     * @param String $propertyId
     * @param String $propertyValue
     * @param String $visibilityGroupJSONList
     * @return HashtableString contenant l'ID de la valeur
     */
    public function addPropertyValue($propertyId, $propertyValue);

    /**
     * retourne les porporité de l'utilisateur passée en parametre, que j'ai le droit de voir
     * @param String $userId id de l'utilisateur pour lequel récupérer les propriétées
     * @param boolean|String $basicOnly
     * @return HashtableString liste des propriétés avec leur valeurs
     */
    public function getUserProperties($userId = null, $basicOnly = null);

    /**
     * 
     * @param String $propertyValueId
     * @return HashtableString
     */
    public function removePropertyValue($propertyValueId);

    /**
     * m'enregistre dans OpenM_Book
     * @param String $firstName
     * @param String $lastName
     * @param String $birthDay
     * @param String $mail
     * @return HashtableString 
     */
    public function registerMe($firstName, $lastName, $birthDay, $mail);

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
     * 
     * @param type $mailJSONList
     * @return HashtableString
     */
    public function invitPeople($mailJSONList);
}

?>