@extends('layouts.main')
@section('nav_content')
    <li id="dash" class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>الإحصائيات</a>
    </li>
    <li id="table" class="nav-item active show">
        <a href="{{ route('farmers_table') }}" class="nav-link"><i class="typcn typcn-folder"></i>معلومات مربي الماشية</a>
    </li>
@endsection
@section('content')

    <link rel='stylesheet' href='{{URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.rtl.min.css')}}'>
    <link rel='stylesheet' href='{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css')}}'>
    <link rel='stylesheet' href='{{URL::asset('https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css')}}'>

    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="col-xl-12">
                    <div class="card mg-b-20">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">مربي الماشية والأسر المنتجة بمنطقة الحدود الشمالية</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                            <p class="tx-12 tx-gray-500 mb-2">للوصول إلى ملف المزارع، الرجاء الضغط على الاسم.</p>
                            <form method="post" action="{{ route('conf') }}" id="form_switcher">
                                @csrf
                                <input type="hidden" value="" name="farmer_switcher" id="farmer_switcher">
                            </form>
                        </div>
                        <div class="card-body" dir="ltr" style="text-align: left;">
                            <div class="table-responsive" >
                                <table id="table" dir="rtl" style="text-align: right;"
                                       data-toggle="table"
                                       data-search="true"
                                       data-filter-control="true"
                                       data-show-export="true"
                                       class="table table-responsive table-striped">
                                    <thead>
                                    <tr>
                                        <th class="border-bottom-0">الرقم</th>
                                        <th class="border-bottom-0" data-field="name" data-filter-control="input" data-sortable="true">الاسم</th>
                                        <th class="border-bottom-0" data-field="age" data-filter-control="input" data-sortable="true">العمر</th>
                                        <th class="border-bottom-0"  data-field="job" data-filter-control="input" data-sortable="true">المهنة الرئيسية</th>
                                        <th class="border-bottom-0" data-field="family" data-filter-control="input" data-sortable="true"> أفراد الأسرة</th>
                                        <th class="border-bottom-0" data-field="sheep1" data-filter-control="input" data-sortable="true">مجموع الضأن</th>
                                        <th class="border-bottom-0" data-field="sheep2" data-filter-control="input" data-sortable="true">مجموع الماعز الحلوب</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($farmers as $farmer)
                                    <tr>
                                            <td id="{{ $farmer->id }}">{{ ($farmer->id) == null ? '-' : $farmer->id}}</td>
                                            <td id="{{ $farmer->id }}">{{ ($farmer->name) == null ? '-' : $farmer->name }}</td>
                                            <td id="{{ $farmer->id }}">{{ ($farmer->age) == null ? '-' : $farmer->age}}</td>
                                            <td id="{{ $farmer->id }}">{{ ($farmer->main_job) == null ? '-' : $farmer->main_job}}</td>
                                            <td id="{{ $farmer->id }}">{{ ($farmer->total_family) == null ? '-' : $farmer->total_family}}</td>
                                            <td id="{{ $farmer->id }}">{{ ($farmer->total_lamb) == null ? '-' : $farmer->total_lamb}}</td>
                                            <td id="{{ $farmer->id }}">{{ ($farmer->goat_milking) == null ? '-' : $farmer->goat_milking}}</td>
                                    </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src='{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js')}}'></script>
    <script src='{{URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js')}}'></script>
    <script src='{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js')}}'></script>
    <script src='{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js')}}'></script>
    <script src='{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js')}}'></script>
    <script src="{{URL::asset('http://frontendfreecode.com/codes/files/tableExport.js')}}"></script>
    <script src='{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js')}}'></script>
@endsection
