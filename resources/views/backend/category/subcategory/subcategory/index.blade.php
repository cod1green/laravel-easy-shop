@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sub->SubCategory List</h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category </th>
                                            <th>SubCategory</th>
                                            <th>Sub-Subcategory En</th>
                                            <th>Sub-Subcategory Pt</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subsubcategories as $item)
                                            <tr>
                                                <td> {{ $item['category']['category_name_en'] }}  </td>
                                                <td>{{ $item['subcategory']['subcategory_name_en'] }}</td>
                                                <td>{{ $item->subsubcategory_name_en }}</td>
                                                <td>{{ $item->subsubcategory_name_pt }}</td>
                                                <td width="30%">
                                                    <a href="{{ route('admin.categories.subcategories.subsubcategories.edit', $item->id) }}" class="btn btn-info">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>

                                                    <form method="POST" action="{{ route('admin.categories.subcategories.subsubcategories.destroy', $item->id) }}" style="display: inline-block;">
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

                <!--   ------------ Add Category Page -------- -->
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Sub-SubCategory </h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('admin.categories.subcategories.subsubcategories.store') }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Category Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control"  >
                                                <option value="" selected="" disabled="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                                                @endforeach
                                            </select>

                                            @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" class="form-control"  >
                                                <option value="" selected="" disabled="">Select SubCategory</option>
                                            </select>

                                            @error('subcategory_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub-SubCategory English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_en" class="form-control">

                                            @error('subsubcategory_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub-SubCategory Portuguese  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_pt" class="form-control">

                                            @error('subsubcategory_name_pt')
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

    <script type="text/javascript">
        $(function (){
            $('select[name="category_id"]').on('change', function(){
                const categoryId = $(this).val();

                if(categoryId) {
                    $.ajax({
                        url: "{{  url('/admin/categories/subcategories/ajax') }}/" + categoryId,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                }
            });
        });
    </script>
@endsection
