@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">دسته بندی ها</h1>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>والد</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->title}}</td>
                                        <td>{{optional($category->parent)->title}}</td>
                                        <td>
                                            <a href="{{route('categories.edit',$category)}}" class="btn btn-primary btn-sm">ویرایش</a>
                                        </td>
                                        <td>
                                            <form onsubmit="return confirm('آیا از حذف این دسته اطمینان دارید ؟')" method="post" action="{{route('categories.destroy',$category)}}">
                                                @csrf
                                                @method('DELETE')

                                                <input type="submit" value="حذف" class="btn btn-sm btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>والد</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- This is data table -->
    <script src="assets/vendor_components/datatable/datatables.min.js"></script>

    <!-- Superieur Admin for Data Table -->
    <script src="js/pages/data-table.js"></script>
@endsection
