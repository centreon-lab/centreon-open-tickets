<?php
/*
 * Copyright 2015-2019 Centreon (http://www.centreon.com/)
 *
 * Centreon is a full-fledged industry-strength solution that meets 
 * the needs in IT infrastructure and application monitoring for 
 * service performance.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0  
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,*
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

require_once __DIR__ . "/../../../../../class/centreonWidget/Params/List.class.php";

class CentreonWidgetParamsConnectorOpenTicketsRule extends CentreonWidgetParamsList
{
    public function __construct($db, $quickform, $userId)
    {
        parent::__construct($db, $quickform, $userId);
    }

    public function getListValues($paramId)
    {
        static $tab;

        if (!isset($tab)) {
            $query = "SELECT rule_id, `alias`
                          FROM mod_open_tickets_rule
                          WHERE `activate` = '1'";
            $query .= " ORDER BY `alias`";
            $res = $this->db->query($query);
            $tab = array(null => null);
            while ($row = $res->fetch()) {
                $tab[$row['rule_id']] = $row['alias'];
            }
        }
        return $tab;
    }
}
