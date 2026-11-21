@extends('layouts.app')

@section('title', 'User Accounts')

@section('content')
    <section class="page-heading">
        <p class="eyebrow">The team behind the counter</p>
        <h1>User Accounts</h1>
        <p class="lead">A quick look at the store team and their assigned roles.</p>
    </section>

    <section class="table-panel" aria-labelledby="user-list-heading">
        <div class="table-heading">
            <h2 id="user-list-heading">User directory</h2>
            <span class="record-count">{{ count($users) }} records</span>
        </div>
        <div class="table-scroll" tabindex="0" role="region" aria-label="User directory table, scroll horizontally on small screens">
            <table>
                <caption class="sr-only">Sample store user accounts and assigned roles</caption>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Email address</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="account-id">U{{ str_pad($user['id'], 3, '0', STR_PAD_LEFT) }}</td>
                            <th scope="row">{{ $user['name'] }}</th>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['role'] }}</td>
                            <td><span class="status {{ $user['status'] === 'Active' ? 'status-active' : 'status-inactive' }}">{{ $user['status'] }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p class="table-note">Sample user records for the Corner Store POS project.</p>
    </section>
@endsection
