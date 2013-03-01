<?php

Import::php("OpenM-Book.api.OpenM_Book_Const");
Import::php("util.time.Delay");

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
 * @author Gael SAUNIER
 */
interface OpenM_Book_Moderator extends OpenM_Book_Const {

    const DEFAULT_MODERATOR_VALIDITY = Delay::YEAR;
    
    /**
     * to add a moderator on an Item, you must be moderator on a parent Item
     * and this new moderator must be validated in an Item descendant
     * @param String $userId
     * @param String $communityId
     * @return HashtableString boolean
     */
    public function addCommunityModerator($userId, $communityId, $validity=null);

    /**
     * 
     * @param String $communityId
     * @return HashtableString 
     */
    public function getCommunityModerators($communityId);

    /**
     * 
     * @param String $userId
     * @param String $communityId
     * @return HashtableString boolean
     */
    public function removeCommunityModerartor($userId, $communityId);
    
    /**
     * 
     * @param String $userId
     * @param String $communityId
     * @return HashtableString
     */
    public function removeCommunityUser($userId, $communityId);
    
    /**
     * 
     * @param String $userId
     * @param String $communityId
     * @return HashtableString
     */
    public function blockUserRegistry($userId, $communityId);
    
}

?>