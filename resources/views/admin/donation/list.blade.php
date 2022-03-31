@extends('template.admin')

@section('admin-content')

<div class="row">
    <div class="col">
        <h2>DONATIONS LIST</h2>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg-3">
        <div class="card amount-card d-flex" style="display: inline-block">
            <h1>₱ {{ $total }}</h1>
            Total Amount Donated
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        <table class="table table-sm">
            <thead class="thead-cust-dark">
                <tr>
                    <th scope="col">Name of Person</th>
                    <th scope="col">E-Mail Address</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Category</th>
                    <th scope="col">Date Donated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donations as $x)
                <tr class="border-bottom">
                    <td>{{ $x->fname }} {{ $x->lname }}</td>
                    <td>{{ $x->email }}</td>
                    <td>₱ {{ $x->amount }}</td>
                    <td>{{  ucfirst($x->categ)  }}</td>
                    <td>{{ $x->created_at->format('F j, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection