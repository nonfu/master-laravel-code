<?php
//echo '<pre>';
//var_dump($_FILES);

// 获取上传文件
$image = $_FILES['image'];
// 处理文件上传错误
if ($image['error'] != UPLOAD_ERR_OK) {
    switch ($image['error']) {
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            trigger_error('上传文件过大', E_USER_ERROR);
            break;
        case UPLOAD_ERR_PARTIAL:
            trigger_error('上传文件不完整', E_USER_ERROR);
            break;
        case UPLOAD_ERR_NO_FILE:
            trigger_error('没有文件被上传', E_USER_ERROR);
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            trigger_error('未指定或找不到临时目录', E_USER_ERROR);
            break;
        case UPLOAD_ERR_CANT_WRITE:
            trigger_error('上传目录无法写入', E_USER_ERROR);
            break;
        default:
            trigger_error('其他文件上传错误', E_USER_ERROR);
            break;
    }
}

if (!in_array($image['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
    trigger_error('只支持 jpg/jpeg、png、gif 格式图片上传', E_USER_WARNING);
}

if ($image['size'] > 1 * 1024 * 1024) {
    trigger_error('上传文件不能超过 1M', E_USER_WARNING);
}

// 设置文件上传路径为 Web 根目录下的 images 子目录
$uploaddir =  __DIR__ . '/images/';
$filepath = $uploaddir . $image['name'];

// 移动上传文件到指定位置
if (move_uploaded_file($image['tmp_name'], $filepath)) {
    // 上传成功，则在页面预览上传的图片
    echo '<font color="green">文件上传成功</font><hr>';
    $webpath = '/images/' . $image['name'];
    echo '<img src="' . $webpath . '">';
} else {
    echo '<font color="red">文件上传失败，请重试!</font>';
}



