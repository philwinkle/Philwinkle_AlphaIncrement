<?php

/**
 * Rewrite quote model for Alpha-prefixed increment_ids
 * @see  Mage_Sales_Model_Resource_Quote
 * @author Phillip Jackson <philwinkle@gmail.com>
 */

class Philwinkle_AlphaIncrement_Model_Resource_Quote extends Mage_Sales_Model_Resource_Quote
{

    /**
     * Check is order increment id use in sales/order table
     *
     * @param int $orderIncrementId
     * @return boolean
     */
    public function isOrderIncrementIdUsed($orderIncrementId)
    {
        $adapter   = $this->_getReadAdapter();
        $bind      = array(':increment_id' => $orderIncrementId);
        $select    = $adapter->select();
        $select->from($this->getTable('sales/order'), 'entity_id')
            ->where('increment_id = :increment_id');
        $entity_id = $adapter->fetchOne($select, $bind);
        if ($entity_id > 0) {
        	if(Mage::getConfig('alphaincrement/log/log_on_collision')){
        		Mage::log("Resource Entity :: Reserved Order Id collision detected",false,'increment_id.log');
        	}
            return true;
        }

        return false;
    }

}