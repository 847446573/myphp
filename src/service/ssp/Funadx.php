<?php
namespace Src\Service\ssp;

/**
 * 风行ssp 接入
 */
use Src\Service\Sspbase;
class  Funadx  implements  Sspbase {

    /**
     * @var array
     * $config['dspid']
     * $config['token']
     * $config['url']
     */
    public $configArray;

    /**
     * @var array
     * $arg 下面各操作需要的参数
     */
    public $arg;
    public function __construct(array $config,array $arg)
    {
        $this->configArray  = $config;
        $this->arg          = $arg;
    }


    /**
     * @return mixed|void
     * 广告主信信息上传
     */
   public function uploadAdOrgInfo()
   {
       //
       // TODO: Implement uploadAdOrgInfo() method.
       return 'funAdxtest';

   }

    /**
     * @return mixed|void
     * 广告主信息上传状态获取
     */
    public function getUploadAdOrgStatus()
    {
        // TODO: Implement getUploadAdOrgStatus() method.
        return 'funAdxtest';
    }

    /**
     * @return mixed|void
     * 创意上传
     */
    public function creativeUpload()
    {
        // TODO: Implement creativeUpload() method.
        return 'funAdxtest';
    }

    /**
     * @return mixed|void
     * 创意上传，状态获取
     */
    public function getCreativeStatus()
    {
        // TODO: Implement getCreativeStatus() method.
        return 'funAdxtest';
    }


}
