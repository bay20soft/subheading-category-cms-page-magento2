<?php
namespace Bay20\SubHeading\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        //Category Attribute Create Script
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'sub_heading',
            [
                'type'         => 'varchar',
				'label'        => 'Sub Heading',
				'input'        => 'text',
				'sort_order'   => 100,
				'source'       => '',
				'global'       => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_STORE,
				'visible'      => true,
				'required'     => false,
				'user_defined' => false,
				'default'      => null,
				'group'        => '',
				'backend'      => '',
				'used_in_product_listing' => true,
                'visible_on_front' => false
            ]
        );

        $setup->getConnection()->addColumn(
            $setup->getTable('cms_page'),
            'sub_title',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length' => '2M',
                'nullable' => true,
                'comment' => 'Sub Title'
            ]
        );

        $setup->endSetup();
    }
	
}
	
