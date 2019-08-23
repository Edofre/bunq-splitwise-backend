@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('bunq.payments') }}</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table data-datatable="payments" class="table table-bordered table-sm" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th scope="col">{{ __('payment.id') }}</th>
                                    <th scope="col">{{ __('payment.description') }}</th>
                                    <th scope="col">{{ __('payment.value') }}</th>
                                    <th scope="col">{{ __('payment.payment_at') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        let paymentsDatatable = $('[data-datatable="payments"]').DataTable({
            ajax: {
                // TODO implement ziggy
                url: '{{ route('bunq.payments.data') }}',
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'description', name: 'description'},
                {data: 'value', name: 'value'},
                {data: 'payment_at', name: 'payment_at'},
            ]
        });
    </script>
@endpush
