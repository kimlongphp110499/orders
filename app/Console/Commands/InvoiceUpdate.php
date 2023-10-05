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
        $list = Invoice::take(10)->get();

         // Khởi tạo Goutte Client
         $client = new Client();
         foreach($list as $item){
            // Gửi HTTP request và lấy HTML của trang web
            $slug = Str::slug($item->nbten);
            
            $crawler = $client->request('GET', 'https://masothue.com/'.$item->nbmst.'-'.$slug);
    
            // Xử lý dữ liệu ở đây
            $text = '';
            $filter = $crawler->filter('table.table-taxinfo');
            if( $filter->count()  > 0) {
                $text = $filter->text();
            }
            if($text) {
                $startPos = strpos($text, 'Tình trạng');

                if ($startPos !== false) {
                    // Tìm vị trí của "Cập nhật mã số thuế" trong chuỗi, bắt đầu từ vị trí của "Tình trạng"
                    $endPos = strpos($text, 'Cập nhật mã số thuế', $startPos);
                    
                    if ($endPos !== false) {
                        // Lấy phần chuỗi giữa "Tình trạng" và "Cập nhật mã số thuế"
                        $result = trim(substr($text, $startPos + strlen('Tình trạng'), $endPos - $startPos - strlen('Tình trạng')));
                        if($result){
                            $dataToUpdate = [
                                'trangthai' => $result,
                            ];
                        
                            // Tìm hóa đơn theo ID
                            $invoice = Invoice::find($item->id);
                        
                            // Tiến hành cập nhật thông tin
                            $invoice->update($dataToUpdate);
                        }
                    }
                }
            }
        }
    }
}
