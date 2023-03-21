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
                            <p class="font-weight-bold mb-1">Invoice Convert Royalty #{{ date('YmdHis', strtotime($transaction->created_at)).'-'.$transaction->id }}</p>
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
                                    <th class="border-0 text-uppercase small font-weight-bold">Value $</th>
                                    <th class="border-0 text-uppercase small font-weight-bold">Kurs Idr</th>
                                    <th class="border-0 text-uppercase small font-weight-bold">Value Idr</th>
                                    <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $transaction->value }}</td>
                                    <td>Rp {{ number_format((float)(ceil($transaction->value_idr/$transaction->value)), 0, ',', '.') }}</td>
                                    <td>{{ $transaction->value_idr }}</td>
                                    <td>Rp {{ number_format((float)($transaction->value_idr), 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-flex flex-row-reverse bg-dark text-white">
                    <div class="py-3 px-5 text-right">
                        <div class="mb-1">Grand Total</div>
                        <div class="h4 font-weight-light">Rp {{ number_format((float)($transaction->value_idr), 0, ',', '.') }}</div>
                    </div>
                    @if(isset($transaction->value_admin))
                        <div class="py-3 px-5 text-right">
                            <div class="mb-1">Admin {{ceil(($transaction->value_admin/$transaction->value_idr)*100)}}</div>
                            <div class="h4 text-danger font-weight-light">- Rp {{ number_format((float)($transaction->value_admin), 0, ',', '.') }}</div>
                        </div>
                    @endif
                    @if(isset($transaction->value_tax))
                        <div class="py-3 px-5 text-right">
                            <div class="mb-1">Tax {{ceil(($transaction->value_tax/($transaction->value_idr-$transaction->value_admin))*100)}}</div>
                            <div class="h4 text-danger font-weight-light">- Rp {{ number_format((float)($transaction->value_tax), 0, ',', '.') }}</div>
                        </div>
                    @endif
                    <div class="py-3 px-5 text-right">
                        <div class="mb-1">Sub - Total amount</div>
                        <div class="h4 text-success font-weight-light">Rp {{ number_format((float)($transaction->value_total), 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



