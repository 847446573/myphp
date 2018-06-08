<?php
namespace Src\Service;

/**
 * Interface qtbase
 * @package Src\Service
 * 主流ssp接口基本类同，区别在于，有的ssp，不需要uploadAdOrgInfo，getUploadAdOrgStatus
 */
interface Sspbase {

    /**
     * @return mixed
     * 上传广告主信息
     */
    function uploadAdOrgInfo ();

    /**
     * @return mixed
     * 广告主状态获取
     */
    function getUploadAdOrgStatus ();

    /**
     * @return mixed
     * 广告创意上传
     */
    function creativeUpload ();

    /**
     * @return mixed
     * 创意状态获取
     */
    function getCreativeStatus ();


}

