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
 * @author Nicolas Rouzeaud & Gael SAUNIER
 */
interface OpenM_Book_Admin extends OpenM_Book_Const {
    //errors

    const RETURN_ERROR_MESSAGE_NOT_ENOUGH_RIGHTS_VALUE = "Not enough rights, you must be an administrator.";

    //branch return parameters
    const RETURN_COMMUNITY_NAME_REGEXP_PARAMETER = "REG";
    const RETURN_MANAGE_SYNONYMS_PARAMETER = "MSP";
    const RETURN_USER_CAN_ADD_COMMUNITY_PARAMETER = "UCAI";
    const RETURN_NEED_VALIDATION_PARAMETER = "NVP";
    const RETURN_MANAGE_PERIOD_PARAMETER = "MAP";
    const RETURN_PARENT_BRANCH_PARAMETER = "PBP";
    const RETURN_BRANCH_PARAMETER = "BP";
    const RETURN_BRANCH_CHILDS_PARAMETER = "BCP";
    const RETURN_BRANCH_ID_PARAMETER = "BID";
    const RETURN_BRANCH_NAME_PARAMETER = "BNP";
    
    //return admin parameters
    const RETURN_ADMIN_LIST_PARAMETER = "ALP";
    const RETURN_ADMIN_NAME = "AN";

    //branch parameters
    const COMMUNITY_NAME_REGEXP_PARAMETER = self::RETURN_COMMUNITY_NAME_REGEXP_PARAMETER;
    const MANAGE_SYNONYMS_PARAMETER = self::RETURN_MANAGE_SYNONYMS_PARAMETER;
    const USER_CAN_ADD_COMMUNITY_PARAMETER = self::RETURN_USER_CAN_ADD_COMMUNITY_PARAMETER;
    const NEED_VALIDATION_PARAMETER = self::RETURN_NEED_VALIDATION_PARAMETER;
    const MANAGE_PERIOD_PARAMETER = self::RETURN_MANAGE_PERIOD_PARAMETER;
    const BRANCH_NAME_PARAMETER = self::RETURN_BRANCH_NAME_PARAMETER;

    //default values
    const RETURN_USER_CAN_ADD_COMMUNITY_PARAMETER_VALUE = self::FALSE_PARAMETER_VALUE;
    const COMMUNITY_NAME_REGEXP_DEFAULT_PARAMETER_VALUE = ".*";
    const RETURN_MANAGE_SYNONYMS_PARAMETER_VALUE = self::FALSE_PARAMETER_VALUE;

    /**
     * 
     * @param type $branchId
     * @return HashtableString
     */
    public function getTree($branchId = null);

    /**
     * 
     * @param String $branchIdParent
     * @param String $name
     * @return HashtableString
     */
    public function addBranch($branchIdParent, $name);

    /**
     * supprime une section et tous se qu'elle contient
     * @param String $branchId
     * @return HashtableString
     */
    public function removeBranch($branchId);

    /**
     * modifie une valeur d'une propiétés de la section
     * @param String $branchId
     * @param String $propertyName
     * @param String $properyValue
     * @return HashtableString
     */
    public function setBranchProperty($branchId, $propertyName, $propertyValue);

    /**
     * retourne la liste des propriétées avec leurs valeurs
     * @param type $branchId
     * @return HashtableString liste de nom/valeur des propiétes
     */
    public function getBranchProperties($branchId);

    /**
     * to add an admin, you must be an admin
     * @param String $userId is ID of user you whant to set admin status
     * @return HashtableString
     */
    public function addAdmin($userId);

    /**
     * to remove an admin, you must be an admin
     * @param String $userId is ID of user you whant to unset admin status
     * @return HashtableString
     */
    public function removeAdmin($userId);

    /**
     * 
     * @return HashtableString
     */
    public function getAdmins();

    /**
     * 
     * @return HashtableString
     */
    public function install();
}

?>