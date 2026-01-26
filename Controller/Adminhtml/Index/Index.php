<?php declare(strict_types=1);

namespace YireoTraining\ExampleLokiAdminComponents\Controller\Adminhtml\Index;

use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory as ResultPageFactory;

class Index implements HttpGetActionInterface
{
    /**
     * ACL resource
     */
    const ADMIN_RESOURCE = 'YireoTraining_ExampleLokiAdminComponents::grid';

    public function __construct(
        private ResultPageFactory $resultPageFactory,
    ) {
    }

    /**
     * Index action
     *
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
