@extends('layouts.app')

@section('content')

{{-- @php
    $sa = new App\Models\Salary;
    $result = $sa::all();
    $test = 4;
@endphp --}}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>每日時數紀錄</h2><br /><br />
            
            <form action="{{ route('salaries.store') }}" method="POST">
                @csrf
                <div class="container overflow-hidden form-group">
                    <div class="row gx-5">
                        <div class="col">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text" id="inputGroup-sizing-lg">日期</span>
                                <input type="date" class="form-control" id="date" name="date" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text" id="inputGroup-sizing-lg">時數</span>
                                <input class="form-control" id="hour" name="hour" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text" id="inputGroup-sizing-lg">時薪</span>
                                <input class="form-control" id="wage" name="wage" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" value="180">
                            </div>
                        </div>
                        <div class="row gx-3 pt-4 form-group">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary" type="submit">儲存</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>

            <hr class="solid">

            <div>
                <form action="{{ 'test' }}" method="POST">
                    @csrf
                    <select class="form-select" id="select" name="select" aria-label="Default select example" style="width:auto;" onchange="this.form.submit()">
                        @if ($selected == 0)
                            <option selected>請選月份</option>
                            @for ($i = 1; $i < 13; $i++)
                            <option value="{{$i}}"  id="fil" name="fil">{{$i}}</option>
                            @endfor
                        @else
                            <option>請選月份</option>
                            @for ($i = 1; $i < 13; $i++)
                            @if ($i == $selected)
                            <option value="{{$i}}"  id="fil" name="fil" selected>{{$i}}</option>
                            @else
                            <option value="{{$i}}"  id="fil" name="fil">{{$i}}</option>
                            @endif
                            @endfor
                        @endif
                        
                    </select>
                </form>
            </div>

            <br />
            @if (!$salaries->isEmpty())
            <table id="datatable" name="datatable" class="table table-bordered border-primary">
                
                <thead>
                    <tr>
                        <th scope="col">日期</th>
                        <th scope="col">時數</th>
                        <th scope="col">估計薪資</th>
                        <th scope="col">編輯/刪除</th>
                    </tr>
                </thead>
                @php
                    $total = 0;
                    // $salaries = App\Models\Salary::orderBy('date', 'ASC')->paginate(7);
                @endphp
                {{-- @foreach (App\Models\Salary::orderBy('date', 'ASC')->get() as $salary) --}}
                @foreach ($salaries as $salary)
                <tbody>
                    <tr>
                        <th scope="row" id="tdate">{{ $salary->date }}</th>
                        <td id="thour">{{ $salary->hour }}</td>
                        <td id="total">{{ $salary->total }}</td>
                        <td>
                            <button type="button" value="{{ $salary->id }}" class="btn btn-success editbtn"><i class="bi bi-pencil-square"></i></button>{{--編輯--}}
                            <form action="{{ route('salaries.destroy', [$salary->id]) }}" method="POST" id="fo" onSubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>{{--刪除--}}
                            </form>
                            {{-- <a href="{{ route('salaries.destroy', [$salary->id]) }}" type="button" class="btn btn-danger">刪除</a> --}}
                        </td>
                    </tr>
                    
                </tbody>
                @endforeach
                @foreach ($salaries as $salary)
                @php
                    $total += $salary->total;
                @endphp
                @endforeach
                
                <tfoot>
                    <tr class="table-success">
                        <th scope="row">估計月薪</th>
                        <td colspan="3">{{ $total-647 }}(勞健保：647)</td>
                    </tr>
                </tfoot>
            </table>

            @include('salaryEdit')
            @else
            <table id="datatable" name="datatable" class="table table-bordered border-primary">
                
                <thead>
                    <tr>
                        <th scope="col">日期</th>
                        <th scope="col">時數</th>
                        <th scope="col">估計薪資</th>
                        <th scope="col">編輯/刪除</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-danger">
                        <th colspan="4">目前尚無相關資料</th>
                    </tr>
                    
                </tbody>
                
                <tfoot>
                    <tr class="table-success">
                        <th scope="row">估計月薪</th>
                        <td colspan="3">0 (勞健保：647)</td>
                    </tr>
                </tfoot>
                
            </table>
            @endif
        </div>
    </div>
    {{ $salaries->links('pagination::bootstrap-4') }}
</div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.editbtn', function () {
                var id = $(this).val();
                //alert(id);
                $('#editModal').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/salaries/"+id+"/edit",
                    success: function (response) {
                        // console.log(response);
                        $('#edate').val(response.salary.date);
                        $('#ehour').val(response.salary.hour);
                    }
                });
            });

            
        });
    </script>
@endsection

@section('style')
    <style>
        #fo{ margin:0px; display:inline;}
    </style>
@endsection