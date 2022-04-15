@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Sub-SubCategory </h3>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('admin.categories.subcategories.subsubcategories.update', $subsubcategory->id) }}" >
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <h5>Category Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control"  >
                                                <option value="" selected="" disabled="">Select Category</option>

                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $subsubcategory->category_id ? 'selected':'' }} >
                                                        {{ $category->category_name_en }}
                                                    </option>
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

                                                @foreach($subcategories as $subsub)
                                                    <option value="{{ $subsub->id }}" {{ $subsub->id == $subsubcategory->subcategory_id ? 'selected':'' }} >
                                                        {{ $subsub->subcategory_name_en }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('subcategory_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub-SubCategory English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_en" class="form-control" value="{{ $subsubcategory->subsubcategory_name_en }}" >

                                            @error('subsubcategory_name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub-SubCategory Portuguese  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name_pt" class="form-control" value="{{ $subsubcategory->subsubcategory_name_pt }}">

                                            @error('subsubcategory_name_pt')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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
