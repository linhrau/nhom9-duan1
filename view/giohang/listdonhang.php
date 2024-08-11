<style>
    table {
        margin-top: 200px;
        overflow: auto;
    }

    .account__table {
        width: 100%;
        border-collapse: collapse;
    }

    .account__table th,
    .account__table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .account__table th {
        background-color: #f2f2f2;
    }
</style>
<section class="my__account--section section--padding">
    <div class="container">
        <div class="my__account--section__inner border-radius-10 d-flex">
            <table class="account__table">
                <thead class="account__table--header">
                    <tr class="account__table--header__child">
                        <th class="account__table--header__child--items">Mã đơn</th>
                        <th class="account__table--header__child--items">Ngày đặt</th>
                        <th class="account__table--header__child--items">Số lượng</th>
                        <th class="account__table--header__child--items">Tổng giá trị</th>
                        <th class="account__table--header__child--items">Tình trạng đơn</th>
                    </tr>
                </thead>
                <tbody class="account__table--body mobile__none">
                    <?php
                    if (is_array($listdonhang)) {
                        foreach ($listdonhang as $donhang) {
                            if (isset($donhang['id_hoa_don'])) {
                                extract($donhang);
                                $ttdh = get_ttdh($donhang['trang_thai']);
                                $countsp = loadall_ctdonhang_count($donhang['id_hoa_don']);

                                echo '<tr class="account__table--body__child">
                                    <td class="account__table--body__child--items">LL' . $donhang['id_hoa_don'] . '</td>
                                    <td class="account__table--body__child--items">' . $donhang['ngay_dat_hang'] . '</td>
                                    <td class="account__table--body__child--items">' . $countsp . '</td>
                                    <td class="account__table--body__child--items">' . number_format($donhang['tong_tien'], 0, ',', '.') . 'đ</td>
                                    <td class="account__table--body__child--items">' . $ttdh . '</td>
                                </tr>';
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>