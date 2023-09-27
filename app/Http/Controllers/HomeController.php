<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
 
class HomeController extends Controller
{
    public function index()
    {      
        return view('home.index');
    }
    public function getShortLink(Request $re)
    {
        // Thay thế bằng App ID và API Key của bạn
        $appId = '17329990038';
        $apiKey = '5WJP4IQX5QXGC6GH3KIBY4GR2KHELEGV';
        $secret = '5WJP4IQX5QXGC6GH3KIBY4GR2KHELEGV';
        $s1 = $re->input('s1') ? $re->input('s1'): 's1';
        $s2 = $re->input('s2') ? $re->input('s2'): 's2';
        $s3 = $re->input('s3') ? $re->input('s3'): 's3';
        $s4 = $re->input('s4') ? $re->input('s4'): 's4';
        $s5 = $re->input('s5') ? $re->input('s5'): 's5';
       
        $queryArray = [
            'query' => 'mutation{
                generateShortLink(input:{
                    originUrl:"'.$re->input('originUrl').'",
                    subIds:["'.$s1.'","'.$s2.'","'.$s3.'","'.$s4.'","'.$s5.'"]
                }){
                    shortLink
                }
            }'
        ];
        // Chuyển payload thành chuỗi JSON
        $query = json_encode($queryArray);        
        // Tạo timestamp (Unix timestamp)
        $timestamp = time();
        
        // Thay thế bằng secret key của bạn
        
        // Tạo credential
        $credential = $appId;
        
        // Tạo signature
        $signature = hash('sha256', $credential . $timestamp . $query . $secret);
        
        // Tạo header Authorization
        $authorizationHeader = "SHA256 Credential=$credential, Timestamp=$timestamp, Signature=$signature";
        
        // Gửi yêu cầu HTTP
        $response = Http::withHeaders([
            'Authorization' => $authorizationHeader,
            'Content-Type' => 'application/json',
        ])->post('https://open-api.affiliate.shopee.vn/graphql', $queryArray);
        
        if ($response->failed()) {
            // Xử lý lỗi nếu cần
        }
        
        // Trích xuất dữ liệu từ phản hồi
        $data = $response->json();
        $shortLink = $data['data']['generateShortLink']['shortLink'];
        return $shortLink;
        
    }
}