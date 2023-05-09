@extends('layouts.main')

@section('nav_content')
    <li id="dash" class="nav-item active show">
        <a href="{{ route('dashboard') }}" class="nav-link"><i class="typcn typcn-chart-bar-outline"></i>الإحصائيات</a>
    </li>
    <li id="table" class="nav-item">
        <a href="{{ route('farmers_table') }}" class="nav-link"><i class="typcn typcn-folder"></i> معلومات مربي الماشية </a>
    </li>
@endsection
@section('content')
<div class="az-content az-content-dashboard">
    <div class="container">
        <div class="az-content-body">
            <div class="az-dashboard-one-title">
                <div>
                    <h2 class="az-dashboard-title">الإحصائيات حول مربي الماشية والأسر المنتجة في منطقة الحدود الشمالية</h2>
                    <p class="az-dashboard-text">هنا تظهر جميع الإحصائيات </p>
                </div>
                <div class="az-content-header-right">
                    <div class="media">
                        <div class="media-body">
                            <label>اليوم</label>
                            <h6>{{ date('Y-m-d') }}</h6>
                        </div><!-- media-body -->
                    </div><!-- media -->
                </div>
            </div><!-- az-dashboard-one-title -->

            <div class="az-dashboard-nav">
                <nav class="nav">
                    <h6>الإحصائيات العامة</h6>
                </nav>
            </div>

            <div class="row row-sm mg-b-20">
                <div class="col-lg-7 ht-lg-100p">
                    <div class="card card-dashboard-one">
                        <div class="card-header">
                            <div>
                                <h6 class="card-title">الإحصائيات الشخصية</h6>
                                <p class="card-text">الإحصائيات الخاصة بمربي الماشية الشخصية</p>
                            </div>
                        </div><!-- card-header -->
                        <div class="card-body">
                            <div class="card-body-top">
                                <div>

                                </div>
                                <div>
                                    <label class="mg-b-0">متوسط أفراد الأسرة</label>
                                    <h2>{{ round($av_family, 0)  }}</h2>
                                </div>
                                <div>
                                    <label class="mg-b-0">أكبر عمر لمربي</label>
                                    <h2>{{ $highest_age }}</h2>
                                </div>
                                <div>
                                    <label class="mg-b-0">أصغر عمر لمربي</label>
                                    <h2>{{ $lowest_age }}</h2>
                                </div>


                            </div><!-- card-body-top -->
                            <div class="flot-chart-wrapper">
                                <div id="flotChart" class="flot-chart"></div>
                            </div><!-- flot-chart-wrapper -->
                        </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col -->
                <div class="col-lg-5 mg-t-20 mg-lg-t-0">
                    <div class="row row-sm">
                        <div class="col-sm-6">
                            <div class="card card-dashboard-two">
                                <div class="card-header">
                                    <h6>{{ round($av_experience, 0) }}<i class="icon ion-md-trending-up tx-success"></i> <small>سنة</small></h6>
                                    <p>متوسط الخبرة</p>
                                </div><!-- card-header -->
                                <div class="card-body">
                                    <div class="chart-wrapper">
                                        <div id="flotChart1" class="flot-chart"></div>
                                    </div><!-- chart-wrapper -->
                                </div><!-- card-body -->
                            </div><!-- card -->
                        </div><!-- col -->
                        <div class="col-sm-6 mg-t-20 mg-sm-t-0">
                            <div class="card card-dashboard-two">
                                <div class="card-header">
                                    <h6>{{ round($av_age, 0) }} <i class="icon ion-md-trending-down tx-danger"></i> <small>سنة</small></h6>
                                    <p>متوسط العمر</p>
                                </div><!-- card-header -->
                                <div class="card-body">
                                    <div class="chart-wrapper">
                                        <div id="flotChart2" class="flot-chart"></div>
                                    </div><!-- chart-wrapper -->
                                </div><!-- card-body -->
                            </div><!-- card -->
                        </div><!-- col -->
                        <div class="col-sm-12 mg-t-20">
                            <div class="card card-dashboard-three">
                                <div class="card-header">
                                    <p>العدد الكلي للمربين</p>
                                    <h6>{{ $total_farmers }} <small class="tx-success"><i class="icon ion-md-arrow-up"></i> مربي/منتج</small></h6>
                                </div><!-- card-header -->
                                <div class="card-body">
                                    <div class="chart"><canvas id="chartBar5"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!--col -->
            </div><!-- row -->

            <div class="row row-sm mg-b-20">
                <div class="col-lg-4">
                    <div class="card card-dashboard-pageviews">
                        <div class="card-header">
                            <h6 class="card-title">متوسط أسعار منتجات الثروة الحيوانية</h6>
                            <p class="card-text">هنا تظهر متوسط منتجات الثروات الحيوانية</p>
                        </div><!-- card-header -->
                        <div class="card-body">
                            <div class="az-list-item">
                                <div>
                                    <h6> الحليب الخام</h6>
                                    <span>ريال/لتر</span>
                                </div>
                                <div>
                                    <h6 class="tx-primary">لا يباع يستخدم للإنتاج </h6>
                                </div>
                            </div><!-- list-group-item -->
                            <div class="az-list-item">
                                <div>
                                    <h6>اللبن</h6>
                                    <span>ريال/لتر</span>
                                </div>
                                <div>
                                    <h6 class="tx-primary">{{ round($av_frmilk, 2) }}</h6>
                                </div>
                            </div><!-- list-group-item -->
                            <div class="az-list-item">
                                <div>
                                    <h6>الزبدة</h6>
                                    <span>ريال/كجم</span>
                                </div>
                                <div>
                                    <h6 class="tx-primary">{{ round($av_butter, 2) }}</h6>
                                </div>
                            </div><!-- list-group-item -->
                            <div class="az-list-item">
                                <div>
                                    <h6>السمن</h6>
                                    <span>ريال/كجم</span>
                                </div>
                                <div>
                                    <h6 class="tx-primary">{{ round($av_ghee, 2) }}</h6>
                                </div>
                            </div><!-- list-group-item -->
                            <div class="az-list-item">
                                <div>
                                    <h6>البقل</h6>
                                    <span>ريال/كجم</span>
                                </div>
                                <div>
                                    <h6 class="tx-primary">{{ round($av_beans, 2) }}</h6>
                                </div>
                            </div><!-- list-group-item -->
                            <div class="az-list-item">
                                <div>
                                    <h6>الزبادي</h6>
                                    <span>ريال/كجم</span>
                                </div>
                                <div>
                                    <h6 class="tx-primary">{{ round($av_yogurt, 2) }}</h6>
                                </div>
                            </div><!-- list-group-item -->
                        </div><!-- card-body -->
                    </div><!-- card -->

                </div><!-- col -->
                <div class="col-lg-8 mg-t-20 mg-lg-t-0">
                    <div class="card card-dashboard-four">
                        <div class="card-header">
                            <h6 class="card-title">مجموع الثروة الحيوانية للمربين</h6>
                        </div><!-- card-header -->
                        <div class="card-body row">
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="chart"><canvas id="chartDonut"></canvas></div>
                            </div><!-- col -->
                            <div class="col-md-6 col-lg-5 mg-lg-l-auto mg-t-20 mg-md-t-0">
                                <div class="az-traffic-detail-item">
                                    <div>
                                        <span>المجموع الكلي للضأن</span>
                                        <span>{{ $total_lambs }}</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-purple wd-50p" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div><!-- progress -->
                                </div>
                                <div class="az-traffic-detail-item">
                                    <div>
                                        <span>المجموع الكلي للنعاج الحلوب</span>
                                        <span>{{ $total_ewes_milking }}</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary wd-30p" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div><!-- progress -->
                                </div>
                                <div class="az-traffic-detail-item">
                                    <div>
                                        <span>المجموع الكلي للنعاج الحوامل</span>
                                        <span>{{ $total_ewes_pregnant }}</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-info wd-20p" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div><!-- progress -->
                                </div>
                                <div class="az-traffic-detail-item">
                                    <div>
                                        <span>المجموع الكلي للنعاج غير الحامل</span>
                                        <span>{{ $total_ewes_dry_not_pregnant }}</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-teal wd-10p" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div><!-- progress -->
                                </div>
                                <div class="az-traffic-detail-item">
                                    <div>
                                        <span>المجموع الكلي للفحول (الكباش)</span>
                                        <span>{{ $total_stallions_rams }}</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-gray-500 wd-5p" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div><!-- progress -->
                                </div>
                            </div><!-- col -->
                        </div><!-- card-body -->
                    </div><!-- card-dashboard-four -->
                </div><!-- col -->
            </div><!-- row -->

            <div class="row row-sm mg-b-20 mg-lg-b-0">
                <div class="col-lg-5 col-xl-4">
                    <div class="row row-sm">
                        <div class="col-md-6 col-lg-12 mg-b-20 mg-md-b-0 mg-lg-b-20">
                            <div class="card card-dashboard-five">
                                <div class="card-header">
                                    <h6 class="card-title">الأكثر تكرارًا</h6>
                                    <span class="card-text">التسجيلات بين الفئة المستهدفة التي تكررت بكثرة وتمتاز بالأغلبية</span>
                                </div><!-- card-header -->
                                <div class="card-body row row-sm">
                                    <div class="col-6 d-sm-flex align-items-center">
                                        <div class="card-chart bg-primary">
                                            <span class="peity-bar" data-peity='{"fill": ["#fff"], "width": 20, "height": 20 }'>9,4,7,5,7</span>
                                        </div>
                                        <div style="position:relative; right: 5px">
                                            <label>سلالة الضأن</label>
                                            <h4 style="font-family: cairo">نعيمي</h4>
                                        </div>
                                    </div><!-- col -->
                                    <div class="col-6 d-sm-flex align-items-center">
                                        <div class="card-chart bg-purple">
                                            <span class="peity-bar" data-peity='{"fill": ["#fff"], "width": 21, "height": 20 }'>7,4,5,7,2</span>
                                        </div>
                                        <div style="position:relative; right: 5px">
                                            <label>نوع المعالف</label>
                                            <h4 style="font-family: cairo">داخلية</h4>
                                        </div>
                                    </div><!-- col -->
                                </div><!-- card-body -->
                            </div><!-- card-dashboard-five -->
                        </div><!-- col -->
{{--                        <div class="col-md-6 col-lg-12">--}}
{{--                            <div class="card card-dashboard-five">--}}
{{--                                <div class="card-header">--}}
{{--                                    <h6 class="card-title">Sessions</h6>--}}
{{--                                    <span class="card-text"> A session is the period time a user is actively engaged with your website, app, etc.</span>--}}
{{--                                </div><!-- card-header -->--}}
{{--                                <div class="card-body row row-sm">--}}
{{--                                    <div class="col-6 d-sm-flex align-items-center">--}}
{{--                                        <div class="mg-b-10 mg-sm-b-0 mg-sm-r-10">--}}
{{--                                            <span class="peity-donut" data-peity='{ "fill": ["#007bff", "#cad0e8"],  "innerRadius": 14, "radius": 20 }'>4/7</span>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <label>% New Sessions</label>--}}
{{--                                            <h4>26.80%</h4>--}}
{{--                                        </div>--}}
{{--                                    </div><!-- col -->--}}
{{--                                    <div class="col-6 d-sm-flex align-items-center">--}}
{{--                                        <div class="mg-b-10 mg-sm-b-0 mg-sm-r-10">--}}
{{--                                            <span class="peity-donut" data-peity='{ "fill": ["#00cccc", "#cad0e8"],  "innerRadius": 14, "radius": 20 }'>2/7</span>--}}
{{--                                        </div>--}}
{{--                                        <div>--}}
{{--                                            <label>Pages/Session</label>--}}
{{--                                            <h4>1,005</h4>--}}
{{--                                        </div>--}}
{{--                                    </div><!-- col -->--}}
{{--                                </div><!-- card-body -->--}}
{{--                            </div><!-- card-dashboard-five -->--}}
{{--                        </div><!-- col -->--}}
                    </div><!-- row -->
                </div><!-- col-lg-3 -->
                <div class="col-lg-7 col-xl-8 mg-t-20 mg-lg-t-0">
                    <div class="card card-table-one">
                        <h6 class="card-title">مجموع الماعز</h6>
                        <p class="az-content-text mg-b-20">هنا تظهر المعلومات الدقيقة الخاصة بالماعز للمربين</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th> الحلوب</th>
                                    <th> الحامل</th>
                                    <th> غير الحامل</th>
                                    <th>أطفال (0-3 شهور)</th>
                                    <th>أطفال (3-6 شهور)</th>
                                    <th>أطفال (أكبر من 6 شهور)</th>
                                    <th>الفحول (التيوس)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><strong>{{ $total_goat_milking }}</strong></td>
                                    <td><strong>{{ $total_goat_pregnant }}</strong></td>
                                    <td><strong>{{ $total_goat_dry_not_pregnant }}</strong></td>
                                    <td><strong>{{ $total_goat_zero_three }}</strong></td>
                                    <td><strong>{{ $total_goat_three_six }}</strong></td>
                                    <td><strong>{{ $total_goat_more_six }}</strong></td>
                                    <td><strong>{{ $total_goat_staillions_teos }}</strong></td>

                                </tr>

                                </tbody>
                            </table>
                        </div><!-- table-responsive -->
                    </div><!-- card -->
                </div><!-- col-lg -->

            </div><!-- row -->
        </div><!-- az-content-body -->
    </div>
</div><!-- az-content -->


@endsection
