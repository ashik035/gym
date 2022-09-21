@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mt-4 text-center">
        <div class="pull-left">
            <h2>Edit Product</h2>
        </div>
    </div>
</div>

<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-8 offset-md-2 offset-xs-2 offset-sm-2 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Product Namw:</strong>
                <input type="text" class="form-control" value="{{ old('name').@$product->name }}" name="name"/>
                @if ($errors->has('name'))
                    <span role="alert">
                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 offset-md-2 offset-xs-2 offset-sm-2">
            <div class="form-group">
                <strong>Product Details:</strong>
                <textarea class="form-control" style="height:150px" name="details">{{ old('details').@$product->details }}</textarea>
                @if ($errors->has('details'))
                    <span role="alert">
                        <strong class="text-danger">{{ $errors->first('details') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-xs-8 offset-md-2 offset-xs-2 offset-sm-2 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Product Type:</strong>
                <select class="form-control" name="type" id="type">
                    <option value="">Select a Type</option>
                    <option value="accessories" <?php echo (old('type').@$product->type == 'accessories') ? 'selected' : '' ?> >Accessories</option>
                    <option value="apparel" <?php echo (old('type').@$product->type == 'apparel') ? 'selected' : '' ?> >Apparel</option>
                </select>
                @if ($errors->has('type'))
                    <span role="alert">
                        <strong class="text-danger">{{ $errors->first('type') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-xs-8 offset-md-2 offset-xs-2 offset-sm-2 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Product Price:</strong>
                <input type="number" class="form-control" value="{{ old('price').@$product->price }}" name="price"/>
                @if ($errors->has('price'))
                    <span role="alert">
                        <strong class="text-danger">{{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 offset-md-2 offset-xs-2 offset-sm-2">
            <div class="form-group">
                <strong>Current Image : </strong>
                <img src="{{ asset("storage/images/product/$product->image") }}" height="150px" width="250px" alt="product">
                <input type="hidden" name="current_image" value="{{ $product->image }}">
            </div>
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image">
                @if ($errors->has('image'))
                    <span role="alert">
                        <strong class="text-danger">{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 text-center offset-md-2 offset-xs-2 offset-sm-2 mar">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection