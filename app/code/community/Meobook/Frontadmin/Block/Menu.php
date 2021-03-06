<?php
/**
 *
 * @author Minh Tran <minhtc256[at]gmail[dot]com>
 *
 */
class Meobook_Frontadmin_Block_Menu extends Mage_Adminhtml_Block_Page_Menu
{

	/**
     * Initialize template
     *
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_url = Mage::getModel('meobookfrontadmin/url');
    }

    /**
     * prevent caching block
     *
     */
    public function getCacheLifetime()
    {
        return 0;
    }

    /**
     * prevent caching block 
     *
     */
    public function getCacheKeyInfo()
    {
        return 0;
    }

	/**
     * Check is Allow menu item for admin user
     *
     * @param string $resource
     * @return bool
     */
    protected function _checkAcl($resource)
    {
        try {
            $res =  Mage::getSingleton('meobookfrontadmin/session')->checkAdminAcl($resource);
        } catch (Exception $e) {
            return false;
        }
        return $res;
    }

    /**
     * Prepare html output
     *
     * @return string
     */
    protected function _toHtml()
    {
    	if(Mage::getSingleton('meobookfrontadmin/session')->isAdminLoggedIn()) 
    	{
            return parent::_toHtml();
    	}
    }

}
