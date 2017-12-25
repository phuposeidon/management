<html>
<style>
    table {
        width: 100%;
    }
    tbody th {
        border: 1px solid lightgray;
    }
</style>
<table>
    <thead>
        <tr>
            <th colspan="4" align="center">PHÒNG KHÁM ĐA KHOA HOÀN MỸ</th>
            <th colspan="4" align="center">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</th>
            <th>Số HĐ: </th>
        </tr>

        <tr>
            <th colspan="4" align="center">
                ĐC: Khu phố 6, P.Linh Trung, Q.Thủ Đức, TP.HCM</th>
            <th colspan="4" align="center">
                Độc lập - Tự do - Hạnh phúc</th>
            <th> {{$data['orderCode']}}</th>
        </tr>

        <tr>
            <th colspan="9" align="center">BIÊN LAI THU TIỀN PHÍ</th>
        </tr>
        <tr>
            <th colspan="6" align="left">Họ tên: {{$data['name']}}</th>
            <th>Tuổi: {{$data['age']}}</th>
            <th colspan="2">Giới tính: 
                @if($data['gender'] == 1)
                Nam
                @else
                Nữ
                @endif
            </th>
        </tr>

        <tr>
            <th colspan="9" align="left">Địa chỉ: {{$data['address']}}</th>
        </tr>
        <tr>
            <th colspan="9"></th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <th align="center" colspan="9">I. TÊN DỊCH VỤ</th>
        </tr>

        <tr>
            <th width="10" align="center">STT</th>
            <th colspan="5" align="center">TÊN DỊCH VỤ, THUỐC</th>
            <th align="center">LOẠI DV</th>
            <th colspan="2" align="center">THÀNH TIỀN</th>
        </tr>
        
        @if(count($orderServices) > 0)
            @for($i = 0;$i < count($orderServices); $i++)
            <?php $service = App\Service::where('id' ,$orderServices[$i]['serviceId'])->first();?>
            <tr>
                <th align="center">{{$i+1}}</th>
                <th colspan="5">
                    {{$service->name}}
                </th>
                <th align="center">{{$service->serviceCode}}</th>
                <th colspan="2" align="right">{{number_format($service->price)}}đ</th>
            </tr>
            @endfor
        @else
        <tr>
            <th align="center">1</th>
            <th colspan="5">
                Khám thường
            </th>
            <th align="center">BT</th>
            <th colspan="2" align="right">250,000đ</th>
        </tr>
        @endif

        <tr>
            <th align="center" colspan="9">II. TÊN THUỐC</th>
        </tr>

        <tr>
            <th width="10" align="center">STT</th>
            <th colspan="2" align="center">TÊN DỊCH VỤ, THUỐC</th>
            <th colspan="1" align="center">ĐVT</th>
            <th colspan="1" align="center">SỐ LƯỢNG</th>
            <th colspan="2" align="center">ĐƠN GIÁ</th>
            <th colspan="2" align="center">THÀNH TIỀN</th>
        </tr>

        @for($i = 0;$i < count($orderMedicines); $i++)
        <?php 
        $medicine = App\Medicine::where('id' ,$orderMedicines[$i]['medicineId'])->first();
        $dvt = $medicine->Unit->name;
        ?>
        <tr>
            <th align="center">1</th>
            <th colspan="2">{{$medicine->name}}</th>
            <th colspan="1" align="center">{{$dvt}}</th>
            <th colspan="1" align="center">{{$orderMedicines[$i]['amount']}}</th>
            <th colspan="2" align="right">{{number_format($medicine->price)}}đ</th>
            <th colspan="2" align="right">{{number_format($orderMedicines[$i]['totalPrice'])}}đ</th>
        </tr>
        @endfor

        <tr>
            <th colspan="7">Tổng chi phí (VNĐ)</th>
            <th colspan="2" align="right">{{number_format($data['totalAmount'])}}đ</th>
        </tr>

    </tbody>

    <tr>
        <th colspan="6"></th>
        <th colspan="3" align="center">THU NGÂN</th>
    </tr>
    <tr>
        <th colspan="6"></th>
        <th colspan="3" align="center">(Ký, ghi rõ họ tên)</th>
    </tr>
    <tr></tr><tr><tr></tr></tr>
    <tr>
        <th colspan="9" align="center">Kiểm tra kỹ hóa đơn trước khi thanh toán</th>
    </tr>
</table>
</html>