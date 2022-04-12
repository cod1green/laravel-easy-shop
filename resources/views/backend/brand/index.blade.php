@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Brand List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Brand En</th>
                                            <th>Brand Pt</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brands as $item)
                                        <tr>
                                            <td>{{ $item->brand_name_en }}</td>
                                            <td>{{ $item->brand_name_pt }}</td>
                                            <td><img src="{{ asset($item->brand_image) }}" style="width: 70px; height: 40px;"></td>
                                            <td>
                                                <a href="{{ route('admin.brands.edit', $item->id) }}" class="btn btn-info">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                <form action="{{ route('admin.brands.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a type="submit" class="btn btn-danger swal-delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Brand</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('admin.brands.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Brand Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_en" class="form-control">

                                            @error('brand_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Brand Name Portuguese <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="brand_name_pt" class="form-control">

                                            @error('brand_name_pt')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Brand Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="brand_image" class="form-control">

                                            @error('brand_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
