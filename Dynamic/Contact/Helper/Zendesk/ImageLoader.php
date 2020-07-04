<?php
declare(strict_types=1);

namespace Dynamic\Contact\Helper\Zendesk;

use Magento\Framework\File\UploaderFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Filesystem\DirectoryList;

class ImageLoader
{
    /**
     * @var UploaderFactory
     */
    private $uploaderFactory;

    /**
     * @var DirectoryList
     */
    private $directory;

    public function __construct(
        UploaderFactory $uploaderFactory,
        DirectoryList $directory
    ) {
        $this->uploaderFactory = $uploaderFactory;
        $this->directory = $directory;
    }

    public function upload(string $input, $destinationFolder = '') : string
    {
        if (!$destinationFolder) {
            $destinationFolder = $this->directory->getPath('media');
        }
        $uploader = $this->uploaderFactory->create(['fileId' => $input]);
        $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
        $uploader->setAllowRenameFiles(true);
        $uploader->setFilesDispersion(true);
        $uploader->setAllowCreateFolders(true);
        $result = $uploader->save($destinationFolder);

        return $result['name'];
    }
}
