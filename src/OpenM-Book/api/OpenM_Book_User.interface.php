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
interface OpenM_Book_User {
    
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
     * @return HashtableString 
     */
    public function registerMe($firstName, $lastName, $birthDay);

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

}

?>