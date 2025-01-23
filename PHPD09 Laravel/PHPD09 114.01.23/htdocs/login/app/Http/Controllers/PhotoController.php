<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
  // 處理圖片上傳
  public function store(Request $request)
  {
      // 儲存圖片並返回圖片路徑
      $path = $request->file('photo')->store('photos', 'public');

      // 重定向到顯示圖片的頁面，並傳遞圖片檔名
      return redirect()->route('image.view', ['filename' => basename($path)]);
  }

  // 顯示上傳的圖片
  public function show($filename)
  {
      // 生成圖片的公開 URL
      $url = asset('storage/photos/' . $filename);
      // 傳遞圖片 URL 到視圖
      return view('imageView', compact('url'));
  }
}
