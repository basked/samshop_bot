@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                @if ($errors->any())
                    <div class="col-md-10">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        {{__('Новая заявка')}}
                    </div>
                    <div class="card-body">
                        <form action="{{route('orders.store')}}" method="POST">
                            @csrf
                            <div class="form_group">
                                <label for="fio">Имя, фамилия</label>
                                <input type="text" id="fio" name="name" class="form-control"
                                       aria-describedby="emailHelp" placeholder="Дмитрий  Мисюля"/>
                            </div>
                            <div class="form_group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                       aria-describedby="emailHelp"/>
                            </div>
                            <div class="form_group">
                                <label for="product">Товар</label>
                                <select id="product" name="product" class="form-control">
                                    <option value="TV">TV</option>
                                    <option value="Audio">Audio</option>
                                    <option value="Phone">Phone</option>
                                </select>
                            </div>
                            <hr>
                            <div class="form_group">
                                <button type="submit" class="btn btn-primary">Заказать</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        {{__('Активные заказы')}}
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm">
                            <thead>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Product</td>
                            <td>Public</td>
                            <td>Secret</td>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->product}}</td>
                                    <td>{{$order->secret_key}}</td>
                                    <td>
                                        <input type="checkbox"
                                               disabled
                                               @if($order->public)
                                               checked
                                            @endif
                                        />

                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{$orders->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
