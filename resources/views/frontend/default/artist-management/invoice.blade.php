<link rel="stylesheet" href="{{ public_path('css/invoice.css') }}" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <div class="row p-1">
                        <div class="col-6">
                            <p class="font-weight-bold mb-1">Invoice #{{ $transaction->transaction_id }}</p>
                            <p class="text-muted">Created at: {{ date('d M, Y', strtotime($transaction->updated_at)) }}</p>
                        </div>
                        <div class="col-4">
                            <p class="font-weight-bold mb-2">Client Information</p>
                            <p class="mb-1">{{ $transaction->users->name }}</p>
                            <p>{{ $transaction->users->email }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row p-2">
                    <div class="col-xs-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border-0 text-uppercase small font-weight-bold">Album Name</th>
                                    <th class="border-0 text-uppercase small font-weight-bold">Type</th>
                                    <th class="border-0 text-uppercase small font-weight-bold">Quantity Song</th>
                                    <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $transaction->albums->title }}</td>
                                    <td>{{ $transaction->albums->album_type->name }}</td>
                                    <td>{{ $transaction->albums->song_count }}</td>
                                    <td>Rp {{ number_format((float)($transaction->amount), 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-flex flex-row-reverse bg-dark text-white">
                    <div class="py-3 px-5 text-right">
                        <div class="mb-1">Grand Total</div>
                        <div class="h4 font-weight-light">Rp {{ number_format((float)($transaction->amount), 0, ',', '.') }}</div>
                    </div>
                    @if(isset($transaction->voucher_id))
                        <div class="py-3 px-5 text-right">
                            <div class="mb-1">Voucher</div>
                            <div class="h4 text-danger font-weight-light">- Rp {{ number_format((float)($transaction->nilai_voucher), 0, ',', '.') }}</div>
                        </div>
                    @endif
                    @if(isset($transaction->free_song_id))
                        <div class="py-3 px-5 text-right">
                            <div class="mb-1">Voucher</div>
                            <div class="h4 text-danger font-weight-light">- Rp {{ number_format((float)($transaction->nilai_free_song), 0, ',', '.') }}</div>
                        </div>
                    @endif
                    <div class="py-3 px-5 text-right">
                        <div class="mb-1">Sub - Total amount</div>
                        <div class="h4 text-success font-weight-light">Rp {{ number_format((float)($transaction->amount-$transaction->nilai_voucher-$transaction->nilai_free_song), 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



