<?php

Import::php("OpenM-Book.api.OpenM_Book_Const");
Import::php("util.time.Delay");

/**
 *
 * @package OpenM  
 * @subpackage OpenM\OpenM-Book\api 
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