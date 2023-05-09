@extends('layouts.main')
@section('nav_content')
    <li id="dash" class="nav-item">
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
                        <h2 class="az-dashboard-title">{{ $farmer->name }}</h2>
                        <p class="az-dashboard-text"><b>الوظيفة:</b> {{ $farmer->main_job }}</p>
                    </div>
                    <div class="az-content-header-right">
                        <div class="media">
                            <div class="media-body">
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="media-body">
                                <label>الموقع</label>
                                <h6>{{ $farmer->address }}</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="media-body">
                                <label>العمر</label>
                                <h6>{{ $farmer->age }}</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                        <div class="media">
                            <div class="media-body">
                                <label>مجموع العائلة</label>
                                <h6>{{ $farmer->total_family }}</h6>
                            </div><!-- media-body -->
                        </div><!-- media -->
                    </div>
                </div><!-- az-dashboard-one-title -->

                <div class="az-dashboard-nav">
                    <nav class="nav">
                        <h6 class="" data-toggle="tab" href="">الملف الشخصي</h6>
                    </nav>

                    <nav class="nav">
                        <a class="nav-link" href="#"><i class="far fa-save"></i></a>
                        <a class="nav-link" href="#"><i class="far fa-file-pdf"></i></a>
                        <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
                    </nav>
                </div>
                <div class="row row-sm mg-b-20">
                    <div class="col-lg-4">
                        <div class="card card-dashboard-pageviews">
                            <div class="card-header">
                                <h6 class="card-title">المعلومات الشخصية</h6>
                                <p class="card-text">هنا تظهر جميع المعلومات الشخصية لمربي الماشية:</p>
                            </div><!-- card-header -->
                            <div class="card-body">
                                <div class="az-list-item">
                                    <div>
                                        <h6>العمر</h6>
                                        <span>العمر الفعلي بالسنوات</span>
                                    </div>
                                    <div>
                                        <h6 class="tx-primary">{{ $farmer->age }}</h6>
                                    </div>
                                </div><!-- list-group-item -->
                                <div class="az-list-item">
                                    <div>
                                        <h6>رقم الهوية الوطنية/الإقامة</h6>
                                        <span>للمواطن والمقيم</span>
                                    </div>
                                    <div>
                                        <h6 class="tx-primary">{{ $farmer->id_number }}</h6>
                                    </div>
                                </div><!-- list-group-item -->
                                <div class="az-list-item">
                                    <div>
                                        <h6>موقع المزرعة</h6>
                                        <span>المنطقة والمحافظة</span>
                                    </div>
                                    <div>
                                        <h6 class="tx-primary">{{ $farmer->farmer__address }}</h6>
                                    </div>
                                </div><!-- list-group-item -->
                                <div class="az-list-item">
                                    <div>
                                        <h6>رقم الجوال</h6>
                                        <span>أو الهاتف الأرضي</span>
                                    </div>
                                    <div>
                                        <h6 class="tx-primary">{{ $farmer->phone_number }}</h6>
                                    </div>
                                </div><!-- list-group-item -->
                                <div class="az-list-item">
                                    <div>
                                        <h6>البريد الالكتروني</h6>
                                        <span>(في حال وجوده)</span>
                                    </div>
                                    <div>
                                        <h6 class="tx-primary">{{ ($farmer->email) == null ? 'لايوجد' : $farmer->email}}</h6>
                                    </div>
                                </div><!-- list-group-item -->
                            </div><!-- card-body -->
                        </div><!-- card -->

                    </div><!-- col -->
                    <div class="col-lg-8 mg-t-20 mg-lg-t-0">
                        <div class="card card-dashboard-four">
                            <div class="card-header">
                                <h6 class="card-title">تفاصيل الثروة الحيوانية</h6>
                            </div><!-- card-header -->
                            <div class="card-body row">
                                <div class="col-md-6 d-flex align-items-center">
                                    <div class="chart"><canvas id="chartDonut"></canvas></div>
                                </div><!-- col -->
                                <div class="col-md-6 col-lg-5 mg-lg-l-auto mg-t-20 mg-md-t-0">
                                    <div class="az-traffic-detail-item">
                                        <div>
                                            <span>عدد الضأن</span>
                                            <span>{{ (($farmer->total_lamb) == null) || (($farmer->total_lamb) == '-') || (($farmer->total_lamb) == '_')  ? '0' : $farmer->total_lamb}}</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-purple wd-{{ (($farmer->total_lamb) == null) || (($farmer->total_lamb) == '-') || (($farmer->total_lamb) == '_')  ? '0' : $farmer->total_lamb}}p" style="width: {{ ($farmer->total_lamb < 100 ? $farmer->total_lamb : '100%') }}" role="progressbar" aria-valuenow="{{ (($farmer->total_lamb) == null) || (($farmer->total_lamb) == '-') || (($farmer->total_lamb) == '_')  ? '0' : $farmer->total_lamb}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div><!-- progress -->
                                    </div>
                                    <div class="az-traffic-detail-item">
                                        <div>
                                            <span>عدد النعاج - الحلوب</span>
                                            <span>{{ (($farmer->ewes_milking) == null) || (($farmer->ewes_milking) == '-') || (($farmer->ewes_milking) == '_')  ? '0' : $farmer->ewes_milking }}</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary wd-{{ (($farmer->ewes_milking) == null) || (($farmer->ewes_milking) == '-') || (($farmer->ewes_milking) == '_')  ? '0' : $farmer->ewes_milking }}p"  style="width: {{ ($farmer->ewes_milking < 100 ? $farmer->ewes_milking : '100%') }}" role="progressbar" aria-valuenow="{{ (($farmer->ewes_milking) == null) || (($farmer->ewes_milking) == '-') || (($farmer->ewes_milking) == '_')  ? '0' : $farmer->ewes_milking }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div><!-- progress -->
                                    </div>
                                    <div class="az-traffic-detail-item">
                                        <div>
                                            <span>عدد النعاج - الحوامل</span>
                                            <span>{{ (($farmer->ewes_pregnant) == null) || (($farmer->ewes_pregnant) == '-') || (($farmer->ewes_pregnant) == '_')  ? '0' : $farmer->ewes_pregnant }}</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-info wd-{{ (($farmer->ewes_pregnant) == null) || (($farmer->ewes_pregnant) == '-') || (($farmer->ewes_pregnant) == '_')  ? '0' : $farmer->ewes_pregnant }}p" style="width: {{ ($farmer->ewes_pregnant < 100 ? $farmer->ewes_pregnant : '100%') }}" role="progressbar" aria-valuenow="{{ (($farmer->ewes_pregnant) == null) || (($farmer->ewes_pregnant) == '-') || (($farmer->ewes_pregnant) == '_')  ? '0' : $farmer->ewes_pregnant }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div><!-- progress -->
                                    </div>
                                    <div class="az-traffic-detail-item">
                                        <div>
                                            <span>عدد النعاج - الجافة (غير حامل)</span>
                                            <span>{{ (($farmer->ewes_dry_not_pregnant) == null) || (($farmer->ewes_dry_not_pregnant) == '-') || (($farmer->ewes_dry_not_pregnant) == '_')  ? '0' : $farmer->ewes_dry_not_pregnant }}</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-teal wd-{{ (($farmer->ewes_dry_not_pregnant) == null) || (($farmer->ewes_dry_not_pregnant) == '-') || (($farmer->ewes_dry_not_pregnant) == '_')  ? '0' : $farmer->ewes_dry_not_pregnant }}p" style="width: {{ ($farmer->ewes_dry_not_pregnant < 100 ? $farmer->ewes_dry_not_pregnant : '100%') }}" role="progressbar" aria-valuenow="{{ (($farmer->ewes_dry_not_pregnant) == null) || (($farmer->ewes_dry_not_pregnant) == '-') || (($farmer->ewes_dry_not_pregnant) == '_')  ? '0' : $farmer->ewes_dry_not_pregnant }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div><!-- progress -->
                                    </div>
                                    <div class="az-traffic-detail-item">
                                        <div>
                                            <span>عدد الفحول (الكباش)</span>
                                            <span>{{ (($farmer->stallions_rams) == null) || (($farmer->stallions_rams) == '-') || (($farmer->stallions_rams) == '_')  ? '0' : $farmer->stallions_rams }}</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-gray-500 wd-{{ (($farmer->stallions_rams) == null) || (($farmer->stallions_rams) == '-') || (($farmer->stallions_rams) == '_')  ? '0' : $farmer->stallions_rams }}p" style="width: {{ ($farmer->stallions_rams < 100 ? $farmer->stallions_rams : '100%') }}" role="progressbar" aria-valuenow="{{ (($farmer->stallions_rams) == null) || (($farmer->stallions_rams) == '-') || (($farmer->stallions_rams) == '_')  ? '0' : $farmer->stallions_rams }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div><!-- progress -->
                                    </div>
                                </div><!-- col -->
                            </div><!-- card-body -->
                        </div><!-- card-dashboard-four -->
                    </div><!-- col -->
                </div><!-- row -->

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









{{--                hidded               --}}
{{--                <div class="row row-sm mg-b-20">--}}
{{--                    <div class="col-lg-7 ht-lg-100p">--}}
{{--                        <div class="card card-dashboard-one">--}}
{{--                            <div class="card-header">--}}
{{--                                <div>--}}
{{--                                    <h6 class="card-title">Website Audience Metrics</h6>--}}
{{--                                    <p class="card-text">Audience to which the users belonged while on the current date range.</p>--}}
{{--                                </div>--}}
{{--                                <div class="btn-group">--}}
{{--                                    <button class="btn active">Day</button>--}}
{{--                                    <button class="btn">Week</button>--}}
{{--                                    <button class="btn">Month</button>--}}
{{--                                </div>--}}
{{--                            </div><!-- card-header -->--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="card-body-top">--}}
{{--                                    <div>--}}
{{--                                        <label class="mg-b-0">Users</label>--}}
{{--                                        <h2>13,956</h2>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <label class="mg-b-0">Bounce Rate</label>--}}
{{--                                        <h2>33.50%</h2>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <label class="mg-b-0">Page Views</label>--}}
{{--                                        <h2>83,123</h2>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <label class="mg-b-0">Sessions</label>--}}
{{--                                        <h2>16,869</h2>--}}
{{--                                    </div>--}}
{{--                                </div><!-- card-body-top -->--}}
{{--                                <div class="flot-chart-wrapper">--}}
{{--                                    <div id="flotChart" class="flot-chart"></div>--}}
{{--                                </div><!-- flot-chart-wrapper -->--}}
{{--                            </div><!-- card-body -->--}}
{{--                        </div><!-- card -->--}}
{{--                    </div><!-- col -->--}}
{{--                    <div class="col-lg-5 mg-t-20 mg-lg-t-0">--}}
{{--                        <div class="row row-sm">--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="card card-dashboard-two">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <h6>33.50% <i class="icon ion-md-trending-up tx-success"></i> <small>18.02%</small></h6>--}}
{{--                                        <p>Bounce Rate</p>--}}
{{--                                    </div><!-- card-header -->--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="chart-wrapper">--}}
{{--                                            <div id="flotChart1" class="flot-chart"></div>--}}
{{--                                        </div><!-- chart-wrapper -->--}}
{{--                                    </div><!-- card-body -->--}}
{{--                                </div><!-- card -->--}}
{{--                            </div><!-- col -->--}}
{{--                            <div class="col-sm-6 mg-t-20 mg-sm-t-0">--}}
{{--                                <div class="card card-dashboard-two">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <h6>86k <i class="icon ion-md-trending-down tx-danger"></i> <small>0.86%</small></h6>--}}
{{--                                        <p>Total Users</p>--}}
{{--                                    </div><!-- card-header -->--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="chart-wrapper">--}}
{{--                                            <div id="flotChart2" class="flot-chart"></div>--}}
{{--                                        </div><!-- chart-wrapper -->--}}
{{--                                    </div><!-- card-body -->--}}
{{--                                </div><!-- card -->--}}
{{--                            </div><!-- col -->--}}
{{--                            <div class="col-sm-12 mg-t-20">--}}
{{--                                <div class="card card-dashboard-three">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <p>All Sessions</p>--}}
{{--                                        <h6>16,869 <small class="tx-success"><i class="icon ion-md-arrow-up"></i> 2.87%</small></h6>--}}
{{--                                        <small>The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc.</small>--}}
{{--                                    </div><!-- card-header -->--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="chart"><canvas id="chartBar5"></canvas></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div><!-- row -->--}}
{{--                    </div><!--col -->--}}
{{--                </div><!-- row -->--}}


{{--                <div class="row row-sm mg-b-20 mg-lg-b-0">--}}
{{--                    <div class="col-lg-5 col-xl-4">--}}
{{--                        <div class="row row-sm">--}}
{{--                            <div class="col-md-6 col-lg-12 mg-b-20 mg-md-b-0 mg-lg-b-20">--}}
{{--                                <div class="card card-dashboard-five">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <h6 class="card-title">Acquisition</h6>--}}
{{--                                        <span class="card-text">Tells you where your visitors originated from, such as search engines, social networks or website referrals.</span>--}}
{{--                                    </div><!-- card-header -->--}}
{{--                                    <div class="card-body row row-sm">--}}
{{--                                        <div class="col-6 d-sm-flex align-items-center">--}}
{{--                                            <div class="card-chart bg-primary">--}}
{{--                                                <span class="peity-bar" data-peity='{"fill": ["#fff"], "width": 20, "height": 20 }'>6,4,7,5,7</span>--}}
{{--                                            </div>--}}
{{--                                            <div>--}}
{{--                                                <label>Bounce Rate</label>--}}
{{--                                                <h4>33.50%</h4>--}}
{{--                                            </div>--}}
{{--                                        </div><!-- col -->--}}
{{--                                        <div class="col-6 d-sm-flex align-items-center">--}}
{{--                                            <div class="card-chart bg-purple">--}}
{{--                                                <span class="peity-bar" data-peity='{"fill": ["#fff"], "width": 21, "height": 20 }'>7,4,5,7,2</span>--}}
{{--                                            </div>--}}
{{--                                            <div>--}}
{{--                                                <label>Sessions</label>--}}
{{--                                                <h4>9,065</h4>--}}
{{--                                            </div>--}}
{{--                                        </div><!-- col -->--}}
{{--                                    </div><!-- card-body -->--}}
{{--                                </div><!-- card-dashboard-five -->--}}
{{--                            </div><!-- col -->--}}
{{--                            <div class="col-md-6 col-lg-12">--}}
{{--                                <div class="card card-dashboard-five">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <h6 class="card-title">Sessions</h6>--}}
{{--                                        <span class="card-text"> A session is the period time a user is actively engaged with your website, app, etc.</span>--}}
{{--                                    </div><!-- card-header -->--}}
{{--                                    <div class="card-body row row-sm">--}}
{{--                                        <div class="col-6 d-sm-flex align-items-center">--}}
{{--                                            <div class="mg-b-10 mg-sm-b-0 mg-sm-r-10">--}}
{{--                                                <span class="peity-donut" data-peity='{ "fill": ["#007bff", "#cad0e8"],  "innerRadius": 14, "radius": 20 }'>4/7</span>--}}
{{--                                            </div>--}}
{{--                                            <div>--}}
{{--                                                <label>% New Sessions</label>--}}
{{--                                                <h4>26.80%</h4>--}}
{{--                                            </div>--}}
{{--                                        </div><!-- col -->--}}
{{--                                        <div class="col-6 d-sm-flex align-items-center">--}}
{{--                                            <div class="mg-b-10 mg-sm-b-0 mg-sm-r-10">--}}
{{--                                                <span class="peity-donut" data-peity='{ "fill": ["#00cccc", "#cad0e8"],  "innerRadius": 14, "radius": 20 }'>2/7</span>--}}
{{--                                            </div>--}}
{{--                                            <div>--}}
{{--                                                <label>Pages/Session</label>--}}
{{--                                                <h4>1,005</h4>--}}
{{--                                            </div>--}}
{{--                                        </div><!-- col -->--}}
{{--                                    </div><!-- card-body -->--}}
{{--                                </div><!-- card-dashboard-five -->--}}
{{--                            </div><!-- col -->--}}
{{--                        </div><!-- row -->--}}
{{--                    </div><!-- col-lg-3 -->--}}
{{--                    <div class="col-lg-7 col-xl-8 mg-t-20 mg-lg-t-0">--}}
{{--                        <div class="card card-table-one">--}}
{{--                            <h6 class="card-title">What pages do your users visit</h6>--}}
{{--                            <p class="az-content-text mg-b-20">Part of this date range occurs before the new users metric had been calculated, so the old users metric is displayed.</p>--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th class="wd-5p">&nbsp;</th>--}}
{{--                                        <th class="wd-45p">Country</th>--}}
{{--                                        <th>Entrances</th>--}}
{{--                                        <th>Bounce Rate</th>--}}
{{--                                        <th>Exits</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td><i class="flag-icon flag-icon-us flag-icon-squared"></i></td>--}}
{{--                                        <td><strong>United States</strong></td>--}}
{{--                                        <td><strong>134</strong> (1.51%)</td>--}}
{{--                                        <td>33.58%</td>--}}
{{--                                        <td>15.47%</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td><i class="flag-icon flag-icon-gb flag-icon-squared"></i></td>--}}
{{--                                        <td><strong>United Kingdom</strong></td>--}}
{{--                                        <td><strong>290</strong> (3.30%)</td>--}}
{{--                                        <td>9.22%</td>--}}
{{--                                        <td>7.99%</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td><i class="flag-icon flag-icon-in flag-icon-squared"></i></td>--}}
{{--                                        <td><strong>India</strong></td>--}}
{{--                                        <td><strong>250</strong> (3.00%)</td>--}}
{{--                                        <td>20.75%</td>--}}
{{--                                        <td>2.40%</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td><i class="flag-icon flag-icon-ca flag-icon-squared"></i></td>--}}
{{--                                        <td><strong>Canada</strong></td>--}}
{{--                                        <td><strong>216</strong> (2.79%)</td>--}}
{{--                                        <td>32.07%</td>--}}
{{--                                        <td>15.09%</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td><i class="flag-icon flag-icon-fr flag-icon-squared"></i></td>--}}
{{--                                        <td><strong>France</strong></td>--}}
{{--                                        <td><strong>216</strong> (2.79%)</td>--}}
{{--                                        <td>32.07%</td>--}}
{{--                                        <td>15.09%</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td><i class="flag-icon flag-icon-ph flag-icon-squared"></i></td>--}}
{{--                                        <td><strong>Philippines</strong></td>--}}
{{--                                        <td><strong>197</strong> (2.12%)</td>--}}
{{--                                        <td>32.07%</td>--}}
{{--                                        <td>15.09%</td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div><!-- table-responsive -->--}}
{{--                        </div><!-- card -->--}}
{{--                    </div><!-- col-lg -->--}}

{{--                </div><!-- row -->--}}
            </div><!-- az-content-body -->
        </div>
    </div>

    <script src="{{URL::asset('../lib/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::asset('../lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{URL::asset('../lib/ionicons/ionicons.js')}}"></script>
    <script src="{{URL::asset('../lib/chart.js/Chart.bundle.min.js')}}"></script>


    <script src="{{URL::asset('../js/azia.js')}}"></script>
    <script src="{{URL::asset('../js/chart.chartjs.js')}}"></script>
    <script src="{{URL::asset('../js/jquery.cookie.js')}}" type="text/javascript"></script>
@endsection
