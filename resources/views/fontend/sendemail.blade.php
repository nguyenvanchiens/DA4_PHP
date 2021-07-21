<style>
    .styled-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    .styled-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
    }
    .styled-table th,
    .styled-table td {
        padding: 12px 15px;
    }
    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }
    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }
    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }
    .styled-table tbody tr.active-row {
        font-weight: bold;
        color: #009879;
    }
    td{
        border: 1px solid;
    }
    </style>
    <div style="display:block;overflow:hidden;background:#f1f1f1;width:100%;max-width:640px;margin:auto">
        <div class="header">
            <p>Chào anh/chị:{{ $email['name'] }}  </p>
            <p>Dưới đây là thông tin đơn hàng của anh/chị đã mua có thể xem lại muốn chi tiết hơn a/c có thể quay lại shop xem tiến trình giao hàng của shop evef đơn hàng</p>
        </div>
        <table class="styled-table" style="border: 1px solid;">
            <thead style="background-color: #05caa3">
                <tr>
                    <th style="color: white">stt</th>
                    <th style="color: white">Tên sản phẩm</th>
                    <th style="color: white">Số lượng</th>
                    <th style="color: white">Đơn giá</th>
                    <th style="color: white">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                    <?php $stt=0;?>
                      @foreach ($email['order'] as $item)
                        <?php $stt+=1?>
                        <tr>
                            <td style=" text-align:center;border: 1px solid"><?php echo $stt?></td>
                            <td style=" text-align:center;border: 1px solid">{{ $item['prod_name'] }}</td>
                            <td style=" text-align:center;border: 1px solid">{{ $item['prod_quantity'] }}</td>
                            <td style=" text-align:center;border: 1px solid">{{ number_format($item['prod_price']) }}</td>
                            <td style=" text-align:center;border: 1px solid">{{ number_format($item['prod_quantity']*$item['prod_price']) }}</td>
                        </tr>
                      @endforeach


                <!-- and so on... -->
            </tbody>
        </table>
        <div class="total_mony">
            <p>Tổng tiền đơn hàng của anh/chị là:{{ number_format($email['total']) }} vnđ</p>
        </div>
        <div class="footer">
            <p><a href="">chienshop</a> xin cảm ơn rất nhiều về sự tin tưởng của anh/chị đối với shop e</p>
        </div>


        <table width="100%" border="0" cellspacing="0">
            <tbody>
                <tr>
                    <td style="display:block;overflow:hidden;background:rgb(219, 85, 7);color:#fff;font-size:13px;padding:10px 10px 10px 20px">
                        <b style="display:block">Kinh doanh cửa hàng thời trang <a href="javascript::void(0)" style="color:#ffffff!important" target="_blank">ChienShop.COM</a>- thuộc Công ty TNHH TMHH</b>
                        <p>Địa chỉ: Việt Nam</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
