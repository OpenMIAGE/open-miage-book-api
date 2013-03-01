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

    const SECTION_PROPERTY_USER_CAN_ADD_ITEM_NAME = "user.can.add.item";
    const SECTION_PROPERTY_ITEM_NAME_REGEXP_NAME = "reg.exp";
    const SECTION_PROPERTY_MANAGE_SYNONYMS_NAME = "manage.synonyms";
    const SECTION_PROPERTY_USER_CAN_ADD_ITEM_DEFAULT_VALUE = OpenM_Service::FALSE_PARAMETER_VALUE;
    const SECTION_PROPERTY_ITEM_NAME_REGEXP_DEFAULT_VALUE = ".*";
    const SECTION_PROPERTY_MANAGE_SYNONYMS_DEFAULT_VALUE = OpenM_Service::FALSE_PARAMETER_VALUE;
    const RETURN_ERROR_MESSAGE_NOT_ENOUGH_RIGHTS_VALUE = "Not enough rights, you must be an administrator.";
    const RETURN_PARENT_SECTION_PARAMETER = "PSP";
    const RETURN_SECTION_PARAMETER = "SP";
    const RETURN_SECTION_CHILDS_PARAMETER = "SC";
    const RETURN_SECTION_ID_PARAMETER = "SID";
    const RETURN_SECTION_NAME_PARAMETER = "SN";

    /**
     * 
     * @param type $branchId
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
     * retire un item d'une section
     * @param String $communityId
     * @return HashtableString 
     */
    public function removeCommunity($communityId);

    /**
     * supprime une section et tous se qu'elle contient
     * @param String $branchId
     * @return HashtableString boolean
     */
    public function removeBranch($branchId);

    /**
     * modifie une valeur d'une propiétés de la section
     * @param String $sectionId
     * @param String $propertyName
     * @param String $properyValue
     * @return HashtableString boolean
     */
    public function setSectionProperty($sectionId, $propertyName, $properyValue);

    /**
     * retourne la liste des propriétées avec leurs valeurs
     * @param type $sectionId
     * @return HashtableString liste de nom/valeur des propiétes
     */
    public function getSectionProperties($sectionId);

    /**
     * to add an admin, you must be an admin
     * @param String $userId is ID of user you whant to set admin status
     * @return HashtableString
     */
    public function addAdmin($userId);

    /**
     * to remove an admin, you must be an admin
     * @param String $userId is ID of user you whant to unset admin status
     */
    public function removeAdmin($userId);

    /**
     * to 
     */
    public function getAdminList();

    /**
     * 
     */
    public function install();
}

?>