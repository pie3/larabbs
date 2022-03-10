<?php

namespace App\Handlers;

use Illuminate\Support\Str;


class ImageUploadHandler
{
    // 只允许以下后缀名的图片文件上传
    protected $allowed_ext = ['png', 'jpg', 'gif', 'jpeg'];

    /**
     * 保存上传文件
     *
     * @param [Illuminate\Http\UploadedFile]] $file  上传的文件对象
     * @param [string] $folder  保存目标的文件夹名
     * @param [string] $file_prefix  文件前缀
     * @return 'false'|array
     */
    public function save($file, $folder, $file_prefix)
    {
        // 构建存储的文件夹规则，值如：uploads/images/avatars/202203/10/
        // 文件切割能让查找效率更高。
        $folder_name = "uploads/images/$folder/" . date('Ym/d', time());

        // 文件具体存储的物理路径， `public_path()` 获取的是 `public` 文件夹的物理路径。
        // 值如：/mnt/d/docker_env/larabbs/public/uploads/images/avatars/202203/10/
        $upload_patch = public_path() . '/' . $folder_name;

        // 获取文件的后缀名，因图片从剪贴板里黏贴时后缀为空，所以此处确保后缀一直存在
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关模型的 ID
        // 值如：1_1493521050_7BVc9v9ujP.png
        $filename = $file_prefix . '_' . time() . '_' . Str::random(10) . '.' . $extension;

        // 如果上传的不是允许的后缀名图片文件，将终止操作
        if (!in_array($extension, $this->allowed_ext)) {
            return false;
        }

        // 将图片移动到我们的目标存储路径中
        $file->move($upload_patch, $filename);

        return [
            'path' => config('app.url') . '/' . $folder_name . '/' . $filename,
        ];
    }
}
