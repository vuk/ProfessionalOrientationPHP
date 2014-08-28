@section('main')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{$title}}</h3>
                </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="row margin">
                            <div class="col-sm-6">
                                <?php $i = 0; ?>
                                @foreach ($fields as $key => $value)
                                    <?php $i++ ?>
                                    @if($i <= 7)
                                    <h3>{{$labels[$key]}}: {{round($value, 4)}}</h3><br/>
                                    @endif
                                @endforeach
                                <?php $i = 0; ?>
                                <a class="btn btn-primary btn-lg col-lg-12" href="{{URL::action('HomeController@getPickCollege')}}">Odaberi fakultet</a>
                            </div>
                            <div class="col-sm-6">
                                @foreach ($fields as $key => $value)
                                    <?php $i++ ?>
                                    @if($i > 7)
                                    <h3>{{$labels[$key]}}: {{round($value, 4)}}</h3><br/>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
@stop