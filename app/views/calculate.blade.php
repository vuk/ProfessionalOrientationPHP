@section('main')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Pošalji sve!</h3>
                </div><!-- /.box-header -->
                <form action="http://shielded-mesa-6901.herokuapp.com/api/request/calculate" method="post">
                    <div class="box-body">
                        <p></p>
                        <div class="row margin">
                            <div class="col-sm-12">
                                @foreach(Session::all() as $key => $field)
                                    @if(!is_array($field))
                                      <input type="hidden" value="{{$field}}" name="{{$key}}"/>
                                    @endif
                                @endforeach
                            </div>
                            <input type="submit" name="submit" value="Pošalji" class="btn btn-primary btn-lg col-lg-12">
                        </div>
                    </div><!-- /.box-body -->
                </form>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
@stop