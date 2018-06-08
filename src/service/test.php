<?php
/**
 * Created by PhpStorm.
 * User: jueqi
 * Date: 2018/6/8
 * Time: 11:07
 */



if ($data['media_id'] == $this->config['QINGTING_MEDIA_ID'][0]) {

    //判断是否已上传

    $qtFmUploadInfo = SspAdverInfoSyncQingtingFm::getQingTingFm($orgId);
    if (empty($qtFmUploadInfo)) { //说明未进行广告主上传
        //广告主上传
        $result = $this->creativeService->qingtingUpload($data);
        return $result;
    }

    if ($qtFmUploadInfo['status'] == 1) { //1:待审核，2:通过，3:拒绝, 4:提交失败,5：进行中
        //广告主状态获取
        $result = $this->creativeService->qingtingUploadAdvertistGet($data);
    } elseif ($qtFmUploadInfo['status'] == 3) { //已拒绝
        //$this->rspJson(9009,[],'已拒绝,不能再进行请求');  //已拒绝
        //广告主状态获取
        $result = $this->creativeService->qingtingUploadAdvertistGet($data);
    }  elseif ($qtFmUploadInfo['status'] == 4 && $qtFmUploadInfo['step'] == 1) { //提交失败 step 1
        //广告主上传
        $result = $this->creativeService->qingtingUpload($data);
    } elseif ($qtFmUploadInfo['status'] == 4 && $qtFmUploadInfo['step'] == 2) { //提交失败 step 2
        //广告主状态获取
        $result = $this->creativeService->qingtingUploadAdvertistGet($data);
    }  elseif ($qtFmUploadInfo['status'] == 5 ) { //进行中
        //广告主状态获取
        $result = $this->creativeService->qingtingUploadAdvertistGet($data);
    } elseif ($qtFmUploadInfo['status'] == 2) {
        $creativeInfo = SspCreativeInfoSync::sspCreativeInfo($data);
        if (empty($creativeInfo)) {
            //创意上传
            $result = $this->creativeService->qingtingCreativeUpload($data);
            return $result;
        }
        if ($creativeInfo['status'] == 5) {
            //创意审核结果
            $result = $this->creativeService->qingtingCreativeGet($data);
        } elseif ($creativeInfo['status'] == 2) { //已通过
            $this->rspJson(9009,[],'已审核通过，无需要操作');
        } elseif ($creativeInfo['status'] == 3) {//
            //$this->rspJson(9009,[],'已拒绝');  //已拒绝
            //创意审核结果
            $result = $this->creativeService->qingtingCreativeGet($data);
        } elseif ($creativeInfo['status'] == 4 && $creativeInfo['step']==1) {
            //创意上传
            $result = $this->creativeService->qingtingCreativeUpload($data);
        } elseif ($creativeInfo['status'] == 4 && $creativeInfo['step']==2) {
            //创意审核结果
            $result = $this->creativeService->qingtingCreativeGet($data);
        }
    }


    return $result;

}