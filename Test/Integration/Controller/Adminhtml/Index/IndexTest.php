<?php declare(strict_types=1);

namespace YireoTraining\ExampleLokiAdminComponents\Test\Integration\Controller\Adminhtml\Index;

use Magento\Framework\App\Response\Http as HttpResponse;
use Magento\Framework\View\Element\AbstractBlock;
use Magento\Framework\View\Element\BlockInterface;
use Magento\Framework\View\LayoutInterface;
use Magento\TestFramework\TestCase\AbstractBackendController;

/**
 * @magentoAppArea adminhtml
 */
class IndexTest extends AbstractBackendController
{
    private const MODULE = 'YireoTraining_ExampleLokiAdminComponents';

    protected function setUp(): void
    {
        parent::setUp();
        $this->resource = self::MODULE . '::form';
        $this->uri = 'backend/example_loki_admin_components/index/index';
    }

    public function testFormBlockDeclaresAclResources(): void
    {
        $this->dispatch($this->uri);

        $response = $this->getResponse();
        $this->assertInstanceOf(HttpResponse::class, $response);
        $this->assertSame(200, $response->getHttpResponseCode());

        $block = $this->getFormBlock();
        $this->assertInstanceOf(AbstractBlock::class, $block);
        $this->assertSame(self::MODULE . '::form', $block->getData('acl_resource'));
        $this->assertSame(self::MODULE . '::form', $block->getData('save_acl_resource'));
        $this->assertSame(self::MODULE . '::form', $block->getData('delete_acl_resource'));
    }

    public function testDoesNotRenderFormWithoutAdminLogin(): void
    {
        $this->_auth->logout();
        $this->dispatch($this->uri);

        $this->assertFalse($this->getFormBlock(), 'Anonymous visitors get the admin form');
    }

    private function getFormBlock(): BlockInterface|false
    {
        return $this->_objectManager->get(LayoutInterface::class)->getBlock('example_loki_admin_components.form');
    }
}
