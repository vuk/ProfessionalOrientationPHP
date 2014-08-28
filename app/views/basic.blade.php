@section('main')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Osnovni podaci</h3>
                </div><!-- /.box-header -->
                <form action="http://shielded-mesa-6901.herokuapp.com/api/request/post" method="post">
                    <div class="box-body">
                        <div class="row margin">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label>Ime</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="Ime" required>
                                </div>
                                <div class="form-group">
                                    <label>Prezime</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Prezime" required>
                                </div>
                                <div class="form-group">
                                    <label>E mail</label>
                                    <input type="email" name="email" class="form-control" placeholder="E mail" required>
                                </div>
                                <div class="form-group">
                                    <label>Godina rođenja</label>
                                    <input type="text" name="year_of_birth" class="form-control" placeholder="Godina rođenja" required>
                                </div>
                                <div class="form-group">
                                    <label>Opština stanovanja</label>
                                    <select name="current_town" class="form-control" required>
                                        @foreach($municipalities as $municipality)
                                            <option value="{{$municipality->id}}">{{$municipality->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Srednja škola</label>
                                    <select name="school" class="form-control" required>
                                        @foreach($schools as $school)
                                            <option value="{{$school->id}}">{{$school->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Naziv srednje škole</label>
                                    <input type="text" name="high_school" class="form-control" placeholder="Naziv srednje škole">
                                </div>
                                <div class="form-group">
                                    <label>Pol</label>
                                    <select name="gender" class="form-control">
                                        <option value="1">M</option>
                                        <option value="2">Z</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="submit" value="Idi na pitanja" class="btn btn-primary">
                    </div><!-- /.box-body -->
                </form>
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
@stop
        