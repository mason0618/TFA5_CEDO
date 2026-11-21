@extends('layouts.app')

@section('title', 'Customer Accounts')

@section('content')
    <section class="page-heading">
        <p class="eyebrow">The people we serve</p>
        <h1>Customer Accounts</h1>
        <p class="lead">Customer contact details and account status at a glance.</p>
    </section>

    <section class="table-panel" aria-labelledby="customer-list-heading">
        <div class="table-heading">
            <h2 id="customer-list-heading">Customer directory</h2>
            <span class="record-count">{{ count($customers) }} records</span>
        </div>
        <div class="table-scroll" tabindex="0" role="region" aria-label="Customer directory table, scroll horizontally on small screens">
            <table>
                <caption class="sr-only">Sample customer accounts and contact information</caption>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Customer name</th>
                        <th scope="col">Email address</th>
                        <th scope="col">Phone number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td class="account-id">C{{ str_pad($customer['id'], 3, '0', STR_PAD_LEFT) }}</td>
                            <th scope="row">{{ $customer['name'] }}</th>
                            <td>{{ $customer['email'] }}</td>
                            <td class="nowrap">{{ $customer['phone'] }}</td>
                            <td>{{ $customer['address'] }}</td>
                            <td><span class="status {{ $customer['status'] === 'Active' ? 'status-active' : 'status-inactive' }}">{{ $customer['status'] }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p class="table-note">Sample customer records for the Corner Store POS project.</p>
    </section>
@endsection
