<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invoice;
use Goutte\Client;
use Illuminate\Support\Str;

class InvoiceUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:invoice-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $list = Invoice::where('update_trangthai', 0)->get();

         // Khởi tạo Goutte Client
         $proxyList = [
            'http://194.15.34.245:8080',
            'http://194.15.34.245:8081',
            'http://194.15.34.245:8082',
            'http://194.15.34.245:8084',
            'http://104.28.205.70:8080',
            'http://104.28.205.72:8080',
            'http://104.28.237.72:8080',
            // Thêm các địa chỉ IP proxy khác nếu cần
        ];
    
        // Khởi tạo Goutte Client
        $client = new Client();
        $requestCount = 0; // Đếm số lượng request
        $num = 0;
         foreach($list as $item){
            // Gửi HTTP request và lấy HTML của trang web
            $slug = Str::slug($item->nbten);
            $currentProxy = $proxyList[$num];
            $crawler = $client->request('GET', 'https://masothue.com/' . $item->nbmst . '-' . $slug, [], [], ['HTTP_PROXY' => $currentProxy]);
            // Xử lý dữ liệu ở đây
            $text = '';
            $filter = $crawler->filter('table.table-taxinfo');
            if( $filter->count()  > 0) {
                $text = $filter->text();
            }
            if($text) {
              

                $startPos = strpos($text, 'Tình trạng');
                if ($startPos !== false) {
                    $endPos = strpos($text, 'Cập nhật mã số thuế', $startPos);
                    
                    if ($endPos !== false) {
                        $result = trim(substr($text, $startPos + strlen('Tình trạng'), $endPos - $startPos - strlen('Tình trạng')));
                        if($result){
                            $dataToUpdate = [
                                'trangthai' => $result,
                                'update_trangthai' => 1,
                            ];
                            
                            // Tìm hóa đơn theo ID
                            $invoice = Invoice::find($item->id);
                        
                            // Tiến hành cập nhật thông tin
                            $invoice->update($dataToUpdate);
                        }
                    }
                }
            }
            $requestCount++;
            if ($requestCount == 300) {
                $num++;
                $requestCount = 0;
                if($num == count($proxyList)){
                    $num = 0;
                }
                sleep(10);
            }
        }
    }
}
