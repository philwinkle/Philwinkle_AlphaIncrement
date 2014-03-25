Philwinkle_AlphaIncrement
==

Increment id's for sales orders are assumed to be numeric, though there is no schema requirement in eav_entity_store for a prefix being an int. In the cases where the prefix is alphnum (as the db schema defines a varchar(50)) the isOrderIncrementIdUsed() method, when casting to int, will always evaluate as 0.

When the value is cast and returns 0 as the increment_id in the where clause, concurrent orders on high-traffic stores may choose identical increment ids, causing some payment gateways to error on authorize/capture.

Already part of Magento 2
--

This patch was submitted as a PR to Magento 2 in late 2013 and is now part of core. Until M2 lands, use this module to patch the behavior in Magento 1.x

License
==

&copy; 2013 Phillip Jackson

Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.