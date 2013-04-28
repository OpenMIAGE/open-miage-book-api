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