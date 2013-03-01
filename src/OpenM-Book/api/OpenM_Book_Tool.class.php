<?php

Import::php("util.JSON.OpenM_MapConvertor");
Import::php("OpenM-Book.api.OpenM_Groups");

/**
 * Description of OpenM_Book_Tool
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
 * @author Gaël Saunier & Nico Rouseaud
 */
class OpenM_Book_Tool {

    public static function isGroupIdValid($groupId) {
        if (is_int($groupId))
            return true;
        if (!String::isString($groupId))
            return false;
        return RegExp::preg(OpenM_Groups::GROUP_ID_PARAMETER_PATERN, "$groupId");
    }

    public static function isUserIdValid($userId) {
        if (is_int($userId))
            return true;
        if (!String::isString($userId))
            return false;
        return RegExp::preg(OpenM_Groups::USER_ID_PARAMETER_PATERN, "$userId");
    }

   
    
    
    /**
     * transforme un array (simple) en chaine Json
     * array simple : que des valeurs au format String
     * @param array $array
     * @return String
     * @throws InvalidArgumentException
     */
    public static function simpleArrayToJSON($array) {
        foreach ($array as $value) {
            if (!String::isString($value) && !is_numeric($value))
                throw new InvalidArgumentException("array must be a simple array (one level)");
        }
        return OpenM_MapConvertor::arrayToJSON($array);
    }

    public static function strlwr($string) {
        $normalizeChars = array(
            'Á' => 'a', 'À' => 'a', 'Â' => 'a', 'Ã' => 'a', 'Å' => 'a', 'Ä' => 'a', 'Æ' => 'ae', 'Ç' => 'c',
            'É' => 'E', 'È' => 'e', 'Ê' => 'e', 'Ë' => 'e', 'Í' => 'i', 'Ì' => 'i', 'Î' => 'i', 'Ï' => 'i', 'Ð' => 'eth',
            'Ñ' => 'n', 'Ó' => 'o', 'Ò' => 'o', 'Ô' => 'o', 'Õ' => 'o', 'Ö' => 'o', 'Ø' => 'o',
            'Ú' => 'u', 'Ù' => 'u', 'Û' => 'u', 'Ü' => 'u', 'Ý' => 'y',
            'á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'å' => 'a', 'ä' => 'a', 'æ' => 'ae', 'ç' => 'c',
            'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e', 'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'eth',
            'ñ' => 'n', 'ó' => 'o', 'ò' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o',
            'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u', 'ý' => 'y',
            'ß' => 'sz', 'þ' => 'thorn', 'ÿ' => 'y'
        );

        return strtolower(strtr($string, $normalizeChars));
    }

    public static function getUserName($firtName, $lastName){
        return $firtName." ".$lastName;
    }
}

?>