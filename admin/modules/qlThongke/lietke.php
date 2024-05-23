<div class="form">
    <div class="show">
        <div class="show-thongke">
            <span>Thông kê theo: </span>
            <span class="text-date">365 ngày qua</span>
        </div>
        <div class="show-date">
            <select class="date" name="date" id="date">
                <option value="7ngay">7 ngày qua</option>
                <option value="28ngay">28 ngày qua</option>
                <option value="90ngay">90 ngày qua</option>
                <option value="365ngay">365 ngày qua</option>
            </select>
        </div>


        <div class="table-total-all">
            <div class="table-total tt1">
                <div class="table-total-text">
                    <h3>Thống kê tổng doanh thu</h3>
                    <p class="table-total-text-dt"></p>
                </div>
            </div>
            <div class="table-total tt2">
                <div class="table-total-text">
                    <h3>Thống kê tổng doanh số</h3>
                    <p class="table-total-text-sl"></p>
                </div>
            </div>
        </div>

        <div class="show-thongke-all">
            <span>Thống kê doanh thu</span>
            <div id="myfirstchart" style="height: 250px;"></div>
        </div>
        <div class="show-thongke-all">
            <span>Thống kê doanh số</span>
            <div id="doanhso" style="height: 250px;"></div>
        </div>
    </div>

</div>

<script>
    $('.date').on('change', function() {
        var thoigian = $('.date').val();
        if (thoigian == '7ngay') {
            var text = "7 ngày qua";
        } else if (thoigian == '28ngay') {
            var text = "28 ngày qua";
        } else if (thoigian == '90ngay') {
            var text = "90 ngày qua";
        } else {
            var text = "365 ngày qua";
        }
        $('.text-date').text(text)
        // console.log(thoigian)
        $.ajax({
            url: 'modules/qlThongke/thongke.php',
            method: 'get',
            dataType: 'json',
            data: {
                thoigian: thoigian,
                doanhthu: 1,
            },
            success: function(data) {
                char.setData(data)
                $('.text-date').text(text)
                var tong = 0;
                var soluong = 0;
                $.each(data,function(i,val){
                    tong += parseInt(val.price);
                    soluong += parseInt(val.soluong)

                })
                $('.table-total-text-dt').text(tong.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'đ')
                $('.table-total-text-sl').text(soluong.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))
            }
        })
        $.ajax({
            url: 'modules/qlThongke/thongke.php',
            method: 'get',
            dataType: 'json',
            data: {
                thoigian: thoigian,
                doanhso: 1,
            },
            success: function(data) {
                doanhSo.setData(data)
                $('.text-date').text(text)
            }
        })
    })
    thongke();
    var char = new Morris.Bar({
        element: 'myfirstchart',
        xkey: 'date',
        ykeys: ['price'],
        labels: ['Doanh thu']
    });

    var doanhSo = new Morris.Bar({
        element: 'doanhso',
        xkey: 'date',
        ykeys: ['quantity'],
        labels: ['Doanh số']
    });

    function thongke() {
        $('.date').val('365ngay')
        var text = "365 ngày qua";
        $('.text-date').text(text)
        $.ajax({
            url: 'modules/qlThongke/thongke.php',
            method: 'get',
            dataType: 'json',
            data: {
                doanhthu: 1,
            },
            success: function(data) {
                char.setData(data)
                $('.text-date').text(text)
                var tong = 0;
                var soluong = 0;
                $.each(data,function(i,val){
                    tong += parseInt(val.price);
                    soluong += parseInt(val.soluong)
                })
                $('.table-total-text-dt').text(tong.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'đ')
                $('.table-total-text-sl').text(soluong.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))
            }
        })
        $.ajax({
            url: 'modules/qlThongke/thongke.php',
            method: 'get',
            dataType: 'json',
            data: {
                doanhso: 1,
            },
            success: function(data) {
                doanhSo.setData(data)
                $('.text-date').text(text)
            }
        })
    }
</script>