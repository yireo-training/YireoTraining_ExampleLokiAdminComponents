<?php declare(strict_types=1);

namespace YireoTraining\ExampleLokiAdminComponents\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory as ResultPageFactory;

class Index extends Action implements HttpGetActionInterface
{
    public const ADMIN_RESOURCE = 'YireoTraining_ExampleLokiAdminComponents::form';

    public function __construct(
        Context $context,
        private ResultPageFactory $resultPageFactory,
    ) {
        parent::__construct($context);
    }

    /**
     * @return Page
     * @throws \Exception
     */
    public function execute(): Page
    {
        $title = 'Example Loki Admin Components';

        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getLayout()->getUpdate()->addHandle('example_loki_admin_components');
        $resultPage->setActiveMenu('YireoTraining_ExampleLokiAdminComponents::index');
        $resultPage->addBreadcrumb(__($title), __($title));
        $resultPage->getConfig()->getTitle()->prepend(__($title));

        return $resultPage;
    }
}
