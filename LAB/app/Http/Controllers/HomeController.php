<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index(){
        $viewData = [];
        $viewData["title"] = "Trang chủ";
        return view("home.index")->with("viewData",$viewData);
    }
    public function about(){
        $viewData= [];
        $viewData["title"] = "Trang giới thiệu";
        $viewData["subtitle"] = "Giới thiệu";
        $viewData["description"] = "Đây là trang giới thiệu!";
        $viewData["author"] = "Phát triển bởi: Nguyễn Nhất Tâm";
        return view("home.about")->with("viewData",$viewData);
    }
}
