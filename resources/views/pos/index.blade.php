@extends('layout.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>{{ $tittle }}</h4>
            <div class="box box-warning">
                <div class="box-header">
                    <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh">Refresh</button>
                    </p>
                </div>
            <div class="box-body">
                <input type="hidden" name="grand_total" value=#>
                <div class="row">
                    <div class="col-md-6">
                        <form role="form">
                            <div class="form-row">
                                <div class="col-md-10">
                                    <div class="position-relative form-group">
                                        <label for="exampleInputEmail">Masukkan Kode Produk</label>
                                        <input type="text" autocomplete="off" name="barcode" id="barcode">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="position-relative form-group">
                                        <label for="exampleInputEmail">Qty</label>
                                        <input type="number" min=1 value=1 autocomplete="off" name="qty" id="qty">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <form method="post" action="{{ url('pos') }}">
                    @csrf
                    <div class="col-md-12">
                        <table class="table table-stripped">
                            <thead>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Qty</th>                                
                                <th>Total</th>
                            </thead>
                            <tbody class="produk-ajax">
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-stripped">
                                <tbody>
                                    <tr>
                                        <th>Total Bayar</th>
                                        <td>:</td>
                                        <td><input class="form-control" type="number" name="grand_total" readonly></td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Bayar</th>
                                        <td>:</td>
                                        <td><input class="form-control" type="number" name="jumlah_bayar"></td>
                                    </tr>
                                    <tr>
                                        <th>Kembalian</th>
                                        <td>:</td>
                                        <td><input class="form-control" type="number" name="kembalian" readonly></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primarry btn-lg btn-block" disabled>Submit</button>
                    </div>
                    </form>
                </div>
            </div>    
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){

        $("input[name='barcode']").focus();
        $("input[name='grand_total']").val(0);

        $("input[name='barcode']").keypress(function(e){
            if(e.which == 13){
                e.preventDefault();
                var id = $("input[name='barcode']").val();
                var kode = $(this).val();
                var qty = $("input[name='qty']").val();
                var url = "{{ url('produk/ajax') }}"+'/'+id;
                var _this = $(this);

                $.ajax({
                    type:'get',
                    dataType:'json',
                    url:url,
                    success:function(data){
                        _this.val('');

                        var nilai = '';

                        nilai += '<tr>';

                        nilai += '<td>';
                        nilai += data.id;
                        nilai += '<input type="hidden" class="form-control" name="produk[]" value="'+data.id+'">';
                        nilai += '</td>';

                        nilai += '<td>';
                        nilai += data.nama_produk;
                        nilai += '</td>';

                        nilai += '<td>';
                        nilai += data.harga;
                        nilai += '<input type="hidden" class="form-control" name="harga[]" value="'+data.harga+'">';
                        nilai += '</td>';

                        nilai += '<td>';
                        nilai += qty;
                        nilai += '<input type="hidden" class="form-control" name="produk[]" value="'+qty+'" min="1">';
                        nilai += '</td>';

                        var xtotal = 0;
                        xtotal += data.harga * qty;

                        nilai += '<td>';
                        nilai += xtotal;
                        nilai += '<input type="hidden" class="form-control" name="produk[]" value="'+xtotal+'" min="1">';
                        nilai += '</td>';

                        nilai += '<td>';                        
                        nilai += '<button class="btn btn-xs btn-danger">Hapus</button>';
                        nilai += '</td>';

                        nilai += '</tr>';

                        var total = parseInt($("input[name='grand_tot   al']").val());
                        total += data.harga * qty;

                        $("input[name='grand_total']").val(total);

                        $('.produk-ajax').append(nilai);
                        $("input[name='jumlah_bayar']").val(0)
                    }
                })
            }
        })
    
    $('body').on('click','.hapus',function(e){
        e.preventDefault();

        var xtotal = $(this).closest("tr").find(".xtotal").val();
        var total = $("input[name='grand_total']").val() - xtotal;
        $("input[name='grand_total']").val(total);

        $(this).closest('tr').remove();
    })

    $("button[type='submit']").click(function(e){
        var grand_total = parseInt($("input[name='grand_total']").val());
        var jumlah_bayar = parseInt($("input[name='jumlah_bayar']").val());

        if (jumlah_bayar < grand_total){
            e.preventDefault();
            alert('Uang Kurang');
        }
    })

    $("input[name='jumlah_bayar']").keyup(function(e){
        var grand_total = parseInt($("input[name='grand_total']").val());
        var jumlah_bayar = parseInt($(this).val());
        var kembalian = jumlah_bayar - grand_total;
        $(".kembalian").text(kembalian);
        $("input[name='kembalian']").val(kembalian);

        if(kembalian > 0){
            $("button[type='submit']").removeAttr("disabled");
        } else {
            $("button[type='submit']").attr("disabled", true);
        }
    })

    $('.btn-refresh').click(function(e){
        e.preventDefault();
        $('.preloader').fadeIn();
        location.reload();
    })
})
</script>

@endsection