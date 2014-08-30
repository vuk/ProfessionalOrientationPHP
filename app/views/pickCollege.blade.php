@section('main')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Ocenite fakultete</h3>
                </div><!-- /.box-header -->
                <form action="#" method="post">
                    <div class="box-body">
                        <p>Fakultete koji vam deluju interesantno ocenite visokom ocenom, a fakultete koji vas ne zanimaju ocenite niskom ocenom</p>
                        <div class="row margin">
                            <div class="col-sm-6">
                                @foreach($colleges as $key => $c)
                                    <?php if($key > 9) continue; ?>
                                    <p><strong>{{$key+1}}.</strong> {{$c->title}} {{$c->programme}}</p>
                                    <input type="text" value="{{Session::get($c->id.'00', 5)}}" name="{{$c->id}}00" class="slider form-control" data-slider-min="1" data-slider-max="10" data-slider-step="1" data-slider-value="{{Session::get($c->id.'00', 5)}}" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red">
                                    <span style="float:left"><strong>1</strong> <small>(ne slažem se)</small></span><span style="float:right"><strong>10</strong> <small>(slažem se)</small></span>
                                    <hr/>
                                @endforeach
                            </div>
                            <div class="col-sm-6">
                                <input type="submit" name="submit" value="Pošalji" class="btn btn-primary pull-right btn-sticky">
                            </div> 
                        </div>
                        <input type="submit" name="submit" value="Pošalji" class="btn btn-primary">
                    </div><!-- /.box-body -->
                </form>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
@stop