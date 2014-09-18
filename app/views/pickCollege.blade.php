@section('main')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Ocenite fakultete</h3>
                </div><!-- /.box-header -->
                <form action="http://shielded-mesa-6901.herokuapp.com/api/choices/save" method="post">
                    <div class="box-body">
                        <h2>Važno! Da bi test bio potpun, molimo da ocenite fakultete koji su vam ponuđeni</h2>
                        <p>Fakultete koji vam deluju interesantno ocenite visokom ocenom, a fakultete koji vas ne zanimaju ocenite niskom ocenom</p>
                        <div class="row margin">
                            <div class="col-sm-6">
                                <h2>Preporuke na osnovu rezultata testa</h2>
                                @foreach($colleges as $key => $c)
                                    <?php $done = false; ?>
                                    @foreach($colleges2 as $key2 => $cl)
                                        @if($cl->id == $c->id)
                                            <?php $done = true;?>
                                            <p><strong>{{$key+1}}.</strong> {{$c->title}} - {{$c->programme}}</p>
                                            <input type="text" value="{{intval($cl->markEstimation)}}" name="{{$c->id}}" class="slider form-control" data-slider-min="1" data-slider-max="10" data-slider-step="1" data-slider-value="{{intval($cl->markEstimation)}}" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red">
                                            <span style="float:left"><strong>1</strong> <small>(ne slažem se)</small></span><span style="float:right"><strong>10</strong> <small>(slažem se)</small></span>
                                            <hr/>
                                            <?php if($done) break;?>
                                        @endif
                                    @endforeach
                                    @if(!$done)
                                        <p><strong>{{$key+1}}.</strong> {{$c->title}} - {{$c->programme}}</p>
                                        <input type="text" value="5" name="{{$c->id}}" class="slider form-control" data-slider-min="1" data-slider-max="10" data-slider-step="1" data-slider-value="5" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red">
                                        <span style="float:left"><strong>1</strong> <small>(ne slažem se)</small></span><span style="float:right"><strong>10</strong> <small>(slažem se)</small></span>
                                        <hr/>
                                    @endif 
                                @endforeach
                            </div>
                            <div class="col-sm-6">
                                <h2>Preporuke na osnovu iskustva sličnih korisnika</h2>
                                @foreach($colleges2 as $key => $c)
                                    <?php $done=false;?>
                                    @foreach($colleges as $key2 => $cl)
                                        @if($c->id != $cl->id && $c->college != null)
                                            <?php $done = true;?>
                                            <p><strong>{{$key+1}}.</strong> {{$c->college->title}} - {{$c->college->programme}}</p>
                                            <input type="text" value="{{intval($c->markEstimation)}}" name="{{$c->id}}" class="slider form-control" data-slider-min="1" data-slider-max="10" data-slider-step="1" data-slider-value="{{intval($c->markEstimation)}}" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red">
                                            <span style="float:left"><strong>1</strong> <small>(ne slažem se)</small></span><span style="float:right"><strong>10</strong> <small>(slažem se)</small></span>
                                            <hr/>
                                            <?php if($done) break;?>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                            <input type="hidden" name="id" value="{{Session::get('id')}}" />
                            <div class="col-sm-6">
                                <input type="submit" name="submit" value="Pošalji" class="btn btn-primary pull-right">
                            </div> 
                        </div>
                    </div><!-- /.box-body -->
                </form>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
@stop