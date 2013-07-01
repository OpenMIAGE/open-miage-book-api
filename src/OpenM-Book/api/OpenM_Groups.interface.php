<?php

Import::php("OpenM-Book.api.OpenM_Book_Const");

/**
 * Used to manage user personnal groups
 * Those groups could be used to manage permissions (for visibility for example).
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
    //errors

    const RETURN_ERROR_MESSAGE_USER_NOT_IN_GROUPS_VALUE = "user not in groups";
    const RETURN_ERROR_MESSAGE_NOT_YOUR_PERSONAL_GROUP_VALUE = "not your personal groups";
    const RETURN_ERROR_MESSAGE_FORBIDDEN_OPERATION_INFINIT_CYCLE_ERROR_VALUE = "forbidden operation, you try to make an infinit cycle";
    const RETURN_ERROR_MESSAGE_USER_ALREADY_IN_GROUP_VALUE = "user already in group";
    const RETURN_ERROR_MESSAGE_GROUP_NOT_FOUND_IN_GROUP_VALUE = "group not found in group";
    const RETURN_ERROR_MESSAGE_USER_NOT_FOUND_IN_GROUP_VALUE = "user not found in group";

    //returns
    const RETURN_GROUP_LIST_PARAMETER = "GLP";
    const RETURN_GROUP_ID_PARAMETER = "GID";
    const RETURN_GROUP_NAME_PARAMETER = "GNA";
    const RETURN_GROUP_TYPE_PARAMETER = "GTP";
    const RETURN_RESULT_LIST_PARAMETER = "RLP";
    const RETURN_RESULT_ID_PARAMETER = "RID";
    const RETURN_RESULT_NAME_PARAMETER = "RNA";
    const RETURN_RESULT_TYPE_PARAMETER = "RTY";
    const RETURN_RESULT_TYPE_USER_VALUE = "U";
    const RETURN_RESULT_TYPE_GROUP_VALUE = "G";
    const RETURN_USER_IN_GROUP_PARAMETER = "UIG";
    const RETURN_COMMUNITY_ANCESTORS_LIST = "CAL";
    const RETURN_USER_IN_GROUP_TRUE_VALUE = self::TRUE_PARAMETER_VALUE;
    const RETURN_USER_IN_GROUP_FALSE_VALUE = self::FALSE_PARAMETER_VALUE;

    /**
     * Used to create a personnal group
     * @param String $groupName is name of group
     * @return HashtableString contains group id
     */
    public function createGroup($groupName);

    /**
     * used to remove a personnal group
     * @param int $groupId is the id of group to remove
     * @return HashtableString contains OK if group exists
     */
    public function removeGroup($groupId);

    /**
     * used to rename a group
     * @param int $groupId is the id of group to rename
     * @param String $groupName is new name of group
     * @return HashtableString contains OK
     */
    public function renameGroup($groupId, $groupName);

    /**
     * used to add a group into another group
     * @param int $groupId is the id of group source you want to add in another group
     * @param int $groupIdTarget is the id of group you want to add another group into
     */
    public function addGroupIntoGroup($groupId, $groupIdTarget);

    /**
     * used to remove a group from another group
     * @param int $groupId is id of group to remove from group
     * @param int $groupParentId is id of group that contain group to remove from
     * @return HashtableString contains OK if group was realy into the group
     */
    public function removeGroupFromGroup($groupId, $groupParentId);

    /**
     * used to add user into another group
     * @param int $userId is id of user you want to add in group
     * @param int $groupId is id of group you want to add a user into
     * @return HashtableString contains OK if group group and user exist and the group is your's
     */
    public function addUserIntoGroup($userId, $groupId);

    public function removeUserFromGroup($userId, $groupId);

    public function getMyGroups();

    public function getCommunities($userId = null, $withAncestors = null);

    public function getMyCommunitiesAndGroups();

    public function getUsersFromGroup($groupId);

    public function getGroupsFromGroup($groupId);

    public function search($terms, $maxNumberResult = null, $userOnly = null);

    public function isUserInGroups($groupIdJSONList);
}

?>