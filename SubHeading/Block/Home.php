<?php
namespace Bay20\SubHeading\Block;
class Home extends \Magento\Framework\View\Element\Template
{
    protected function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
    public function getContentForDisplay()
    {
        $objectManagerCms = \Magento\Framework\App\ObjectManager::getInstance();
        $cmsPage = $objectManagerCms->get('\Magento\Cms\Model\Page');

        $cms_identifier=$cmsPage->getIdentifier();
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $ModelPageFactory = $objectManager->create('\Magento\Cms\Model\PageFactory');
        $page_title = $ModelPageFactory->create()->load($cms_identifier)->getSubTitle();
        return $page_title;
    }
}
