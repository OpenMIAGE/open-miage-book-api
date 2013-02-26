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
 * @author Gaël Saunier
 */
interface OpenM_Groups extends OpenM_Book_Const {

    const RETURN_ERROR_MESSAGE_USER_NOT_IN_GROUPS_VALUE = "user not in groups";
    const RETURN_ERROR_MESSAGE_NOT_YOUR_PERSONAL_GROUP_VALUE = "not your personal groups";
    const RETURN_ERROR_MESSAGE_FORBIDDEN_OPERATION_INFINIT_CYCLE_ERROR_VALUE = "forbidden operation, you try to make an infinit cycle";
    const RETURN_ERROR_MESSAGE_USER_ALREADY_IN_GROUP_VALUE = "user already in group";
    const RETURN_ERROR_MESSAGE_GROUP_NOT_FOUND_IN_GROUP_VALUE = "group not found in group";
    const RETURN_ERROR_MESSAGE_USER_NOT_FOUND_IN_GROUP_VALUE = "user not found in group";
    
    const RETURN_GROUP_LIST_PARAMETER = "GROUP_LIST";
    const RETURN_GROUP_ID_PARAMETER = "ID";
    const RETURN_GROUP_NAME_PARAMETER = "GNA";
    const RETURN_GROUP_TYPE_PARAMETER = "GT";
    const RETURN_RESULT_LIST_PARAMETER = "RESULT_LIST";
    const RETURN_RESULT_ID_PARAMETER = "ID";
    const RETURN_RESULT_NAME_PARAMETER = "NA";
    const RETURN_RESULT_TYPE_PARAMETER = "TY";
    const RETURN_RESULT_TYPE_USER_VALUE = "U";
    const RETURN_RESULT_TYPE_GROUP_VALUE = "G";
    const RETURN_USER_IN_GROUP_PARAMETER = "UIG";
    const RETURN_USER_IN_GROUP_TRUE_VALUE = "TRUE";
    const RETURN_USER_IN_GROUP_FALSE_VALUE = "FALSE";
    
    public function createGroup($groupName);

    public function removeGroup($groupId);

    public function renameGroup($groupId, $groupName);

    public function addGroupIntoGroup($groupId, $groupIdTarget);

    public function removeGroupFromGroup($groupId, $groupParentId);

    public function addUserIntoGroup($userId, $groupId);

    public function removeUserFromGroup($userId, $groupId);

    public function getMyPersonalGroups();

    public function getMyBookGroups();

    public function getMyGroups();
    
    public function getUsersFromPersonalGroup($groupId);
    
    public function getGroupsFromPersonalGroup($groupId);

    public function search($terms, $maxNumberResult=null, $userOnly=null);

    public function isUserInGroups($groupIdJSONList);
}

?>