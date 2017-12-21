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
    </thead>

    <tbody>
        <tr>
            <th width="10" align="center">STT</th>
            <th colspan="6" align="center">TÊN DỊCH VỤ, THUỐC</th>
            <th colspan="2" align="center">THÀNH TIỀN</th>
        </tr>
        <tr>
            <th align="center">I.</th>
            <th colspan="8"> TÊN DỊCH VỤ</th>
        </tr>
        
        @if($orderServices != '')
            @for($i = 0;$i < count($orderServices); $i++)
            <?php $service = App\Service::where('id' ,$orderServices[$i]['serviceId'])->first();?>
            <tr>
                <th align="center">{{$i+1}}</th>
                <th colspan="6">
                    {{$service->name}}
                </th>
                <th colspan="2" align="right">{{number_format($service->price)}}đ</th>
            </tr>
            @endfor
        @else
        <tr>
            <th align="center">1</th>
            <th colspan="6">
                Khám thường
            </th>
            <th colspan="2" align="right">250.000đ</th>
        </tr>
        @endif

        <tr>
            <th align="center">II.</th>
            <th colspan="8"> TÊN THUỐC</th>
        </tr>

        @for($i = 0;$i < count($orderMedicines); $i++)
        <?php $medicine = App\Medicine::where('id' ,$orderMedicines[$i]['medicineId'])->first();?>
        <tr>
            <th align="center">1</th>
            <th colspan="6">{{$medicine->name}}</th>
            <th colspan="2" align="right">{{number_format($orderMedicines[$i]['totalPrice'])}}đ</th>
        </tr>
        @endfor

        <tr>
            <th colspan="7">Tổng chi phí (VNĐ)</th>
            <th colspan="2" align="right">{{number_format($data['totalAmount'])}}đ</th>
        </tr>

    </tbody>
</table>
</html>