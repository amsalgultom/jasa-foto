@extends('layouts.app')
@section('title', 'ART SPACE - Report')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Report Order</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="col-md-4 p-0 mb-3">
                <span class="mb-0">Date Filter:</span>
                <div class="d-flex">
                    <input type="text" class="form-control" id="min" name="min">
                    <span class="strip-date-filter">-</span>
                    <input type="text" class="form-control" id="max" name="max">
                </div>
            </div>   
            <div class="table-responsive">
                <table class="table table-bordered tabel-report" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Tanggal</th>    
                            <th>Harga Pengiriman</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Customer</th>
                            <th>Tanggal</th>
                            <th>Harga Pengiriman</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($myorders as $myorder)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $myorder->customer?->name }}</td>
                            <td>{{ $myorder->date }}</td>
                            <td>{{ $myorder->shipping_method . ' Rp '.number_format($myorder->shipping_costs, 0, ',', '.') }}</td>
                            <td>{{ 'Rp '.number_format($myorder->total, 0, ',', '.') }}</td>
                            <td>{{ $myorder->status?->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.4.1/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>  
    <script>
        var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[2] );
        
                if (
                    ( min === null && max === null ) ||
                    ( min === null && date <= max ) ||
                    ( min <= date && max === null ) ||
                    ( min <= date && date <= max )
                ) {
                    return true;
                }
                return false;
            }
        );
        
        
        $(document).ready(function() {
            // Create date inputs
            
            minDate = new DateTime($('#min'), {
                format: 'DD-MM-YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'DD-MM-YYYY'
            });
        
            // DataTables initialisation
            var table = $('#dataTable').DataTable({
                destroy: true,
                dom: 'Bfrtip',
                buttons: [ 
                    'excel',
                    'pdf',
                    'print'
                ]
            });
        
            // Refilter the table
            $('#min, #max').on('change', function () {
                table.draw();
            });

            

        } );
    </script>
@endpush